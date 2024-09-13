@extends('layout.master')
@section('judul')
    Halaman Detail Category
@endsection

@section('content')
    <h1 class="text-primary">{{$category->name}}</h1>

    <h4>List Buku</h4>
    <div class="row">
    @forelse ($category->listBooks as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top" alt="Card image cap" height="300px">
            <div class="card-body">
              <h2>{{$item->title}}</h2>
              <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
              <a href="/books/{{$item->id}}" class="btn btn-primary btn-block">Baca Selengkapnya</a>
            </div>
          </div>
    </div>
    @empty
        <h5 class="ml-2 mt-2">Tidak ada buku di kategori ini</h5>
    @endforelse
</div>

    <a href="/category" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
