<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function view_home(){
        $profile = User::select('nama_kelurahan', 'email', 'nama_kecamatan', 'alamat_kantor', 'no_telp', 'total_populasi', 'profile_pic'
        )->first();
        $report = [
            'report_non_done' => Report::where('status', 2)->count(),
            'total_count' => Report::count()
        ];
        // dd($report);
        return view('welcome', compact('profile', 'report'));
    }
}
