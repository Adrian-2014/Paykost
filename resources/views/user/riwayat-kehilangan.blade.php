@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/riwayat.css') }}">


@section('title', 'Home')

@section('container')

    <div class="nav">
        <div class="filter">

        </div>
        <div class="choice">
            <div class="btn-group dropstart">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/user/riwayat/pembayaran">
                            Pembayaran Kost
                        </a>
                    </li>
                    <li>
                        <a href="/user/riwayat/pindah">
                            Pindah Kamar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- onclick="getHistory('{{ $item->id }}')" --}}

    <div class="container-fluid riwayat">
        <div class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    {{-- FOR RIWAYAT LAPORAN KEHILANGAN --}}
                    <li class="splide__slide">
                        @if ($semua->isNotEmpty())
                            <div class="container for-kehilangan">
                                @foreach ($semua as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#riwayat-kehilangan{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status">
                                                    Ditanggapi
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                </div>
                                                <div class="info-data">
                                                    Laporan Kehilangan kamu telah Ditanggapi oleh Admin. Klik untuk keterangan lebih lanjut . . .
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="no-kamar">
                                                    Kamar No. {{ $item->no_kamar }}
                                                </div>
                                                <div class="tanggal">
                                                    {{ $item->updated_at->translatedFormat('j F Y H:i:s') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Laporan Kehilangan.
                                </div>
                            </div>
                        @endif
                    </li>
                    {{-- FOR RIWAYAT LAPORAN KEHILANGAN --}}
                </ul>
            </div>
        </div>
    </div>

    {{-- Riwayat Kehilangan --}}
    @if ($semua->isNotEmpty())
        @foreach ($semua as $item)
            <div class="modal fade in riwayat-kehilangan" id="riwayat-kehilangan{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="first">
                                <div class="top">
                                    Laporan Kehilangan
                                </div>
                                <div class="bottom">
                                    Pada {{ $item->created_at->translatedFormat('j F Y H:i:s') }} WIB
                                </div>
                            </div>
                            <div class="sec">
                                <div class="umum">
                                    <div class="umum-item">
                                        <div class="left">
                                            Nama User
                                        </div>
                                        <div class="right">
                                            {{ $item->nama }}
                                        </div>
                                    </div>
                                    <div class="umum-item">
                                        <div class="left">
                                            No. Kamar
                                        </div>
                                        <div class="right">
                                            Kamar No. {{ $item->no_kamar }}
                                        </div>
                                    </div>
                                </div>

                                <div class="lost">
                                    <div class="lost-item">
                                        <div class="left">
                                            Barang Yang Hilang
                                        </div>
                                        <div class="right">
                                            {{ $item->barang_hilang }}
                                        </div>
                                    </div>
                                    <div class="lost-item">
                                        <div class="left">
                                            Waktu Kehilangan
                                        </div>
                                        <div class="right">
                                            {{ $item->waktu_kehilangan->translatedFormat('j F Y H:i') }}
                                        </div>
                                    </div>
                                    <div class="lost-keterangan">
                                        <div class="left">
                                            Keterangan
                                        </div>
                                        <div class="right">
                                            {{ $item->keterangan }}
                                        </div>
                                    </div>

                                    <div class="lost-respon">
                                        <div class="left">
                                            Respon
                                        </div>
                                        <div class="right">
                                            {{ $item->respon }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- Riwayat Kehilangan --}}


    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
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
            <div class="nav-item active">
                <a href="/user/riwayat/pindah" class="nav-link">
                    <i class="fa fa-history"></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/profil" class="nav-link">
                    <i class='fas fa-user-alt'></i>
                    <div class="isi fw-normal">Profil</div>
                </a>
            </div>

        </div>
    </nav>

    <script>
        var splide = new Splide('.splide', {
            type: 'fade',
            // padding: '5rem',
            pagination: false,
            drag: false,
            arrows: false,
            perpage: 1,
        });

        splide.mount();


        const buttons = document.querySelectorAll('.btns');
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                splide.go(index);
            });
        });

        splide.on('moved', (newIndex) => {
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            buttons[newIndex].classList.add('active');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
