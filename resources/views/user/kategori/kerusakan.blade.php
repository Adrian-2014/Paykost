@extends('layout.main')
@section('title', 'laporan kerusakan')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/kerusakan.css') }}">

@section('container')


    <div class="head">
        <div class="judul fw-semibold">
            LAPORAN KERUSAKAN
        </div>
        <div class="deskripsi">
            Mohon lengkapi data di bawah!
        </div>
    </div>

    <form action="" method="" class="form">
        <div class="formulir first">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama</label>
                <input type="text" id="name" class="form-control" value="Adrian Kurniawan" disabled>
            </div>
            <div class="form-item">
                <label for="nomorKamar" class="form-label fw-medium">No. Kamar</label>
                <input type="text" id="nomorKamar" class="form-control" value="Kamar No. 5" disabled>
            </div>
        </div>
        <div class="formulir sec">
            <div class="form-item">
                <label for="photo" class="form-label fw-medium">Sertakan gambar</label>
                <input type="file" id="photo" class="form-control">
            </div>
        </div>
        <div class="formulir third">
            <div class="form-item">
                <label for="keterangan" class="form-label fw-medium">Sertakan Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="6"></textarea>
            </div>
        </div>

        <button type="submit" class="fw-medium rounded-pill mt-3 mb-4">KIRIM LAPORAN</button>
    </form>
@endsection
