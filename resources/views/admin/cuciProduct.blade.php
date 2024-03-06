@extends('layout.main')

@section('title', 'admin-create-cuciItems')


@section('container')

    <form action="{{ route('cuciProduct.storeCuciItem') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama_barang" placeholder="Nama Barang">
        <input type="number" name="harga_barang" placeholder="Harga Barang">
        <input type="file" name="gambar_barang">
        <button type="submit">Tambah Barang</button>
    </form>

@endsection
