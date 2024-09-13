<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Books;
use Illuminate\Support\Facades\File;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();
        return view('books.tampil', ["books"=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.tambah', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => 'required|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        $books = new Books;

        $books->title = $request->input("title");
        $books->summary = $request->input("summary");
        $books->stock = $request->input("stock");
        $books->category_id = $request->input("category_id");
        $books->image = $imageName;

        $books->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);

        return view('books.detail', ['books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $books = Books::find($id);

        return view('books.edit', ['books'=>$books, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "image" => '|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $books = Books::find($id);

        if($request->has('image')){
            if($books->image){
            File::delete('uploads/'.$books->image);
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $books->image = $imageName;
        }
        $books->title = $request->input("title");
        $books->summary = $request->input("summary");
        $books->stock = $request->input("stock");
        $books->category_id = $request->input("category_id");

        $books->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);

        if($books->image){
            File::delete('uploads/'.$books->image);
        }
        $books->delete();

        return redirect('/books');
    }
}
