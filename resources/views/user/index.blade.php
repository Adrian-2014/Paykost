@extends('layout.main')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/home.css') }}">


@section('title', 'Home')

@section('container')


    <div class="container-fluid satu position-relative">
        <nav class="navbar fixed-top px-3 py-2">
            <div class="navbar-brand">
                <img src="{{ asset('img/two.png') }}">
            </div>
            <div class="profil">
                <a href="user/profil">
                    <img src="{{ asset('img/person-1.jpg') }}">
                </a>
            </div>
        </nav>
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
                        {{-- <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>

                <div class="gambar">
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="{{ asset('img/satu.jpg') }}">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/dua.jpg') }}">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/tiga.jpg') }}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <div class="danger container-fluid mt-2">
        <div class="inform">
            <div class="alert">
                <i class="bi bi-exclamation-circle"></i>
            </div>
            <div class="pemberitahuan">
                <div class="head">
                    PENTING !
                </div>
                <div class="isi">
                    Diinformasikan kepada semua para penghuni kost untuk selalu menutup kembali pagar depan & memasukkan
                    kendaraannya.
                </div>
            </div>
        </div>
    </div>

    <div class="kategori container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="kategori-item">
                    <div class="log">
                        <i class="fi fi-ss-leave"></i>
                    </div>
                    <div class="keterangan">
                        Pindah kamar kost
                    </div>
                </div>
                <div class="kategori-item">
                    <div class="log">
                        <i class="fi fi-ss-house-chimney-crack"></i>
                    </div>
                    <div class="keterangan">
                        Laporan kerusakan
                    </div>
                </div>
                <div class="kategori-item">
                    <div class="log">
                        <i class="fi fi-ss-broom"></i>
                    </div>
                    <div class="keterangan">
                        tenaga kebersihan
                    </div>
                </div>
                <div class="kategori-item">
                    <div class="log">
                        <i class="fi fi-ss-washer"></i>
                    </div>
                    <div class="keterangan">
                        <p class="pe">Jasa</p>
                        <p class="pi">cuci baju</p>
                    </div>
                </div>
                <div class="kategori-item end">
                    <div class="log">
                        <i class="fi fi-br-interrogation"></i>
                    </div>
                    <div class="keterangan">
                        Laporan kehilangan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="recomendation container-fluid mt-4">
        <div class="splide" role="group" id="slider-2">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('img-chategories/room-1.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text">Kamar kost No. 08 - Uk. 3,5m x 3,5m - AC 1 pk - K. Mandi dalam </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 1.600.000
                                    </div>
                                    <div class="lihat">
                                        <a href="">
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
                                <div class="card-text">Kamar kost No. 07 - Uk. 3,1m x 3,1m - AC 1 pk </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 1.300.000
                                    </div>
                                    <div class="lihat">
                                        <a href="">
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
                                <div class="card-text">Kamar kost No. 06 - Uk. 5m x 5m - AC 2 pk - K. Mandi dalam
                                </div>
                                <div class="tambahan">
                                    <div class="harga">
                                        Rp. 2.000.000
                                    </div>
                                    <div class="lihat">
                                        <a href="">
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

    <nav class="navbar fixed-bottom bg-body-tertiary">
        <div class="container-fluid d-flex my-2 px-3">
            <div class="nav-item active">
                <a href="/user/index" class="nav-link">
                    <i class="bi bi-house-fill"></i>
                    <div class="isi">Beranda</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/kamarku" class="nav-link">
                    <i class="fa fa-bed" style="font-size:16px"></i>
                    <div class="isi">Kamarku</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/riwayat" class="nav-link">
                    <i class="bi bi-clock-fill"></i>
                    <div class="isi">
                        Riwayat
                    </div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/profil/profil" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <div class="isi">Profil</div>
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
            type: 'loop',
            autoplay: false,
            padding: '2.2rem',
            // perPage: 1,
            arrows: false,
            pagination: false,
            // interval: 4000,
            // pauseOnHover: false,

        });
        splide.mount();
    </script>


@endsection
