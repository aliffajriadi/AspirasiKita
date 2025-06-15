<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingPageController;
use App\Models\User;

Route::get('/', [LandingPageController::class, 'view_home']);
Route::get('/lapor', [PublicController::class, 'lapor_page']);
Route::get('/ceklapor', [ReportController::class, 'track']);
Route::get('/kontak', [ContactController::class, 'index']);

Route::get('/test', function () {
    return view('pages.test');
});

Route::get('/login', [UserController::class, 'login_page']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/report', [ReportController::class, 'store']);
Route::post('/reports/track', [ReportController::class, 'track'])->name('reports.track');
Route::get('/reports/track', [ReportController::class, 'track'])->name('reports.track');

//AUTH 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/konten', [UserController::class, 'konten_page']);
    Route::patch('/konten/update', [UserController::class, 'update']);
    Route::get('/laporan', [ReportController::class, 'laporan_page']);
    Route::patch('/laporan/{report}', [ReportController::class, 'update']);
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout.');
    })->name('logout');
});
