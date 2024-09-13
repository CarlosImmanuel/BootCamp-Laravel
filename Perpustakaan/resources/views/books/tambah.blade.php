@extends('layout.master')
@section('judul')
    Halaman Tambah Buku
@endsection
@section('content')
<form method="POST" action="/books" enctype="multipart/form-data">
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
      <label>Judul Buku</label>
      <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Summary</label>
        <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stock" class="form-control">
      </div>
      <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">--Pilih Category--</option>
            @forelse ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option value="">Belum Ada</option>
            @endforelse
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
