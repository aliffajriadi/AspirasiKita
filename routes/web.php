<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lapor', function () {
    return view('pages.lapor');
});
Route::get('/ceklapor', function () {
    return view('pages.ceklaporan');
});
Route::get('/kontak', function () {
    return view('welcome');
});
