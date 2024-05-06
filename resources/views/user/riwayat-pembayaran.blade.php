@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/riwayat.css') }}">


@section('title', 'Home')

@section('container')

    <div class="sticky-top">
        Riwayat Kamu
    </div>

    <div class="nav">
        <div class="navbar-slide">
            <a href="/user/riwayat" class="navs-items">
                Semua
            </a>
            <a href="/user/riwayat/pembayaran" class="navs-items active">
                Pembayaran
            </a>
            <a href="/user/riwayat/pindah" class="navs-items">
                Pindah Kamar
            </a>
            <a href="/user/riwayat/kerusakan" class="navs-items">
                Laporan Kerusakan
            </a>
            <a href="/user/riwayat/kehilangan" class="navs-items">
                Laporan Kehilangan
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row riwayat">
            <div class="col-12 all-riwayat">
                @if ($pembayaran->isNotEmpty())
                    @foreach ($pembayaran as $item)
                        <div class="riwayat-item payment" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->id }}">
                            <div class="items">
                                <div class="heading">
                                    <div class="logo">
                                        <img src="{{ asset('img/logo.png') }}">
                                    </div>
                                    @if ($item->status === 'Diterima')
                                        <div class="status accept">
                                            Lunas
                                        </div>
                                    @else
                                        <div class="status dismiss">
                                            Ditolak
                                        </div>
                                    @endif
                                </div>
                                <div class="info">
                                    <div class="info-head">
                                        @if ($item->status === 'Diterima')
                                            Pembayaran Kost Lunas!
                                        @else
                                            Pembayaran Kost Ditolak
                                        @endif
                                    </div>
                                    <div class="info-data">
                                        @if ($item->status === 'Diterima')
                                            Selamat {{ $item->name }}, Pembayaran kamu telah Di Terima oleh Admin. Klik Untuk Selengkapnya
                                        @else
                                            Mohon Maaf {{ $item->name }}, Pembayaran kamu telah Di Tolak oleh Admin, Klik untuk Selengkpanya
                                        @endif
                                    </div>
                                </div>
                                <div class="date">
                                    <div class="id-pembayaran">
                                        {{ $item->id_pembayaran }}
                                    </div>

                                    <div class="tanggal-pembayaran">
                                        {{ $item->updated_at->translatedFormat('j F Y H:i:s') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 empty-riwayat">
                        <div class="container empties">
                            <div class="logo">
                                <img src="{{ asset('img/people.png') }}">
                            </div>
                            <div class="text">
                                Yah,, kamu Tidak Memiliki Riwayat Apapun Saat ini.
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>


    {{-- RIWAYAT PEMBAYARAN --}}
    @if ($pembayaran->isNotEmpty())
        @foreach ($pembayaran as $item)
            <div class="modal fade in riwayat-pembayaran" id="history-payment{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel">
                                <img src="{{ asset('img/two.png') }}">
                            </div>
                            <div class="id">
                                {{ $item->id_pembayaran }}
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="first">
                                <div class="suc">
                                    @if ($item->status === 'Diterima')
                                        <div class="mess">
                                            Pembayaran Berhasil!
                                        </div>
                                    @else
                                        <div class="merr">
                                            Pembayaran Ditolak!
                                        </div>
                                    @endif
                                    <div class="tgl">
                                        {{ $item->created_at->translatedFormat('j F Y H:i:s') }}
                                    </div>
                                    <div class="pay">
                                        Rp. {{ $item->total_tagihan }}
                                    </div>
                                    <div class="stat">
                                        <div class="stat-item">
                                            <div class="head">
                                                Tanggal Masuk
                                            </div>
                                            <div class="value">
                                                {{ $item->tanggal_masuk }}
                                            </div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="head">
                                                Durasi Ngekost
                                            </div>
                                            <div class="value">
                                                {{ $item->durasi_ngekost }}
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
                                            {{ $item->name }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            No. Kamar
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->no_kamar }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Bulan Tagihan
                                        </div>
                                        <div class="value">
                                            {{ $item->bulan_tagihan->translatedFormat('F Y') }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Total Tagihan
                                        </div>
                                        <div class="value">
                                            Rp. {{ $item->total_tagihan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="info-l">
                                    <div class="info-item">
                                        <div class="inf">
                                            Metode Bayar
                                        </div>
                                        <div class="value">
                                            @php
                                                $bank = \App\Models\Bank::where('id', $item->bank_id)->first();
                                            @endphp
                                            Transfer {{ $bank->nama }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Atas Nama
                                        </div>
                                        <div class="value">
                                            {{ $item->name }}
                                        </div>
                                    </div>
                                    <div class="bukti">
                                        <div class="inf">
                                            Bukti Pembayaran
                                        </div>
                                        <div class="value img-bukti" data-id="{{ $item->id }}">
                                            <img src="{{ asset('uploads/' . $item->bukti) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if ($item->status === 'Ditolak')
                                <div class="third">
                                    <div class="message">
                                        Alasan Penolakan
                                    </div>
                                    <div class="pesan">
                                        {{ $item->pesan }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="/pdf/{{ $item->id }}" class="btn">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- RIWAYAT PEMBAYARAN --}}


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
                <a href="/user/riwayat/pembayaran" class="nav-link">
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
        document.querySelectorAll('.img-bukti').forEach(function(button) {
            button.addEventListener('click', function(e) {
                var itemId = button.getAttribute('data-id');
                var imageUrl = button.querySelector('img').getAttribute('src');
                Swal.fire({
                    imageUrl: imageUrl,
                    color: "#716add",
                    showConfirmButton: false
                });
            });
        });
    </script>
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
