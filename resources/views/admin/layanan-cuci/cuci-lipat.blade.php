@extends('layout.main')

@section('title', 'Cuci Lipat')


@section('container')

    <form action="{{ route('storeCuciLipat') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama_barang" placeholder="Nama Barang">
        <input type="text" name="harga_barang" placeholder="Harga Barang" id="numberInput" oninput="formatNumber()">
        <input type="file" name="gambar_barang">
        <button type="submit">Tambah Barang</button>
    </form>
    <a href="/admin/create">Kembali</a>

    <script>
        function formatNumber() {
            // Get the input element
            var inputElement = document.getElementById("numberInput");

            // Get the current value of the input
            var value = inputElement.value;

            // Remove any existing dots
            value = value.replace(/\./g, '');

            // Add dots every three digits
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input value with the formatted number
            inputElement.value = value;
        }
    </script>

@endsection