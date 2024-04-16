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
                Jasa Laundry
            </div>
            <div class="help">
                <img src="{{ asset('gambar-kategori/customer-service.png') }}">
            </div>
        </div>
    </div>

    <div class="splide banner">
        <div class="splide__track">
            <ul class="splide__list">
                @if ($bannerPro->isEmpty())
                    <li class="splide__slide">
                        <div class="empty-pro">
                            <div class="one">
                                <img src="{{ asset('img/page.png') }}">
                            </div>
                            <div class="two">
                                Banner Belum Ditambahkan !
                            </div>
                        </div>
                    </li>
                @else
                    @foreach ($bannerPro as $item)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="const">

        <div class="layanan-cuci mt-2">
            <div class="judul fw-medium mb-2 px-3">
                Layanan Laundry
            </div>
            <div class="container text-center">
                <div class="row row-cols-3 gx-3 gy-2">
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/cuciExpress">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Express
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/basah">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/wet.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Basah
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/kering">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Kering
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/lipat">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Lipat
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/karpet">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/carpet.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Karpet
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/cuciSetrika">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/setrika.png') }}" class="cuciSetrika">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Setrika
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/bedCover">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/bed-cover.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Bed Cover
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/sprei">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/blanket.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Sprei
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/selimut">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/selimut.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Selimut
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/sepatu">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/running-shoe.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Cuci Sepatu
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/jasaSetrika">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/ironing.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Jasa Setrika
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item-pelayanan">
                            <a href="/dryCleaning">
                                <div class="gambar">
                                    <img src="{{ asset('gambar-kategori/towels.png') }}">
                                </div>
                                <div class="pelayanan-name fw-medium">
                                    Dry Cleaning
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item active">
                <a href="/cuci" class="nav-link">
                    <i class='bx bxs-home'></i>
                    <div class="isi fw-normal">Utama</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/proses" class="nav-link">
                    <i class='bx bxs-washer'></i>
                    <div class="isi fw-normal">Laundry</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/riwayatCuci" class="nav-link">
                    <i class='bx bx-history'></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
        </div>
    </nav>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Transaksi Berhasil!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 2500 // Waktu penampilan Sweet Alert (dalam milidetik)
            });
        </script>
    @endif

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
