<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function lapor_page()
    {
        return view('pages.lapor', [
            'categories' => Category::all(),
            'profile' => User::select('alamat_kantor')->first()
        ]);
    }

}
