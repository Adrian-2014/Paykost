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
            <a href="/user/riwayat/pembayaran" class="navs-items ">
                Pembayaran
            </a>
            <a href="/user/riwayat/pindah" class="navs-items active">
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
                @if ($pindah->isNotEmpty())
                    @foreach ($pindah as $item)
                        <div class="riwayat-item pindah" data-bs-toggle="modal" data-bs-target="#riwayat-pindah{{ $item->id }}">
                            <div class="items">
                                <div class="heading">
                                    <div class="logo">
                                        <img src="{{ asset('img/door.png') }}">
                                    </div>
                                    @if ($item->status === 'Dipindahkan')
                                        <div class="status accept">
                                            Disetujui
                                        </div>
                                    @else
                                        <div class="status dismiss">
                                            Ditolak
                                        </div>
                                    @endif
                                </div>
                                <div class="info">
                                    <div class="info-head">
                                        @if ($item->status === 'Dipindahkan')
                                            Permintaan Pindah Kost Disetujui!
                                        @else
                                            Permintaan Pindah Kost Ditolak!
                                        @endif
                                    </div>
                                    <div class="info-data">
                                        @if ($item->status === 'Dipindahkan')
                                            Permintaan pindah kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> telah Disetujui Admin. Klik Untuk Selengkapnya
                                        @else
                                            Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> Ditolak Admin. Klik Untuk Selengkapnya
                                        @endif
                                    </div>
                                </div>
                                <div class="date">
                                    <div class="no-kamar">
                                        Kamar No. {{ $item->kamar_lama }}
                                    </div>
                                    <div class="tanggal">
                                        {{ $item->created_at->translatedFormat('j F Y H:i') }}
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
    {{-- RIWAYAT PINDAH KAMAR --}}
    @if ($pindah->isNotEmpty())
        @foreach ($pindah as $item)
            <div class="modal fade in riwayat-pindah" id="riwayat-pindah{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="first">
                                <div class="suc">
                                    @if ($item->status === 'Dipindahkan')
                                        <div class="mess">
                                            Pengajuan Pindah Disetujui!
                                        </div>
                                    @else
                                        <div class="merr">
                                            Pengajuan Pindah Ditolak!
                                        </div>
                                    @endif
                                    <div class="tgl">
                                        {{ $item->created_at->translatedFormat('j F Y H:i:s') }} WIB
                                    </div>
                                    <div class="stat">
                                        <div class="stat-item">
                                            <div class="head">
                                                Tanggal Masuk
                                            </div>
                                            <div class="value">
                                                {{ $item->tanggal_masuk->translatedFormat('j F Y') }}
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
                                            {{ $item->nama }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Kamar Lama
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->kamar_lama }}
                                        </div>
                                    </div>
                                </div>
                                <div class="info-l">
                                    <div class="info-item">
                                        <div class="inf">
                                            Kamar Baru
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->kamar_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Luas Kamar Baru
                                        </div>
                                        <div class="value">
                                            {{ $item->ukuran_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Harga Kamar Baru
                                        </div>
                                        <div class="value">
                                            Rp. {{ $item->harga_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Waktu Pindah
                                        </div>
                                        <div class="value">
                                            {{ $item->waktu_pindah->translatedFormat('j F Y H:i') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if ($item->alasan)
                                <div class="alasan">
                                    <div class="heading">
                                        Alasan Pindah
                                    </div>
                                    <div class="item">
                                        {{ $item->alasan }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->status === 'Ditolak')
                                <div class="third">
                                    <div class="message">
                                        Alasan Penolakan
                                    </div>
                                    <div class="pesan">
                                        {{ $item->respon }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- RIWAYAT PINDAH KAMAR --}}
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
        document.addEventListener('DOMContentLoaded', function() {
            const element = document.querySelector(".active");
            element.scrollIntoView({
                inline: "center"
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
