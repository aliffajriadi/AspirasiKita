<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lapor', function () {
    return view('pages.lapor');
});
Route::get('/ceklapor', [ReportController::class, 'page']);
Route::get('/kontak', function () {
    return view('pages.kontak');
});
Route::get('/login', function () {
    return view('pages.login');
});

Route::post('/report', [ReportController::class, 'store']);

//AUTH 

Route::get('/dashboard', function () {
    return view('pages.auth.dashboard');
});
Route::get('/konten', function () {
    return view('pages.auth.konten');
});
Route::get('/laporan', function () {
    return view('pages.auth.laporan');
});
