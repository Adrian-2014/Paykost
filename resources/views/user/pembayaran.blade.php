@extends('layout.main')

@section('title', 'Pembayaran kost')

<link rel="stylesheet" href="{{ asset('css/user-css/pembayaran.css') }}">

@section('container')

    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/user/index" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Pembayaran Kost
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid for-explained">
        <div class="container for-banner-kost">
            <div class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($kamarKost as $kamar)
                            @foreach ($kamar->gambarKamar as $gambar)
                                <li class="splide__slide">
                                    <img src="{{ asset('uploads/' . $gambar->gambar) }}">
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="container for-umum">
            <div class="left">
                <div class="top">
                    Pembayaran Kost Bulan :
                </div>
                <div class="bottom">
                    NOVEMBER 2024
                </div>
            </div>
            <div class="right">
                <span>Rp.</span>
                <div class="harga">
                    @foreach ($kamarKost as $kamar)
                        {{ $kamar->harga_kamar }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bayar">
        <div class="container backup">
            <div class="form-item">
                <div class="left">
                    Nama User
                </div>
                <div class="right">
                    {{ auth()->user()->name }}
                </div>
            </div>
            <div class="form-item">
                <div class="left">
                    No. Kamar
                </div>
                <div class="right">
                    Kamar No. {{ auth()->user()->no_kamar }}
                </div>
            </div>
            <div class="form-item">
                <div class="left">
                    Bulan Tagihan
                </div>
                <div class="right">
                    NOVEMBER 2024
                </div>
            </div>
            <div class="form-item">
                <div class="left">
                    Tanggal Masuk
                </div>
                <div class="right">
                    {{ auth()->user()->tanggal_masuk }}
                </div>
            </div>
            <div class="form-item">
                <div class="left">
                    Durasi Ngekost
                </div>
                <div class="right">
                    8 Bulan 16 Hari
                </div>
            </div>
        </div>
        <div class="container-fluid backup-special">
            <div class="form-item special">
                <div class="left">
                    Total Tagihan
                </div>
                <div class="right">
                    @foreach ($kamarKost as $kamar)
                        <span>Rp.</span> {{ $kamar->harga_kamar }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid gateway">
        <div class="for-top">
            <div class="judul">
                <div class="name">
                    Metode Pembayaran
                </div>
                <div class="iconku">
                    <i class="fas fa-wallet"></i>
                </div>
            </div>
        </div>
        <div class="payChoice">
            @foreach ($banks as $bank)
                <div class="payItems {{ $loop->first ? 'first' : ($loop->last ? 'last' : null) }}">
                    <div class="bank-item">
                        <div class="logos">
                            <img src="{{ asset('img/' . $bank->gambar) }}">
                        </div>
                        <div class="nama">
                            {{ $bank->nama }}
                        </div>
                    </div>
                    <div class="input">
                        <input type="radio" name="gate" value="bca">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid bukti">
        <div class="for-top">
            <div class="judul">
                <div class="name">
                    Bukti Pembayaran
                </div>
                <div class="icon">
                    <i class="fas fa-camera"></i>
                </div>
            </div>
        </div>
        <div class="for-input">
            <input type="file" name="bukti" id="bukti" class="d-none">
            <label for="bukti">
                <i id="icon-upload" class="bi bi-cloud-arrow-up"></i>
            </label>
        </div>
    </div>

    <div class="confirm">
        <div class="container-fluid">
            <button type="submit" class="btn" id="nextPage" disabled>Bayar Sekarang</button>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const payItems = document.querySelectorAll('.payItems');
            const inputGambar = document.getElementById('img'); // ID input gambar
            const inputNama = document.getElementById('bank_name'); // ID input nama

            payItems.forEach(function(item) {
                item.addEventListener('click', function(event) {
                    const radioInput = this.querySelector('input[type="radio"]');
                    const radioChecked = radioInput.checked;

                    // Toggle status input radio
                    radioInput.checked = !radioChecked;

                    // Matikan semua input radio kecuali yang dipilih
                    payItems.forEach(function(otherItem) {
                        const otherRadioInput = otherItem.querySelector('input[type="radio"]');
                        if (otherItem !== item) {
                            otherRadioInput.checked = false;
                        }
                    });

                    // Mengambil gambar dan nama dari item yang dipilih
                    const gambar = this.querySelector('.logos img').getAttribute('src');
                    const nama = this.querySelector('.nama').innerHTML;

                    // Memasukkan nilai gambar dan nama ke dalam input tersembunyi
                    inputGambar.value = gambar;
                    inputNama.value = nama;
                });

                const radioInput = item.querySelector('input[type="radio"]');
                radioInput.addEventListener('click', function(event) {
                    const radioChecked = this.checked;
                    const parentItem = this.closest('.payItems');

                    // Toggle status input radio
                    this.checked = !radioChecked;

                    // Matikan semua input radio kecuali yang dipilih
                    payItems.forEach(function(otherItem) {
                        const otherRadioInput = otherItem.querySelector('input[type="radio"]');
                        if (otherItem !== parentItem) {
                            otherRadioInput.checked = false;
                        }
                    });

                    // Mengambil gambar dan nama dari item yang dipilih
                    const gambar = parentItem.querySelector('.logos img').getAttribute('src');
                    const nama = parentItem.querySelector('.nama').innerHTML;

                    inputGambar.value = gambar;
                    inputNama.value = nama;
                });
            });
        });
    </script>
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            arrows: false,
        });
        splide.mount();
    </script>
@endsection
