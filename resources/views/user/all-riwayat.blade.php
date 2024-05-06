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
            <a href="/user/riwayat" class="navs-items active">
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
            <a href="/user/riwayat/kehilangan" class="navs-items">
                Laporan Kehilangan
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row riwayat">
            @if ($all->isEmpty())
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
            @else
                <div class="col-12 empty all-riwayat">
                    @foreach ($all as $item)
                        @if ($item->pembayaran_kost_id)
                            <div class="riwayat-item payment" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->pembayaranKost->id }}">
                                <div class="items">
                                    <div class="heading">
                                        <div class="logo">
                                            <img src="{{ asset('img/logo.png') }}">
                                        </div>
                                        @if ($item->pembayaranKost->status === 'Diterima')
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
                                            @if ($item->pembayaranKost->status === 'Diterima')
                                                Pembayaran Kost Lunas!
                                            @else
                                                Pembayaran Kost Ditolak
                                            @endif
                                        </div>
                                        <div class="info-data">
                                            @if ($item->pembayaranKost->status === 'Diterima')
                                                Selamat {{ $item->pembayaranKost->name }}, Pembayaran kamu telah Di Terima oleh Admin. Klik Untuk Selengkapnya
                                            @else
                                                Mohon Maaf {{ $item->pembayaranKost->name }}, Pembayaran kamu telah Di Tolak oleh Admin, Klik untuk Selengkpanya
                                            @endif
                                        </div>
                                    </div>
                                    <div class="date">
                                        <div class="id-pembayaran">
                                            {{ $item->pembayaranKost->id_pembayaran }}
                                        </div>

                                        <div class="tanggal-pembayaran">
                                            {{ $item->pembayaranKost->updated_at->translatedFormat('j F Y H:i:s') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($item->pindah_kamar_id)
                            <div class="riwayat-item pindah" data-bs-toggle="modal" data-bs-target="#riwayat-pindah{{ $item->pindahKamar->id }}">
                                <div class="items">
                                    <div class="heading">
                                        <div class="logo">
                                            <img src="{{ asset('img/door.png') }}">
                                        </div>
                                        @if ($item->pindahKamar->status === 'Dipindahkan')
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
                                            @if ($item->pindahKamar->status === 'Dipindahkan')
                                                Permintaan Pindah Kost Disetujui!
                                            @else
                                                Permintaan Pindah Kost Ditolak!
                                            @endif
                                        </div>
                                        <div class="info-data">
                                            @if ($item->pindahKamar->status === 'Dipindahkan')
                                                Permintaan pindah kamu ke Kamar No. <span class="fw-bold">{{ $item->pindahKamar->kamar_baru }} </span> telah Disetujui Admin. Klik Untuk Selengkapnya
                                            @else
                                                Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->pindahKamar->kamar_baru }} </span> Ditolak Admin. Klik Untuk Selengkapnya
                                            @endif
                                        </div>
                                    </div>
                                    <div class="date">
                                        <div class="no-kamar">
                                            Kamar No. {{ $item->pindahKamar->kamar_lama }}
                                        </div>
                                        <div class="tanggal">
                                            {{ $item->created_at->translatedFormat('j F Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($item->kehilangan_id)
                            <div class="riwayat-item kehilangan" data-bs-toggle="modal" data-bs-target="#riwayat-kehilangan{{ $item->kehilangan->id }}">
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
                                            Kamar No. {{ $item->kehilangan->no_kamar }}
                                        </div>
                                        <div class="tanggal">
                                            {{ $item->kehilangan->updated_at->translatedFormat('j F Y H:i:s') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($item->kerusakan_id)
                            <div class="riwayat-item kerusakan" data-bs-toggle="modal" data-bs-target="#riwayat-kerusakan{{ $item->kerusakan->id }}">
                                <div class="items">
                                    <div class="heading">
                                        <div class="logo">
                                            <img src="{{ asset('img/broken-house.png') }}">
                                        </div>
                                        <div class="status">
                                            Ditanggapi
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="info-head">
                                        </div>
                                        <div class="info-data">
                                            Laporan Kerusakan kamu telah Ditanggapi oleh Admin. Klik untuk selengkapnya
                                        </div>
                                    </div>
                                    <div class="date">
                                        <div class="no-kamar">
                                            Kamar No. {{ $item->kerusakan->no_kamar }}
                                        </div>
                                        <div class="tanggal">
                                            {{ $item->updated_at->translatedFormat('j F Y H:i:s') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    {{-- RIWAYAT PEMBAYARAN --}}
    @if ($all->isNotEmpty())
        @foreach ($all as $item)
            @if ($item->pembayaran_kost_id)
                <div class="modal fade in riwayat-pembayaran" id="history-payment{{ $item->pembayaranKost->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title" id="exampleModalLabel">
                                    <img src="{{ asset('img/two.png') }}">
                                </div>
                                <div class="id">
                                    {{ $item->pembayaranKost->id_pembayaran }}
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="first">
                                    <div class="suc">
                                        @if ($item->pembayaranKost->status === 'Diterima')
                                            <div class="mess">
                                                Pembayaran Berhasil!
                                            </div>
                                        @else
                                            <div class="merr">
                                                Pembayaran Ditolak!
                                            </div>
                                        @endif
                                        <div class="tgl">
                                            {{ $item->pembayaranKost->created_at->translatedFormat('j F Y H:i:s') }}
                                        </div>
                                        <div class="pay">
                                            Rp. {{ $item->pembayaranKost->total_tagihan }}
                                        </div>
                                        <div class="stat">
                                            <div class="stat-item">
                                                <div class="head">
                                                    Tanggal Masuk
                                                </div>
                                                <div class="value">
                                                    {{ $item->pembayaranKost->tanggal_masuk }}
                                                </div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="head">
                                                    Durasi Ngekost
                                                </div>
                                                <div class="value">
                                                    {{ $item->pembayaranKost->durasi_ngekost }}
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
                                                {{ $item->pembayaranKost->name }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                No. Kamar
                                            </div>
                                            <div class="value">
                                                Kamar No. {{ $item->pembayaranKost->no_kamar }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Bulan Tagihan
                                            </div>
                                            <div class="value">
                                                {{ $item->pembayaranKost->bulan_tagihan->translatedFormat('F Y') }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Total Tagihan
                                            </div>
                                            <div class="value">
                                                Rp. {{ $item->pembayaranKost->total_tagihan }}
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
                                                    $bank = \App\Models\Bank::where('id', $item->pembayaranKost->bank_id)->first();
                                                @endphp
                                                Transfer {{ $bank->nama }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Atas Nama
                                            </div>
                                            <div class="value">
                                                {{ $item->pembayaranKost->name }}
                                            </div>
                                        </div>
                                        <div class="bukti">
                                            <div class="inf">
                                                Bukti Pembayaran
                                            </div>
                                            <div class="value img-bukti" data-id="{{ $item->pembayaranKost->id }}">
                                                <img src="{{ asset('uploads/' . $item->pembayaranKost->bukti) }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if ($item->pembayaranKost->status === 'Ditolak')
                                    <div class="third">
                                        <div class="message">
                                            Alasan Penolakan
                                        </div>
                                        <div class="pesan">
                                            {{ $item->pembayaranKost->pesan }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <a href="/pdf/{{ $item->pembayaranKost->id }}" class="btn">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    {{-- RIWAYAT PEMBAYARAN --}}


    {{-- RIWAYAT PINDAH KAMAR --}}
    @if ($all->isNotEmpty())
        @foreach ($all as $item)
            @if ($item->pindah_kamar_id)
                <div class="modal fade in riwayat-pindah" id="riwayat-pindah{{ $item->pindahKamar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="first">
                                    <div class="suc">
                                        @if ($item->pindahKamar->status === 'Dipindahkan')
                                            <div class="mess">
                                                Pengajuan Pindah Disetujui!
                                            </div>
                                        @else
                                            <div class="merr">
                                                Pengajuan Pindah Ditolak!
                                            </div>
                                        @endif
                                        <div class="tgl">
                                            {{ $item->pindahKamar->created_at->translatedFormat('j F Y H:i:s') }} WIB
                                        </div>
                                        <div class="stat">
                                            <div class="stat-item">
                                                <div class="head">
                                                    Tanggal Masuk
                                                </div>
                                                <div class="value">
                                                    {{ $item->pindahKamar->tanggal_masuk->translatedFormat('j F Y') }}
                                                </div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="head">
                                                    Durasi Ngekost
                                                </div>
                                                <div class="value">
                                                    {{ $item->pindahKamar->durasi_ngekost }}
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
                                                {{ $item->pindahKamar->nama }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Kamar Lama
                                            </div>
                                            <div class="value">
                                                Kamar No. {{ $item->pindahKamar->kamar_lama }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-l">
                                        <div class="info-item">
                                            <div class="inf">
                                                Kamar Baru
                                            </div>
                                            <div class="value">
                                                Kamar No. {{ $item->pindahKamar->kamar_baru }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Luas Kamar Baru
                                            </div>
                                            <div class="value">
                                                {{ $item->pindahKamar->ukuran_baru }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Harga Kamar Baru
                                            </div>
                                            <div class="value">
                                                Rp. {{ $item->pindahKamar->harga_baru }}
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="inf">
                                                Waktu Pindah
                                            </div>
                                            <div class="value">
                                                {{ $item->pindahKamar->waktu_pindah->translatedFormat('j F Y H:i') }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @if ($item->pindahKamar->alasan)
                                    <div class="alasan">
                                        <div class="heading">
                                            Alasan Pindah
                                        </div>
                                        <div class="item">
                                            {{ $item->pindahKamar->alasan }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pindahKamar->status === 'Ditolak')
                                    <div class="third">
                                        <div class="message">
                                            Alasan Penolakan
                                        </div>
                                        <div class="pesan">
                                            {{ $item->pindahKamar->respon }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    {{-- RIWAYAT PINDAH KAMAR --}}


    {{-- RIWAYAT KEHILANGAN --}}
    @if ($all->isNotEmpty())
        @foreach ($all as $item)
            @if ($item->kehilangan_id)
                <div class="modal fade in riwayat-kehilangan" id="riwayat-kehilangan{{ $item->kehilangan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="first">
                                    <div class="top">
                                        Laporan Kehilangan
                                    </div>
                                    <div class="bottom">
                                        {{ $item->kehilangan->created_at->translatedFormat('j F Y H:i:s') }} WIB
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="umum">
                                        <div class="umum-item">
                                            <div class="left">
                                                Nama User
                                            </div>
                                            <div class="right">
                                                {{ $item->kehilangan->nama }}
                                            </div>
                                        </div>
                                        <div class="umum-item">
                                            <div class="left">
                                                No. Kamar
                                            </div>
                                            <div class="right">
                                                Kamar No. {{ $item->kehilangan->no_kamar }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lost">
                                        <div class="lost-item">
                                            <div class="left">
                                                Barang Yang Hilang
                                            </div>
                                            <div class="right">
                                                {{ $item->kehilangan->barang_hilang }}
                                            </div>
                                        </div>
                                        <div class="lost-item">
                                            <div class="left">
                                                Waktu Kehilangan
                                            </div>
                                            <div class="right">
                                                {{ $item->kehilangan->waktu_kehilangan->translatedFormat('j F Y H:i') }}
                                            </div>
                                        </div>
                                        <div class="lost-keterangan">
                                            <div class="the-keterangan">
                                                <div class="left">
                                                    Keterangan
                                                </div>
                                                <div class="right">
                                                    {{ $item->kehilangan->keterangan }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="lost-respon">
                                            <div class="the-respon">
                                                <div class="left">
                                                    Respon
                                                </div>
                                                <div class="right">
                                                    {{ $item->kehilangan->respon }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    {{-- RIWAYAT KEHILANGAN --}}


    {{-- RIWAYAT KERUSAKAN --}}
    @if ($all->isNotEmpty())
        @foreach ($all as $item)
            @if ($item->kerusakan_id)
                <div class="modal fade in riwayat-kerusakan" id="riwayat-kerusakan{{ $item->kerusakan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="first">
                                    <div class="top">
                                        Laporan Kerusakan
                                    </div>
                                    <div class="bottom">
                                        {{ $item->kerusakan->created_at->translatedFormat('j F Y H:i:s') }} WIB
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="umum">
                                        <div class="umum-item">
                                            <div class="left">
                                                Nama User
                                            </div>
                                            <div class="right">
                                                {{ $item->kerusakan->nama }}
                                            </div>
                                        </div>
                                        <div class="umum-item">
                                            <div class="left">
                                                No. Kamar
                                            </div>
                                            <div class="right">
                                                Kamar No. {{ $item->kerusakan->no_kamar }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lost">
                                        <div class="lost-item">
                                            <div class="left">
                                                Tanggal Rusak
                                            </div>
                                            <div class="right">
                                                {{ $item->kerusakan->tanggal_rusak->translatedFormat('j F Y') }}
                                            </div>
                                        </div>
                                        <div class="lost-item">
                                            <div class="left">
                                                Bagian Rusak
                                            </div>
                                            <div class="right">
                                                {{ $item->kerusakan->bagian_rusak }}
                                            </div>
                                        </div>

                                        @if ($item->kerusakan->keterangan)
                                            <div class="lost-keterangan">
                                                <div class="the-keterangan">
                                                    <div class="left">
                                                        Keterangan
                                                    </div>
                                                    <div class="right">
                                                        {{ $item->kerusakan->keterangan }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="foto">
                                            <div class="titles">
                                                Foto Kerusakan
                                            </div>
                                            <div class="foto-item">
                                                @if ($item->kerusakan->gambarKerusakan)
                                                    @foreach ($item->kerusakan->gambarKerusakan as $gambar)
                                                        @if ($gambar->gambar1)
                                                            <div class="item foto-crew" data-id="{{ $gambar->id }}">
                                                                <div class="i-gambars">
                                                                    <img src="{{ asset('uploads/' . $gambar->gambar1) }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($gambar->gambar2)
                                                            <div class="item foto-crew" data-id="{{ $gambar->id }}">
                                                                <div class="i-gambars">
                                                                    <img src="{{ asset('uploads/' . $gambar->gambar2) }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($gambar->gambar3)
                                                            <div class="item foto-crew" data-id="{{ $gambar->id }}">
                                                                <div class="i-gambars">
                                                                    <img src="{{ asset('uploads/' . $gambar->gambar3) }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($gambar->gambar4)
                                                            <div class="item foto-crew" data-id="{{ $gambar->id }}">
                                                                <div class="i-gambars">
                                                                    <img src="{{ asset('uploads/' . $gambar->gambar4) }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($gambar->gambar5)
                                                            <div class="item foto-crew" data-id="{{ $gambar->id }}">
                                                                <div class="i-gambars">
                                                                    <img src="{{ asset('uploads/' . $gambar->gambar5) }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="lost-respon">
                                            <div class="the-respon">
                                                <div class="left">
                                                    Respon
                                                </div>
                                                <div class="right">
                                                    {{ $item->kerusakan->respon }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    {{-- RIWAYAT KERUSAKAN --}}


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
                <a href="/user/riwayat/" class="nav-link">
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
