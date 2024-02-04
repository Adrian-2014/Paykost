@extends('layout.main')

<link rel="stylesheet" href="{{ asset('css/user-css/pdf.css') }}">

@section('title', 'pdf-download')


@section('container')

    <div class="container-fluid satu position-relative">
        <nav class="navbar fixed-top px-3 py-1">
            <div class="navbar-brand">
                <img src="{{ asset('img/two.png') }}">
            </div>
            <div class="id">
                #0D97GEK7208F
            </div>
        </nav>
    </div>

    <div class="pay-stat">
        <div class="pay">
            Pembayaran Berhasil!
        </div>
        <div class="tgl">
            08 November 2023 17:54:12 WIB
        </div>
        <div class="uang">
            Rp. 1.500.000
        </div>
    </div>

    <div class="info-kost">
        <div class="info-item">
            <div class="inf">
                Tanggal Masuk
            </div>
            <div class="value">
                08/12/2023
            </div>
        </div>
        <div class="info-item">
            <div class="inf">
                Durasi Ngekost
            </div>
            <div class="value">
                28 Bulan 13 Hari
            </div>
        </div>
    </div>

    <div class="info-pembayaran">
        <div class="information">
            <div class="info-item">
                <div class="name">
                    Nama
                </div>
                <div class="value">
                    Adrian Kurniawan
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    No. Kamar
                </div>
                <div class="value">
                    Kamar No. 5
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Bulan Tagihan
                </div>
                <div class="value">
                    November 2023
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Total Tagihan
                </div>
                <div class="value">
                    Rp. 1.500.000
                </div>
            </div>

        </div>
        <div class="information">
            <div class="info-item">
                <div class="name">
                    Metode Bayar
                </div>
                <div class="value">
                    Transfer Bank BCA
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Atas Nama
                </div>
                <div class="value">
                    Adrian
                </div>
            </div>
        </div>
    </div>

    <div class="bukti">
        <div class="name">
            Bukti Pembayaran
        </div>
        <div class="gambar">
            <img src="{{ asset('img/not.jpg') }}">
        </div>
    </div>

    <script>
        // window.onafterprint = window.close;
        window.print();
    </script>
@endsection
