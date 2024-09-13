@extends('layout.master')
@section('judul')
    Halaman Tampil Buku
@endsection
@section('content')

@auth
<a href="/books/create" class="btn btn-sm btn-primary mb-2">Tambah Buku</a>
@endauth

<div class="row">
    @forelse ($books as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top" alt="Card image cap" height="300px">
            <div class="card-body">
              <h2>{{$item->title}}</h2>
              <span class="badge badge-success">{{$item->category->name}}</span>
              <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
              <a href="/books/{{$item->id}}" class="btn btn-primary btn-block">Lihat Selengkapnya</a>

              @auth
              <div class="row mt-2">
                <div class="col">
                    <a href="/books/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                </div>
                <div class="col">
                    <form action="/books/{{$item->id}}" method="post">
                        @csrf
                        @method("Delete")
                        <input type="submit" value="Delete" class="btn btn-danger btn-block">
                    </form>
                </div>
              </div>
              @endauth
            </div>
          </div>
    </div>
    @empty
        <h4>Belum Ada</h4>
    @endforelse

</div>
@endsection
