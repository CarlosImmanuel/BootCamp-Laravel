@extends('layout.master')
@section('judul')
    Halaman Tambah Category
@endsection

@section('content')
<form method="POST" action="/category">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <div class="form-group">
      <label>Nama Kategori</label>
      <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
