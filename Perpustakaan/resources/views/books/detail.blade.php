@extends('layout.master')
@section('judul')
    Halaman Detail Buku
@endsection
@section('content')

<img src="{{asset('uploads/'.$books->image)}}" width="100%" height="300px" alt="...">
<h1 class="text-primary">{{$books->title}}</h1>
<p>{{$books->summary}}</p>

<hr>

<h4 class="text-info">List Peminjaman</h4>

@forelse ($books->listBorrows as $item)
    <div class="card mt-3">
        <div class="card-header">
            {{$item->createdBy->name}}
        </div>
            <div class="card-body">
            <p class="card-text">Tanggal Peminjaman : {{$item->tanggal_peminjaman}}</p>
            <p class="card-text">Tanggal Kembali : {{$item->tanggal_kembali}}</p>
            </div>
    </div>
@empty
    <h4>Tidak ada peminjaman</h4>
@endforelse

<hr>

@auth
<form action="/borrows/{{$books->id}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Tanggal Peminjaman</label>
        <input type="date" name="tanggal_peminjaman" class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control">
    </div>
    <input type="submit" value="Kirim" class="btn btn-primary btn-sm btn-block">
</form>
@endauth

<a href="/books" class="btn btn-secondary btn-sm mt-2">Kembali</a>

@endsection
