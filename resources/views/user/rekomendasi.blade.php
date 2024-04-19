@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/rekomendasi.css') }}">

@section('title', 'Rekomendasi Kamar')

@section('container')

    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/user/index" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Kamar Kost No. {{ $data->nomor_kamar }}
                </div>
            </div>
        </div>
    </div>

    <div class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @if ($data->gambarKamar->isNotEmpty())
                    @foreach ($data->gambarKamar as $gambar)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $gambar->gambar) }}">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="container-fluid info-umum">
        <div class="umum-item">
            <div class="no-kamar">
                Kamar No. {{ $data->nomor_kamar }}
            </div>
            <div class="uk-kamar">
                Ukuran Kamar <span id="t-ukuran">{{ $data->ukuran_kamar }}</span>
            </div>
        </div>
        <div class="umum-harga">
            Rp. <span>{{ $data->harga_kamar }}</span>
        </div>
    </div>

    <div class="container-fluid fasilitas">
        <div class="head">
            Fasilitas Kost
        </div>
        <div class="isian-singkat">
            Kamar ini dilengkapi berbagai fasilitas untuk <span>Kemudahan</span> & <span>Kenyamanan</span> Kamu.
        </div>
        <div class="mycontent">
            <div class="jud-kamar">
                Fasilitas Kamar
            </div>
            <div class="fasilitas kamar">
                @foreach ($fasKamar as $facilite)
                    @php
                        $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $data->id)
                            ->where('fasilitas_id', $facilite->id)
                            ->first();
                    @endphp
                    @if ($kamar_kost)
                        <div class="item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $facilite->id }}">
                            <div class="for-img">
                                <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                            </div>
                        </div>
                    @endif
                    <div class="modal fade" id="exampleModal{{ $facilite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                    <div class="desk">
                                        <div class="top">
                                            {{ $facilite->nama }}
                                        </div>
                                        <div class="bottom">
                                            {{ $facilite->deskripsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="jud-umum">
                Fasilitas Umum
            </div>
            <div class="fasilitas umum">
                @foreach ($fasUmum as $facilite)
                    @php
                        $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $data->id)
                            ->where('fasilitas_id', $facilite->id)
                            ->first();
                    @endphp
                    @if ($kamar_kost)
                        <div class="item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $facilite->id }}">
                            <div class="for-img">
                                <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                            </div>
                        </div>
                    @endif
                    <div class="modal fade" id="exampleModal{{ $facilite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                    <div class="desk">
                                        <div class="top">
                                            {{ $facilite->nama }}
                                        </div>
                                        <div class="bottom">
                                            {{ $facilite->deskripsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="confirm">
        <div class="container-fluid">
            <a href="/pindah" class="btn" id="nextPage">Ajukan Pindah Kamar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var targetData = document.getElementById('t-ukuran');
            var sukses = targetData.innerHTML.replace('m', ' Meter');
            targetData.innerHTML = sukses;
            console.log(sukses);
        })
    </script>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 1,
            autoplay: true,
            interval: 4000,
            arrows: false,
        });

        splide.mount();
    </script>
@endsection
