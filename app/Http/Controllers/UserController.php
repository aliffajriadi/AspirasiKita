<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login_page()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ])->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('/dashboard');

    }

    public function dashboard()
    {
        $reports = Report::query();

        $fr = Report::where('status', '=', 2);
        $ufr = Report::where('status', '!=', 2);


        return view('pages.auth.dashboard', [
            'unfinished_reports' => Report::where('status', '=', 0)->paginate(10),
            'ufr_count' => $ufr->count(),
            'fr_count' => $fr->count(),
            'user' => Auth::user()
        ]);
    }

    public function konten_page()
    {
        return view('pages.auth.konten', [
            'user' => Auth::user()
        ]);
    }
}
