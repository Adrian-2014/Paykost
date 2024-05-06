@extends('layout.main')

<link rel="stylesheet" href="{{ asset('css/user-css/pdf.css') }}">

@section('title', 'pdf-download')


@section('container')

    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/user/index" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Download PDF
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid once">
        <div class="heading">
            <div class="item">
                <div class="logo">
                    <img src="{{ asset('img/two.png') }}">
                </div>
                <div class="id">
                    {{ $data->id_pembayaran }}
                </div>
            </div>
        </div>
        <div class="bodies">
            <div class="pay-one">
                <div class="status">
                    @if ($data->status === 'Diterima')
                        <div class="status-pay success">
                            Pembayaran Berhasil!
                        </div>
                    @else
                        <div class="status-pay fail">
                            Pembayaran Ditolak!
                        </div>
                    @endif
                    <div class="status-tgl">
                        {{ $data->created_at->translatedFormat('j F Y H:i:s') }} WIB
                    </div>
                </div>
                <div class="harga">
                    Rp. {{ $data->total_tagihan }}
                </div>
            </div>
            <div class="pay-sec">
                <div class="info-content">
                    <div class="tanggal-masuk items">
                        <div class="top">Tanggal Masuk</div>
                        <div class="bottom">{{ $data->tanggal_masuk }}</div>
                    </div>
                    <div class="durasi items">
                        <div class="top">Durasi Ngekost</div>
                        <div class="bottom">{{ $data->durasi_ngekost }}</div>
                    </div>
                </div>
            </div>
            <div class="pay-third">
                <div class="info-umum">
                    <div class="item">
                        <div class="left">Nama User</div>
                        <div class="right">{{ $data->name }}</div>
                    </div>
                    <div class="item">
                        <div class="left">No. Kamar</div>
                        <div class="right">Kamar No. {{ $data->no_kamar }}</div>
                    </div>
                    <div class="item">
                        <div class="left">Bulan Tagihan</div>
                        <div class="right">{{ $data->bulan_tagihan->translatedFormat('F Y') }}</div>
                    </div>
                    <div class="item">
                        <div class="left">Total Tagihan</div>
                        <div class="right">Rp. {{ $data->total_tagihan }}</div>
                    </div>
                </div>
                <div class="info-pay">
                    <div class="item">
                        <div class="left">Metode Bayar</div>
                        @php
                            $bank = \App\Models\Bank::where('id', $data->bank_id)->first();
                        @endphp
                        <div class="right">Transfer {{ $bank->nama }}</div>
                    </div>
                    <div class="item">
                        <div class="left">Atas Nama</div>
                        <div class="right">{{ $data->name }}</div>
                    </div>
                </div>
            </div>
            <div class="pay-fourth">
                <div class="bukti">
                    <div class="top">Bukti Pembayaran</div>
                    <div class="bot">
                        <img src="{{ asset('uploads/' . $data->bukti) }}">
                    </div>
                </div>
            </div>
            @if ($data->status === 'Ditolak')
                <div class="pay-last">
                    <div class="content">
                        <div class="head-tolak">
                            Alasan Penolakan
                        </div>
                        <div class="isi-tolak">
                            {{ $data->pesan }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
@endsection
