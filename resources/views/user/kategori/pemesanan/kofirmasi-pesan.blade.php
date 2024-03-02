@extends('layout.main')
@section('title', 'rincian-pembyaran')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/konfirmasi-pesan.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@trimbleinc/modus-bootstrap@1.6.3/dist/modus.min.css">
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
                <div class="copy" onclick="salinTeks()">
                    <img src="{{ asset('img-chategories/copy.png') }}" class="ico">
                </div>
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
    <div class="alert">
        <div class="menyala">

        </div>
    </div>

    <div class="splide banner" role="group" aria-label="Splide Basic HTML Example" id="label">
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

    <div class="container cuci-sepatu overflow-hidden text-center">
        <div class="row">
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/fast-cleaning.jpeg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Fast Cleaning
                        </div>
                        <div class="desk">
                            Layanan pembersihan sepatu cepat
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">15.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/deep-cleaning.jpeg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Deep Cleaning
                        </div>
                        <div class="desk">
                            Pembersihan detail dan menyeluruh
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">22.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/repaint.jpg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Repaint
                        </div>
                        <div class="desk">
                            Perawatan restorasi warna sepatu
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">30.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/whitening.jpg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Whitening
                        </div>
                        <div class="desk">
                            Perawatan sepatu yang menguning
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">25.000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var splide = new Splide('.splide', {
            perPage: 1,
            type: 'loop',
            pagination: false,
            // drag: false,
            autoplay: true,
            arrows: false,
            interval: 5000,
        });

        splide.mount();
    </script>

    <script>
        function salinTeks() {
            // Pilih elemen dengan ID "no-rek"
            var elem = document.getElementById("no-rek");
            var button = document.querySelector(".copy");
            var ico = document.querySelector('.ico');
            var alert = document.querySelector('.alert');
            var menyala = document.querySelector('.menyala');

            var range = document.createRange();
            range.selectNode(elem);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();

            // button.classList.add('copied');
            ico.src = "{{ asset('img-chategories/copied.png') }}";
            ico.classList.add('co');
            menyala.classList.add('cops');
            var isCopy = document.createElement('div');
            isCopy.classList.add('content');
            iscops = elem.innerHTML;
            menyala.innerHTML = ` <div class="valuer">${iscops}</div>
            <div class="teks"> berhasil disalin </div>`;

            setTimeout(function() {
                // button.classList.remove('copied');
                ico.src = "{{ asset('img-chategories/copy.png') }}";
                ico.classList.remove('co');
                menyala.classList.remove('cops');

            }, 1500);

        }
    </script>

@endsection
