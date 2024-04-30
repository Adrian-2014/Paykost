@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/riwayat.css') }}">


@section('title', 'Home')

@section('container')

    <div class="nav">
        <div class="filter">
            <button class="btns active">
                <div class="item pembayaran-btn">
                    Semua
                </div>
            </button>
            {{-- <button class="btns">
            <div class="item pindah-kamar">
                Proses Validasi
            </div>
            </button> --}}
            <button class="btns">
                <div class="item laporan-kehilangan">
                    Lunas
                </div>
            </button>
            <button class="btns">
                <div class="item laporan-kerusakan">
                    Ditolak
                </div>
            </button>

        </div>
        <div class="choice">
            <div class="btn-group dropstart">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/user/riwayat/pindah">
                            Pindah Kamar
                        </a>
                    </li>
                    <li>
                        <a href="/user/riwayat/kehilangan">
                            Laporan Kehilangan
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

                    {{-- FOR RIWAYAT PEMBAYARAN ALL --}}
                    <li class="splide__slide">
                        @if ($semua->isNotEmpty())
                            <div class="container for-pay">
                                @foreach ($semua as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->id }}">
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

                                                <div class="tanggal-pembayaran">
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
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    {{-- FOR RIWAYAT PWMBAYARAN ALL --}}

                    {{-- FOR RIWAYAT PEMBAYARAN LUNAS --}}
                    <li class="splide__slide">
                        @if ($terima->isNotEmpty())
                            <div class="container for-pay">
                                @foreach ($terima as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status accept">
                                                    Lunas
                                                </div>
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

                                                <div class="tanggal-pembayaran">
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
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    {{-- FOR RIWAYAT PEMBAYARAN LUNAS --}}

                    {{-- FOR RIWAYAT PEMBAYARAN TOLAK --}}
                    <li class="splide__slide">
                        @if ($tolak->isNotEmpty())
                            <div class="container for-pay">
                                @foreach ($tolak as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status dismiss">
                                                    Ditolak
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Pembayaran Kost {{ $item->status }}!
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

                                                <div class="tanggal-pembayaran">
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
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    {{-- FOR RIWAYAT PEMBAYARAN TOLAK --}}

                    {{-- FOR RIWAYAT PINDAH KAMAR --}}
                    {{-- <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#riwayat-pindah{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Dipindahkan') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    @if ($item->status === 'Dipindahkan')
                                                        Permintaan Pindah Kost Disetujui!
                                                    @else
                                                        Permintaan Pindah Kost Ditolak
                                                    @endif
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Dipindahkan')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }},Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
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
                                                    {{ $item->created_at->translatedFormat('j F Y H:i') }}
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
                                    Yah,, kamu Tidak Memiliki Riwayat Pindah Kamar.
                                </div>
                            </div>
                        @endif
                    </li> --}}
                    {{-- FOR RIWAYAT PINDAH KAMAR --}}

                    {{-- FOR RIWAYAT LAPORAN KEHILANGAN --}}
                    {{-- <li class="splide__slide">
                        @if ($riwayatKehilangan->isNotEmpty())
                            <div class="container for-kehilangan">
                                @foreach ($riwayatKehilangan as $item)
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
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
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
                    </li> --}}
                    {{-- FOR RIWAYAT LAPORAN KEHILANGAN --}}

                    {{-- <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
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
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Laporan Kerusakan.
                                </div>
                            </div>
                        @endif
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade in" id="history" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div id="itemYear"></div>
                    <div id="itemTitle"></div>
                    <img id="itemImage" src="" alt="Item Image" style="max-width: 100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- RIWAYAT PEMBAYARAN --}}
    @if ($semua->isNotEmpty())
        @foreach ($semua as $item)
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
                                        Alasan Penolakan <span class="text-danger">*</span>
                                    </div>
                                    <div class="pesan">
                                        {{ $item->pesan }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="modal-footer">
                            <a href="javascript:void(0)" target="popup" onclick="window.open('/pdf','popup','width=600,height=600'); return false;" class="btn">Download</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- RIWAYAT PEMBAYARAN --}}


    {{-- Riwayat Pindah --}}
    {{-- @if ($riwayatPindah->isNotEmpty())
        @foreach ($riwayatPindah as $item)
            <div class="modal fade in riwayat-pindah" id="riwayat-pindah{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="first">
                                <div class="suc">
                                    @if ($item->status === 'Dipindahkan')
                                        <div class="mess">
                                            Permintaan Disetujui!
                                        </div>
                                    @else
                                        <div class="merr">
                                            Permintaan Ditolak!
                                        </div>
                                    @endif
                                    <div class="tgl">
                                        {{ $item->created_at->translatedFormat('j F Y H:i:s') }}
                                    </div>
                                    <div class="pay">
                                        Kamar No. {{ $item->kamar_lama }}
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
                                        Alasan Penolakan <span class="text-danger">*</span>
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
    @endif --}}
    {{-- Riwayat Pindah --}}


    {{-- Riwayat Kehilangan --}}
    {{-- @if ($riwayatKehilangan->isNotEmpty())
        @foreach ($riwayatKehilangan as $item)
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
    @endif --}}
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
    {{--
    <script>
        function getHistory(transactionId) {
            $.ajax({
                url: '/transaction/getModal/' + transactionId,
                type: 'GET',
                success: function(response) {
                    // Handle success
                    console.log(response);
                    // $('#itemYear').text(item.year);
                    // $('#itemTitle').text(item.title);
                    // $('#itemImage').attr('src', 'upload/' + item.gambar);
                    $('#history').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log('test');
                    // Handle error
                }
            });
        }

        function closeModal() {
            $('#itemYear').text('');
            $('#itemTitle').text('');
            $('#history').modal('hide');
        }
    </script> --}}
@endsection
