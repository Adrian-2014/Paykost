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
                {{ $data->id_pembayaran }}
            </div>
        </nav>
    </div>

    <div class="pay-stat">
        <div class="pay">
            Pembayaran Berhasil!
        </div>
        <div class="tgl">
            {{ $data->updated_at->translatedFormat('j F Y H:i:s') }} WIB
        </div>
        <div class="uang">
            Rp. {{ $data->total_tagihan }}
        </div>
    </div>

    <div class="info-kost">
        <div class="info-item">
            <div class="inf">
                Tanggal Masuk
            </div>
            <div class="value">
                {{ $tanggalMasuk->translatedFormat('j F Y') }}
            </div>
        </div>
        <div class="info-item">
            <div class="inf">
                Durasi Ngekost
            </div>
            <div class="value">
                {{ $data->durasi_ngekost }}
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
                    {{ auth()->user()->name }}
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    No. Kamar
                </div>
                <div class="value">
                    Kamar No. {{ auth()->user()->no_kamar }}
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Bulan Tagihan
                </div>
                <div class="value">
                    {{ $data->bulan_tagihan->translatedFormat('F Y') }}
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Total Tagihan
                </div>
                <div class="value">
                    Rp. {{ $data->total_tagihan }}
                </div>
            </div>

        </div>
        <div class="information">
            <div class="info-item">
                <div class="name">
                    Metode Bayar
                </div>
                <div class="value">
                    @php
                        $bank = \App\Models\Bank::where('id', $data->bank_id)->first();
                    @endphp
                    Transfer {{ $bank->nama }}
                </div>
            </div>
            <div class="info-item">
                <div class="name">
                    Atas Nama
                </div>
                <div class="value">
                    {{ $data->name }}

                </div>
            </div>
        </div>
    </div>

    <div class="bukti">
        <div class="name">
            Bukti Pembayaran
        </div>
        <div class="gambar">
            <img src="{{ asset('uploads/' . $data->bukti) }}">
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
            
        });
    </script>
@endsection
