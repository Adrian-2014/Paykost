@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/riwayat.css') }}">

@section('title', 'Home')

@section('container')

    <div class="filter">
        <button class="btns active">
            <div class="item pembayaran-btn">
                Pembayaran
            </div>
        </button>
        <button class="btns">
            <div class="item pindah-kamar">
                Pindah Kamar
            </div>
        </button>
        <button class="btns">
            <div class="item laporan-kehilangan">
                Laporan Kehilangan
            </div>
        </button>
        <button class="btns">
            <div class="item laporan-kerusakan">
                Laporan Kerusakan
            </div>
        </button>
    </div>

    <div class="container-fluid riwayat">
        <div class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        @if ($riwayatPembayaran->isNotEmpty())
                            <div class="container for-pay">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPembayaran as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pembayaran Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->name }}, Pembayaran kamu telah Di Terima oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->name }}, Pembayaran kamu telah Di Tolak oleh Admin, Klik untuk info Selengkpanya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    {{ $item->id_pembayaran }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="history{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pindah Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pindah Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pindah Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>


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
                <a href="/user/riwayat" class="nav-link">
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
@endsection
