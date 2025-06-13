<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index (){
        return view('pages.kontak', [
            'profile' => User::select('alamat_kantor', 'no_telp', 'email', 'nama_kelurahan')->first()
        ]);
    }
}
