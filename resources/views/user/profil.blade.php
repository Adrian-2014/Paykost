@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/home.css') }}">

@section('title', 'Home')

@section('container')

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex px-lg-5">
            <div class="nav-item">
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
            <div class="nav-item active">
                <a href="/user/profil" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <div class="isi">Profil</div>
                </a>
            </div>
        </div>
    </nav>
@endsection
