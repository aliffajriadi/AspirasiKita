<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Report;
use App\Models\FileReport;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\ReportableHandler;

class ReportController extends Controller
{
    public function track(Request $request)
    {
        $report = null;

    if ($request->isMethod('post')) {
        $request->validate([
            'report_code' => 'required|string',
        ]);

        $report = Report::where('code', $request->report_code)->first();

        if (!$report) {
            return back()->with('error', 'Kode laporan tidak ditemukan.');
        }
    }

    return view('pages.ceklaporan', [
        'report' => $report,
        'profile' => User::select('alamat_kantor')->first(),
    ]);
    }

    public function laporan_page(Request $request)
    {
        $reports = Report::with(['file', 'category'])
            ->when($request->category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%$search%")
                      ->orWhere('title', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('pages.auth.laporan', [
            'categories' => Category::get(),
            'reports' => $reports,
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {


        try {
            $field = $request->validate([
                'name' => 'string',
                'phone_no' => 'string',
                'title' => 'required|string',
                'location' => 'string',
                'description' => 'required|string',
                'files' => 'file',
                'category_id' => 'required'
            ]);

            // Generate kode acak unik
            do {
                $randomCode = 'Lap-' . strtoupper(Str::random(5));
            } while (Report::where('code', $randomCode)->exists());

            $field['code'] = $randomCode;

            $report = Report::create($field);

            if ($request->hasFile('files')) {
                $file = $request->file('files');

                $file_report = FileReport::create([
                    'original_name' => $file->getClientOriginalName(),
                    'report_id' => $report->id
                ]);

                $stored_name = $report->id . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('files', $stored_name, 'public');

                $file_report->stored_name = $stored_name;
                $file_report->save();
            }

            return redirect()->back()->with('success', 'Berhasil Membuat Laporan, kode anda ' . $field['code'] . ' , Simpan kode ini untuk melihat status laporan anda.');
        }

        // kalau mau nanti ditambahkan untuk mendownload filenya agar dia tau kode laporan dan detaillaporan yang dia masukkan

        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, Report $report)
    {
        try {
            // dd($request->all());

            $field = $request->validate([
                'comment' => 'required|string',
                'status' => 'required|integer'
            ]);

            // $report->comment = $field['comment'];
            // $report->status = $field['status'];

            $report->update($field);
            // $report->save();

            return redirect()->back();

            dd($report, $request->all());
        } catch (\Exception $e) {
        }
    }
}
