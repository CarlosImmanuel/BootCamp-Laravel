<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrows;
use Illuminate\Support\Facades\Auth;

class BorrowsController extends Controller
{
    public function store(Request $request, $books_id)
    {
        $users_id = Auth::id();

        $request->validate([
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        Borrows::create([
            'tanggal_peminjaman' => $request->input("tanggal_peminjaman"),
            'tanggal_kembali' => $request->input("tanggal_kembali"),
            'users_id' => $users_id,
            'books_id' => $books_id,
        ]);

        return redirect ('/books/'.$books_id);
    }
}
