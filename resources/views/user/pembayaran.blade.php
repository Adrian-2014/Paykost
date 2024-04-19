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
    <form action="{{ route('bayarKost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        [ ] <div class="container-fluid for-explained">
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
                    <div class="bottom" id="paynows">
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
                        ID Transaksi
                    </div>
                    <div class="right">
                        <input type="text" name="id_pembayaran" value="" readonly id="id_pembayaran">
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Nama User
                    </div>
                    <div class="right">
                        <input type="text" name="nama_user" value="{{ auth()->user()->name }}" readonly>
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        No. Kamar
                    </div>
                    <div class="right">
                        <input type="hidden" name="no_kamar" value="{{ auth()->user()->no_kamar }}">
                        Kamar No. {{ auth()->user()->no_kamar }}
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Bulan Tagihan
                    </div>
                    <div class="right">
                        @if ($pembayaran->isEmpty())
                            <input type="text" class="bulanTagihan" id="reells" readonly name="bulan_tagihan">
                        @else
                            @foreach ($pembayaran as $item)
                                <input type="text" class="bulanTagihan" id="bts" readonly name="bulan_tagihan" value="{{ $item->pembayran_selanjutnya }}">
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Tanggal Masuk
                    </div>
                    @if ($pembayaran->isEmpty())
                        <input type="hidden" name="tanggal_masuk" id="tm" value="{{ auth()->user()->tanggal_masuk }}">
                    @else
                        @foreach ($pembayaran as $item)
                            <input type="hidden" name="tanggal_masuk" id="tm" value="{{ $item->pembayran_selanjutnya }}">
                        @endforeach
                    @endif
                    <div class="right">
                        <input type="text" name="tm" id="tgl-masuk" value="" readonly>
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Durasi Ngekost
                    </div>
                    <div class="right">
                        <input type="text" name="durasi_ngekost" id="durasi" value="" readonly>
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
                            <input type="hidden" value="{{ $kamar->harga_kamar }}" name="total_tagihan">
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
                <input type="file" name="bukti" id="bukti" class="d-none" onchange="loadFile(event)" x-model="bukti">
                <label for="bukti" id="for-bukti">
                    <i id="icon-upload" class="bi bi-cloud-arrow-up"></i>
                    <div class="gambar-upload">
                        <div class="upload-real">
                            <img src="" id="showimg" class="d-none">
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <input type="hidden" name="bank_name" id="bank_name">
        <input type="hidden" name="tagihan_selanjutnya" id="next-pay">
        <div class="confirm">
            <div class="container-fluid">
                <button type="submit" class="btn" id="nextPage">Bayar Sekarang</button>
            </div>
        </div>
    </form>

    {{-- SCRIPT --}}
    <script>
        var input = document.querySelector('input'); // get the input element
        input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
        resizeInput.call(input); // immediately call the function

        function resizeInput() {
            this.style.width = this.value.length + "ch";
        }
        document.addEventListener('DOMContentLoaded', function() {
            var sumber = getElementById('bts');
            if (sumber) {
                sumber.slice(2);
                console.log('sukses');
            }
        });

        function ubahFormatTanggal(tanggal) {
            // Array untuk nama bulan
            var namaBulan = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            // Pisahkan tanggal, bulan, dan tahun
            var tanggalSplit = tanggal.split('-');
            // Pastikan terdapat tiga elemen setelah split
            if (tanggalSplit.length !== 3) {
                return "Format tanggal tidak valid";
            }
            var tahun = tanggalSplit[0];
            var bulan = parseInt(tanggalSplit[1], 10);
            var tanggal = parseInt(tanggalSplit[2], 10);

            // Periksa apakah tanggal, bulan, dan tahun valid
            if (isNaN(tahun) || isNaN(bulan) || isNaN(tanggal)) {
                return "Format tanggal tidak valid";
            }

            var tanggalFormatted = tanggal.toString().padStart(2, '0');
            // Buat string dengan format yang diinginkan
            var tanggalBaru = tanggalFormatted + " " + namaBulan[bulan - 1] + " " + tahun;
            var tanggalUntukBayar = namaBulan[bulan - 1] + " " + tahun;
            var nextBayar = tanggalFormatted + " " + namaBulan[bulan] + " " + tahun;

            return {
                tanggalBaru: tanggalBaru,
                nextBayar: nextBayar,
                tanggalUntukBayar: tanggalUntukBayar
            };
        }
        var input = document.querySelector('#tm');
        if (input) {
            var tanggalAwal = input.value;
            var tanggalBaruObj = ubahFormatTanggal(tanggalAwal);
            var targetTanggal = document.querySelector('#tgl-masuk');
            targetTanggal.value = tanggalBaruObj.tanggalBaru;
            console.log(tanggalBaruObj.tanggalBaru);

            // For Not pembayaran
            // var nextpembayaran = document.getElementById('next-pay');
            var now = document.getElementById('reells');
            now.value = tanggalBaruObj.tanggalUntukBayar;
            var nows = document.getElementById('paynows');
            nows.innerHTML = tanggalBaruObj.tanggalUntukBayar;
            // nextpembayaran.value = tanggalBaruObj.nextBayar;
        } else {
            console.error("Elemen input dengan id '#tm' tidak ditemukan.");
        }
        // Ambil nilai dari elemen HTML
        var tanggalDiberikan = document.getElementById('tm').value;
        // Buat objek tanggal dari nilai yang diambil
        var tanggalDiberikanObj = new Date(tanggalDiberikan);
        // Tanggal hari ini
        var tanggalHariIni = new Date();
        // Hitung selisih dalam milidetik
        var selisihWaktu = tanggalHariIni - tanggalDiberikanObj;
        // Konversi selisih waktu ke hari
        var selisihHari = Math.floor(selisihWaktu / (1000 * 60 * 60 * 24));
        // Hitung selisih bulan dan hari
        var selisihBulan = tanggalHariIni.getMonth() - tanggalDiberikanObj.getMonth() + (12 * (tanggalHariIni.getFullYear() - tanggalDiberikanObj.getFullYear()));
        var selisihHariSisa = tanggalHariIni.getDate() - tanggalDiberikanObj.getDate();
        // Jika selisih hari negatif, kurangi satu bulan
        if (selisihHariSisa < 0) {
            selisihBulan--;
            selisihHariSisa += new Date(tanggalHariIni.getFullYear(), tanggalHariIni.getMonth(), 0).getDate();
        }
        // Tampilkan hasil
        console.log(selisihBulan + " bulan " + selisihHariSisa + " hari.");
        var durasi = document.getElementById('durasi');
        durasi.value = selisihBulan + " bulan " + selisihHariSisa + " hari.";

        // Bualan Tagihan

        document.addEventListener('DOMContentLoaded', function() {

            var tanggalInput = document.getElementById('tm').value;

            // Membuat objek Date dari tanggal input
            var tanggalDiberikan = new Date(tanggalInput);

            // Mendapatkan tanggal 1 bulan setelah tanggal yang diberikan
            var tanggalSatuBulanSetelah = new Date(tanggalDiberikan.getFullYear(), tanggalDiberikan.getMonth() + 1, tanggalDiberikan.getDate());

            var tglNext = document.querySelector('#next-pay');
            tglNext.value = tanggalSatuBulanSetelah.toISOString().split('T')[0];
            // Output tanggal 1 bulan setelah tanggal yang diberikan
            console.log(tanggalSatuBulanSetelah.toISOString().split('T')[0]); // Format tanggal YYYY-MM-DD
        });
    </script>
    <script>
        function generateRandomString(length) {
            const characters = '1ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '#';

            for (let i = 1; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }

            return result;
        }

        const randomString = generateRandomString(12);
        var target = document.getElementById('id_pembayaran');
        target.value = randomString;
        console.log(randomString);
    </script>
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
                    // inputGambar.value = gambar;
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

        function loadFile(event) {
            var image = document.getElementById('showimg');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('d-none');
            var icon = document.getElementById('icon-upload');
            icon.classList.add('d-none');
        }
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
