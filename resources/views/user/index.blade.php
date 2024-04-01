@extends('layout.main')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/home.css') }}">


@section('title', 'Home')

@section('container')

    <div class="container-fluid satu position-relative">
        <nav class="navbar fixed-top px-3 py-1">
            <div class="navbar-brand">
                <img src="{{ asset('img/two.png') }}">
            </div>
            <div class="profil">
                <img src="{{ asset('img/person-1.jpg') }}" id="profil">
            </div>
        </nav>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan Penting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Isi Pesan di sini -->
                    Terima kasih atas laporan Anda!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
        <div class="profil-content">

            <div class="profil-item">
                <div class="logo">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="value">
                    <div class="judul">
                        Nama
                    </div>
                    <div class="nama-v">
                        {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
            <div class="profil-item">

                <div class="value">
                    <div class="judul">
                        Nomor Kamar
                    </div>
                    <div class="nama-v">
                        5
                    </div>
                </div>
            </div>
            <div class="profil-item">

                <div class="value">
                    <div class="judul">
                        Tanggal Masuk
                    </div>
                    <div class="nama-v">
                        20 November 2023
                    </div>
                </div>
            </div>
            <div class="profil-item">

                <div class="value">
                    <div class="judul">
                        Durasi Ngekost
                    </div>
                    <div class="nama-v">
                        5 Bulan 13 Hari
                    </div>
                </div>
            </div>
            <div class="profil-item">

                <div class="value">
                    <div class="judul">
                        Pekerjaan
                    </div>
                    <div class="nama-v">
                        Mahasiswa
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="section d-flex justify-content-center text-align-center">
        <div class="row">
            <div class="col-11">
                <div class="tag-top">
                    <div class="heading">
                        Pembayaran Kost Bulan :
                    </div>
                    <div class="inf">
                        <div class="month">
                            NOVEMBER 2024
                        </div>
                        <div class="harga">
                            Rp 1.500.000
                        </div>
                    </div>
                </div>

                <div class="status">
                    <div class="heading">
                        Status pembayaran
                    </div>
                    <div class="value">
                        <div class="isi">
                            <div class="lun">
                                SUDAH LUNAS
                            </div>
                        </div>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class='fas fa-chevron-down'></i>
                        </button>
                    </div>
                </div>

                <div class="gambar">
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @if ($bannerKost->isEmpty())
                                    <li class="splide__slide">
                                        <div class="empty-page">
                                            <div class="one">
                                                <img src="{{ asset('img/page.png') }}">
                                            </div>
                                            <div class="two">
                                                Banner Belum Ditambahkan !
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    @foreach ($bannerKost as $item)
                                        <li class="splide__slide">
                                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="exampleModalLabel">
                        <img src="{{ asset('img/two.png') }}">
                    </div>
                    <div class="id">
                        #0D97GEK7208F
                    </div>
                </div>
                <div class="modal-body">
                    <div class="first">
                        <div class="suc">
                            <div class="mess">
                                Pembayaran Berhasil!
                            </div>
                            <div class="tgl">
                                08 November 2023 17:54:12 WIB
                            </div>
                            <div class="pay">
                                Rp. 1.500.000
                            </div>
                            <div class="stat">
                                <div class="stat-item">
                                    <div class="head">
                                        Tanggal Masuk
                                    </div>
                                    <div class="value">
                                        08/12/2023
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="head">
                                        Durasi Ngekost
                                    </div>
                                    <div class="value">
                                        28 Bulan 13 hari
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sec">
                        <div class="info-list">
                            <div class="info-item">
                                <div class="inf">
                                    Nama User
                                </div>
                                <div class="value">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inf">
                                    No. Kamar
                                </div>
                                <div class="value">
                                    Kamar No. 5
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inf">
                                    Bulan Tagihan
                                </div>
                                <div class="value">
                                    November 2023
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inf">
                                    Total Tagihan
                                </div>
                                <div class="value">
                                    Rp. 1.500.000
                                </div>
                            </div>
                        </div>
                        <div class="info-l">
                            <div class="info-item">
                                <div class="inf">
                                    Metode Bayar
                                </div>
                                <div class="value">
                                    Transfer Bank BCA
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inf">
                                    Atas Nama
                                </div>
                                <div class="value">
                                    Adrian
                                </div>
                            </div>
                            <div class="bukti">
                                <div class="inf">
                                    Bukti Pembayaran
                                </div>
                                <div class="value">
                                    <img src="{{ asset('img/not.jpg') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <form action="/pdf">
                        <button type="submit" class="btn">Download</button>
                    </form> --}}
                    <a href="javascript:void(0)" target="popup" onclick="window.open('/pdf','popup','width=600,height=600'); return false;" class="btn">Download</a>
                </div>
            </div>
        </div>
    </div>

    <div class="next container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="head">
                    Tagihan berikutnya :
                </div>
                <div class="value">
                    08 DESEMBER 2024
                </div>
            </div>
            <div class="col-5">
                <button type="submit">Bayar sekarang</button>
            </div>
        </div>
    </div>

    <div class="splide danger container-fluid mt-2" role="group" id="danger-slide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="inform" id="inform-1">
                        <div class="alert">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <div class="pemberitahuan">
                            <div class="head">
                                PENTING !
                            </div>
                            <div class="isi">
                                Diinformasikan kepada semua para penghuni kost untuk selalu menutup kembali pagar depan
                                & memasukkan
                                kendaraannya.
                            </div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide dua">
                    <div class="inform" id="inform-2">
                        <div class="alert">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <div class="pemberitahuan">
                            <div class="head">
                                SANGAT PENTING !
                            </div>
                            <div class="isi">
                                Diinformasikan kepada semua penghuni kost untuk selalu membayar tagihan kost tepat waktu.
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <div class="kategori container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="kategori-item">
                    <a href="/pindah" class="log">
                        <i class="fi fi-ss-leave"></i>
                    </a>
                    <div class="keterangan">
                        Pindah Kamar Kost
                    </div>
                </div>
                <div class="kategori-item">
                    <a href="/laporanKerusakan" class="log">
                        <i class="fi fi-ss-house-chimney-crack"></i>
                    </a>
                    <div class="keterangan">
                        Laporan Kerusakan
                    </div>
                </div>
                <div class="kategori-item">
                    <a href="/kebersihan" class="log">
                        <i class="fi fi-ss-broom"></i>
                    </a>
                    <div class="keterangan">
                        Tenaga Kebersihan
                    </div>
                </div>
                <div class="kategori-item">
                    <a href="/cuci" class="log">
                        <i class="fi fi-ss-washer"></i>
                    </a>
                    <div class="keterangan">
                        <p class="pe">Jasa</p>
                        <p class="pi">Cuci Baju</p>
                    </div>
                </div>
                <div class="kategori-item end">
                    <a href="/kehilangan" class="log">
                        <i class="fi fi-br-interrogation"></i>
                    </a>
                    <div class="keterangan">
                        Laporan Kehilangan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="splide" role="group" id="banner">
        <div class="splide__track">
            <ul class="splide__list">
                @if ($bannerPro->isEmpty())
                    <li class="splide__slide">
                        <div class="empty-pro">
                            <div class="one">
                                <img src="{{ asset('img/page.png') }}">
                            </div>
                            <div class="two">
                                Banner Belum Ditambahkan !
                            </div>
                        </div>
                    </li>
                @else
                    @foreach ($bannerPro as $item)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>


    <div class="recomendation container-fluid">
        <div class="splide" role="group" id="slider-2">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('img-chategories/room-1.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text">Kamar kost No. 08 - Uk. 3,5m x 3,5m
                                </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 1.600.000
                                    </div>
                                    <div class="lihat">
                                        <a href="/rekomendasi">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('img-chategories/room-2.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text">Kamar kost No. 07 - Uk. 3,1m x 3,1m </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 1.300.000
                                    </div>
                                    <div class="lihat">
                                        <a href="/rekomendasi">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('img-chategories/room-3.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text">Kamar kost No. 06 - Uk. 5m x 5m
                                </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 2.000.000
                                    </div>
                                    <div class="lihat">
                                        <a href="/rekomendasi">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('img/tyler.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text">Kamar kost No. 02 - Uk. 3m x 4.5m
                                </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 1.650.000
                                    </div>
                                    <div class="lihat">
                                        <a href="/rekomendasi">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item active">
                <a href="/user/index" class="nav-link">
                    {{-- <i class="bi bi-house-fill"></i> --}}
                    <i class='fas fa-home'></i>
                    <div class="isi fw-normal">Beranda</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/kamarku" class="nav-link">
                    <i class='fas fa-door-open'></i>
                    <div class="isi fw-normal">Kamarku</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/riwayat" class="nav-link">
                    <i class="fa fa-history"></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/profil/profil" class="nav-link">
                    <i class='fas fa-user-alt'></i>
                    <div class="isi fw-normal">Profil</div>
                </a>
            </div>

        </div>
    </nav>

    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            perPage: 1,
            arrows: false,
            interval: 4000,
            pauseOnHover: false,

        });
        splide.mount();

        var splide = new Splide('#slider-2', {
            // type: 'loop',
            autoplay: false,
            gap: '.5rem',
            padding: '0rem',
            drag: 'free',
            // perPage: 1,
            // perMove: 1,
            arrows: false,
            pagination: false,
            // interval: 4000,
            // pauseOnHover: false,

        });
        splide.mount();

        var splide = new Splide('#danger-slide', {
            autoplay: true,
            interval: 10000,
            type: 'loop',
            drag: false,
            arrows: false,
            // next: '<i class="bi bi-chevron-right"></i>',
            // prev: '<i class="bi bi-chevron-left"></i>',
            pagination: false,
            gap: '1rem',

        });
        splide.mount();

        var splide = new Splide('#banner', {
            autoplay: false,
            interval: false,
            type: 'loop',
            drag: true,
            arrows: false,
            autoplay: true,
            interval: 5000,
            // next: '<i class="bi bi-chevron-right"></i>',
            // prev: '<i class="bi bi-chevron-left"></i>',
            pagination: false,
            gap: '1rem',

        });
        splide.mount();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggle = document.getElementById('profil');
            var menu = document.querySelector('.body');
            // var navbar = document.querySelector("nav");
            toggle.addEventListener('click', function() {
                menu.classList.toggle('active');
                // navbar.classList.toggle('active');
            });

            document.addEventListener('click', function(e) {
                var toggle = document.getElementById('profil');
                var menu = document.querySelector('.body');
                if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove('active');
                    // navbar.classList.remove('active');
                }
            });
        });
    </script>

@endsection
