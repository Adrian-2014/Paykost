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
            <a href="/user/riwayat/pembayaran" class="navs-items">
                Pembayaran
            </a>
            <a href="/user/riwayat/pindah" class="navs-items">
                Pindah Kamar
            </a>
            <a href="/user/riwayat/kerusakan" class="navs-items">
                Laporan Kerusakan
            </a>
            <a href="/user/riwayat/kehilangan" class="navs-items active">
                Laporan Kehilangan
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row riwayat">
            <div class="col-12 all-riwayat">
                @if ($kehilangan->isNotEmpty())
                    @foreach ($kehilangan as $item)
                        <div class="riwayat-item kehilangan" data-bs-toggle="modal" data-bs-target="#riwayat-kehilangan{{ $item->id }}">
                            <div class="items">
                                <div class="heading">
                                    <div class="logo">
                                        <img src="{{ asset('img/question.png') }}">
                                    </div>
                                    <div class="status">
                                        Ditanggapi
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="info-data">
                                        Laporan Kehilangan kamu telah Ditanggapi oleh Admin. Klik untuk keterangan lebih lanjut
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


    {{-- RIWAYAT KEHILANGAN --}}
    @if ($kehilangan->isNotEmpty())
        @foreach ($kehilangan as $item)
            <div class="modal fade in riwayat-kehilangan" id="riwayat-kehilangan{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="first">
                                <div class="top">
                                    Laporan Kehilangan
                                </div>
                                <div class="bottom">
                                    {{ $item->created_at->translatedFormat('j F Y H:i:s') }} WIB
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
                                        <div class="the-keterangan">
                                            <div class="left">
                                                Keterangan
                                            </div>
                                            <div class="right">
                                                {{ $item->keterangan }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lost-respon">
                                        <div class="the-respon">
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
            </div>
        @endforeach
    @endif
    {{-- RIWAYAT KEHILANGAN --}}


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
                <a href="/user/riwayat/kehilangan" class="nav-link">
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
        document.querySelectorAll('.foto-crew').forEach(function(button) {
            button.addEventListener('click', function(e) {
                var itemId = button.getAttribute('data-id');
                var imageUrl = button.querySelector('img').getAttribute('src');
                Swal.fire({
                    imageUrl: imageUrl,
                    color: "#716add",
                    showConfirmButton: false,
                    customClass: {
                        container: "crewsakan",
                    },
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const element = document.querySelector(".active");
            element.scrollIntoView({
                inline: "center"
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
