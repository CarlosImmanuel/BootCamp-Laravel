@extends('layout.master')
@section('judul')
    Halaman Detail Category
@endsection

@section('content')
    <h1 class="text-primary">{{$category->name}}</h1>
    <a href="/category" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
