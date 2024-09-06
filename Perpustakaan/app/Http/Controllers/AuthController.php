<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('page.register');
    }

    public function regist(Request $request) {
        $namaDepan = $request->input('fname');
        $namaBelakang = $request->input('lname');

        return view ('page.welcomee', ['namaDepan' => $namaDepan, 'namaBelakang' => $namaBelakang]);
    }
}
