@extends('layout.main')
@section('title', 'rincian-pembyaran')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/konfirmasi-pesan.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/basah " class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Pembayaran
            </div>
        </div>
    </div>

    <form action="" method="" class="form">
        <div class="inform-umum">
            <div class="umum-item">
                <div class="kiri">Nama User</div>
                <div class="kanan">{{ auth()->user()->name }}</div>
            </div>
            <div class="umum-item">
                <div class="kiri">No. Kamar</div>
                <div class="kanan">Kamar No. 5</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Layanan</div>
                <div class="kanan">Cuci Basah</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Tanggal Order</div>
                <div class="kanan">19/02/2024 - 19:45:42</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Tanggal Laundry</div>
                <div class="kanan">20/02/2024 - 08:24:11</div>
            </div>
            <div class="umum-item special">
                <div class="kiri">Tanggal Pengambilan</div>
                <div class="kanan">24/02/2024 - 08:24:11</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Jumlah Barang</div>
                <div class="kanan">20 potong</div>
            </div>
        </div>
        <div class="inform-total">
            <div class="info">Total Biaya</div>
            <div class="value fw-medium">Rp. 200.000</div>
        </div>
        <div class="inform-pay">
            <div class="media">
                <div class="logo">
                    <img src="{{ asset('img/bca.png') }}">
                </div>
                <div class="nama-bank">
                    Bank BCA
                </div>
            </div>
            <div class="message">Mohon transfer ke No. Rekening ini</div>
            <div class="rekening">
                <div class="no-rek" id="no-rek">065722313040</div>
                <div class="copy" onclick="salinTeks()"><i class="bi bi-copy"></i></div>
            </div>
            <div class="atas-nama fw-medium d-flex">
                <div class="a fw-bold">
                    A/N
                </div>
                <div class="n">ADRIAN</div>
            </div>
        </div>

        <div class="kumpulan-button">
            <a href="/cuci" class="back">Halaman Utama</a>
            <button type="submit" class="submit">Konfirmasi Pembayaran</button>
        </div>
    </form>

    <div class="splide banner" role="group" aria-label="Splide Basic HTML Example" id="label">

        <div class="splide__arrows splide__arrows--ltr">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide" aria-controls="splide01-track">
                {{-- <i class="bi bi-chevron-left"></i> --}}
            </button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track">
                {{-- <i class="bi bi-chevron-right"></i> --}}
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ asset('img-chategories/Paykost-Laundry.png') }}">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('img-chategories/laundry-banner-2.png') }}">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('img-chategories/laundry-banner-3.png') }}">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('img-chategories/laundry-banner-4.png') }}">
                </li>
            </ul>
        </div>
    </div>

    <div class="container cuci-sepatu">
        <div class="row">
            <div class="col-12">
                <div class="icon-sepatu">

                </div>
                <div class="nama-layananan">
                    Jasa Fast Cleaning
                </div>
            </div>
            <div class="col-12">
                <div class="icon-sepatu">

                </div>
                <div class="nama-layananan">
                    Jasa Deep Cleaning
                </div>
            </div>
            <div class="col-12">
                <div class="icon-sepatu">

                </div>
                <div class="nama-layananan">
                    Jasa Restorasi Warna
                </div>
            </div>
            <div class="col-12">
                <div class="icon-sepatu">

                </div>
                <div class="nama-layananan">
                    Jasa Whitening
                </div>
            </div>
        </div>
    </div>

    <div class="alert">
        <div class="menyala">

        </div>
    </div>

    <script>
        var splide = new Splide('.splide', {
            perPage: 1,
            type: 'loop',
            pagination: false,
            // drag: false,
            autoplay: true,
            interval: 5000,
        });

        splide.mount();
    </script>


    <script>
        function salinTeks() {
            // Pilih elemen dengan ID "no-rek"
            var elem = document.getElementById("no-rek");
            var button = document.querySelector(".copy");
            var ico = document.querySelector('.bi.bi-copy')
            var menyala = document.querySelector('.menyala');

            var range = document.createRange();
            range.selectNode(elem);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();

            button.classList.add('copied');
            menyala.classList.add('cops');
            var isCopy = document.createElement('div');
            isCopy.classList.add('content');
            iscops = elem.innerHTML;
            menyala.innerHTML = ` <div class="valuer">${iscops}</div>
            <div class="teks"> berhasil disalin </div>`;

            setTimeout(function() {
                button.classList.remove('copied');
                menyala.classList.remove('cops');

            }, 1500);

        }
    </script>

@endsection
