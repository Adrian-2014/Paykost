@extends('layout.main')
@section('title', 'pindah kamar')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pindah.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                PENGAJUAN
            </div>
        </div>
    </div>

    <div class="head">
        <div class="judul fw-semibold">
            <div class="satu">PENGAJUAN</div>
            <div class="dua">PINDAH KAMAR KOST</div>
        </div>
        <div class="deskripsi">
            Mohon lengkapi data di bawah !
        </div>
    </div>

    <form action="" method="" class="form">
        <div class="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama</label>
                <input type="text" id="name" class="form-control" value="Adrian Kurniawan" disabled>
            </div>
            <div class="form-item">
                <label for="k-now" class="form-label fw-medium">No. Kamar saat ini</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. 5" disabled>
            </div>
            <div class="form-item">
                <label for="h-now" class="form-label fw-medium">Harga Kamar saat ini</label>
                <input type="text" id="h-now" class="form-control" value="Rp. 1.500.000" disabled>
            </div>
        </div>

        <div class="formulir sec">
            <div class="form-item">
                <label for="k-new" class="form-label fw-medium">No. Kamar Baru</label>
                <input type="text" id="k-new" class="form-control">
            </div>
            <div class="form-item">
                <label for="harga" class="form-label fw-medium">Harga Kamar</label>
                <input type="text" id="harga" class="form-control" disabled>
            </div>
            <div class="form-item">
                <label for="tanggal" class="form-label fw-medium">Tanggal Pindah</label>
                <input type="text" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Alasan Pindah Kamar (Opsional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
        </div>

        <button type="submit" class="fw-medium rounded-pill mt-0 mb-4">KIRIM PENGAJUAN</button>
    </form>

@endsection
