<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lapor', [PublicController::class, 'lapor_page']);
Route::get('/ceklapor', [ReportController::class, 'page']);
Route::get('/kontak', function () {
    return view('pages.kontak');
});

Route::get('/test', function () {
    return view('pages.test');
});

Route::get('/login', [UserController::class, 'login_page']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/report', [ReportController::class, 'store']);

//AUTH 

Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/konten', [UserController::class, 'konten_page']);
Route::get('/laporan', [ReportController::class, 'laporan_page']);
Route::patch('/laporan/{report}', [ReportController::class, 'update']);