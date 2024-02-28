@extends('layout.main')
@section('title', 'rincian-pembyaran')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/konfirmasi-pesan.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/cuci" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Konfirmasi Pemesanan
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
                <div class="kanan">24-02-2024</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Tanggal Laundry</div>
                <div class="kanan">20-02-2024 / 08:24</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Tanggal Pengambilan</div>
                <div class="kanan">24-02-2024 / 08:24</div>
            </div>
            <div class="umum-item">
                <div class="kiri">Jumlah Barang</div>
                <div class="kanan">20 potong</div>
            </div>
        </div>
        <div class="inform-total">
            <div class="info">total Harga</div>
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
            <div class="atas-nama fw-medium">
                A/N ADRIANS
            </div>
        </div>

        {{-- <div class="bc">
            <button type="submit" class="btn">
                Konfirmasi Pembayaran
            </button>
        </div> --}}
    </form>


    <script>
        function salinTeks() {
            var text = document.getElementById("no-rek").innerText;
            var iconSalin = document.querySelctor('.bi.bi-copy');
            navigator.clipboard.writeText(text).then(function() {

                var successMessage = document.createElement('div');
                successMessage.classList.add('notification', 'visible');
                successMessage.textContent = 'Berhasil dihapus';
                isian.appendChild(successMessage);

                // Menambahkan timeout untuk menghapus pesan setelah 2 detik
                setTimeout(function() {
                    successMessage.classList.remove('visible');
                }, 800);
            }, function(err) {
                console.error('Gagal menyalin nomor rekening: ', err);
            });
        }
    </script>

@endsection
