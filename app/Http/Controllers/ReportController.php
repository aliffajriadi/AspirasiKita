<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\FileReport;
use Illuminate\Foundation\Exceptions\ReportableHandler;

class ReportController extends Controller
{
    public function page()
    {
        $reports = Report::with('file')->get();
    
        return view('pages.ceklaporan', [
            'reports' => $reports
        ]);

    }

    public function laporan_page()
    {


        $reports = Report::with(['file', 'category'])->get();

        return view('pages.auth.laporan', [
            'reports'=> $reports
        ]);
    }

    public function store(Request $request)
    {

        try{

            
            
            $field = $request->validate([
                'name' => 'string',
                'phone_no' => 'string',
                'title' => 'required|string',
                'location' => 'string',
                'description' => 'required|string',
                // 'files' => 'array',
                'files' => 'file',
                'category_id' => 'required'
            ]);
            
            
            $field['code'] = 'Lap-' . now();
            
            $report = Report::create($field);
            dd($report);

            // dd($report);

            if($request->hasFile('files')){
                // $id = $report->id;
                $file = $request->file('files');

                // dd($file);   
                $file_report = FileReport::create([
                    'original_name' => $file->getClientOriginalName(),
                    'report_id' => $report->id 
                ]);

                $stored_name = $report->id . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $aa = $file->storeAs('files', $stored_name, 'public');

                $file_report->stored_name = $stored_name; 
                $file_report->save();
            }

            // dd($aa);

        // return redirect('/ceklapor');

    
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    
    public function update(Request $request, Report $report)
    {
        try{
            $field = $request->validate([
                'comment' => 'required|string',
                'status' => 'required'
            ]);

            $report->update($field);

            dd($report);

        }catch(\Exception $e){

        }
    }
}
