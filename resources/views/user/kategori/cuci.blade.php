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
                Jasa Cuci Baju
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
                    <img src="{{ asset('img-chategories/Kuning Ungu Ilustrasi Spanduk Jasa Cuci Baju Kilat.jpg') }}">
                </li>
            </ul>
        </div>
    </div>

    <div class="layanan-cuci my-4">
        <div class="judul fw-medium mb-2 px-3">
            Layanan Kami
        </div>
        <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-3">
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/laundry.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Cuci Kering
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/towels.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Dry Cleaning
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/wet.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Cuci Basah
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/ironing.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Jasa Setrika
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Jasa Antar Jemput
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="item-pelayanan">
                        <a href="/pemesanan">
                            <img src="{{ asset('gambar-kategori/setrika.png') }}">
                            <div class="pelayanan-name fw-medium">
                                Cuci Setrika
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                // padding: '0rem',
                gap: '1rem',
                perPage: 1,
                pagination: false,
                autoplay: true,
                interval: 6000,
                arrows: false,
            });

            splide.options.arrowPathPrev = '<i class="bi bi-arrow-left"></i>';
            splide.options.arrowPathNext = '<i class="bi bi-arrow-right"></i>';

            splide.mount();
        });
    </script>


@endsection
