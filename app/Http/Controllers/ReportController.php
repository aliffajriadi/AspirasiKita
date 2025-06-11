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
        $reports = Report::with('file')->get();

        return view('pages.auth.laporan', [
            'reports'=> $reports
        ]);
    }

    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'string',
            'phone_no' => 'string',
            'title' => 'required|string',
            'description' => 'required|string',
            'files' => 'array',
            'files.*' => 'file'
        ]);

        $field['code'] = 'Lap-' . now();

        $report = Report::create($field);

        if($request->hasFile('files')){
            $id = $report->id;
            $files = $request->file('files');

            foreach($files as $file){
                
                $file_report = FileReport::create([
                    'original_name' => $file->getClientOriginalName(),
                    'report_id' => $report->id 
                ]);

                $stored_name = "$id." . $file->getClientOriginalExtension();

                $file_report->stored_name = $stored_name; 
            }
        }

        return redirect('/ceklapor');

    }
}
