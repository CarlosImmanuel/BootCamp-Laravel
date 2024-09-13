<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
        return view('category.tambah');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

    //Insert Data

    DB::table('categories') -> insert([
        'name' => $request->input("name"),
    ]);

    //Mengarahkan ke /category

    return redirect('/category');
    }

    public function index() {
        $categories = DB::table('categories') -> get();

       return view('category.tampil', ['categories' => $categories]);
    }

    public function show($id) {
        $category = Category::find($id);
        return view ('category.detail', ['category' => $category]);
    }

    public function edit($id) {
        $category = DB::table('categories') -> find($id);
        return view ('category.edit', ['category' => $category]);
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->input("name")
                ]
            );
            return redirect('/category');
    }

    public function destroy($id) {
        DB::table('categories') -> where('id', $id) -> delete();
        return redirect('category');
    }
}
