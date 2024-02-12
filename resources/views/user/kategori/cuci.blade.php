@extends('layout.main')
@section('title', 'Jasa Cuci Baju')
<link rel="stylesheet" href="{{ asset('/css/user-css/kategori/cuci.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                JASA CUCI BAJU
            </div>
        </div>
    </div>

    <div class="splide banner">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide satu">
                    <div class="isi">
                        <div class="quote fw-semibold">
                            CUCI BERSIH & WANGI
                        </div>
                        <div class="diskon">
                            <div class="satu">
                                Diskon 30%
                            </div>
                            <div class="dua">
                                untuk pesanan pertama
                            </div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide dua"><img src="{{ asset('img-chategories/Putih & Merah Muda Minimalis Banner  Promosi Self Service Laundry.jpg') }}"></li>
                <li class="splide__slide tiga">
                    <img src="{{ asset('img-chategories/Kuning Ungu Ilustrasi Spanduk Jasa Cuci Baju Kilat.jpg') }}" alt="">
                </li>
            </ul>
        </div>
    </div>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            // padding: '0rem',
            gap: '1rem',
            perPage: 1,
            pagination: false,
            arrows: false,
        });

        splide.mount();
    </script>
@endsection
