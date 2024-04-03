@extends('layout.main')
@section('title', 'Proses Laundry')
<link rel="stylesheet" href="{{ asset('/css/user-css/kategori/cuci.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Proses Laundry
            </div>
        </div>
    </div>

    @if ($pemesanans->isEmpty())
        <div class="emptyPage" id="emptyPage">
            <img src="{{ asset('img/people.png') }}">
            <div class="the-teks">
                Tidak Ada Proses yang Sedang Berlangsung!
            </div>
        </div>
    @else
        @foreach ($pemesanans as $item)
            <div class="super-khusus-proses">
                <div class="proses">
                    <div class="bungkus">
                        <div class="item">
                            <div class="header">
                                <div class="status @if ($item->status == 'Proses Cuci') processing @endif">
                                    {{ $item->status }}
                                </div>
                                <div class="layanan">
                                    {{ $item->jenis_layanan }}
                                </div>
                            </div>
                            <div class="main-content">
                                <div class="main-item id">
                                    <div class="kiri">ID Transaksi</div>
                                    <div class="kanan">{{ $item->id_pembelian }}</div>
                                </div>
                                <div class="main-item">
                                    <div class="kiri">Tgl Laundry</div>
                                    <div class="kanan">{{ $item->tgl_start }}</div>
                                </div>
                                <div class="main-item done">
                                    <div class="kiri">Tgl Selesai</div>
                                    <div class="kanan tgl-done">{{ $item->tgl_done }}
                                        <form class="status-form d-none" action="{{ route('updateStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="update-status-btn">Update Status</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-item harga">
                                    <div class="kiri">Total Biaya</div>
                                    <div class="kanan">{{ $item->total_biaya }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="pembungkus">

    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/cuci" class="nav-link">
                    <i class='bx bxs-home'></i>
                    <div class="isi fw-normal">Utama</div>
                </a>
            </div>
            <div class="nav-item active">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var targetElements = document.querySelectorAll('.tgl-done');

            function getWIBDateTime() {
                var now = new Date();
                var utcOffset = 7; // UTC offset untuk WIB adalah +7
                var localOffset = now.getTimezoneOffset() / 60; // Menghitung offset zona waktu lokal
                var wibOffset = utcOffset + localOffset; // Menghitung offset WIB
                var wibTime = new Date(now.getTime() + (wibOffset * 60 * 60 * 1000)); // Menambahkan offset untuk mendapatkan waktu WIB
                return wibTime;
            }

            targetElements.forEach(function(targetElement) {
                // Mendapatkan innerHTML dari elemen tersebut
                var tglDone = targetElement.innerHTML;
                var addForm = targetElement.querySelector('.status-form');

                var parts = tglDone.split(/[\/, :]/);

                // Membuat objek tanggal JavaScript
                var tglDones = new Date(parts[2], parts[1] - 1, parts[0], parts[3], parts[4], parts[5]);

                console.log("Tanggal yang diambil dari elemen HTML:");
                console.log(tglDone); // Menampilkan tanggal dari elemen HTML

                console.log("Tanggal dan waktu saat ini di Waktu Indonesia Barat (WIB):");
                console.log(getWIBDateTime());

                function executeIfPastWIBDate(htmlDate, wibDate, callback) {
                    if (htmlDate <= wibDate) {
                        callback();
                    }
                }

                // Mendapatkan tanggal dan waktu saat ini di Waktu Indonesia Barat (WIB)
                var wibDate = getWIBDateTime();

                // Fungsi yang ingin dijalankan jika tanggal dari elemen HTML melewati atau sama dengan WIB
                function myFunction() {
                    if (addForm) {
                        addForm.submit();
                    } else {
                        console.error("Form element not found!");
                    }

                }

                // Memanggil fungsi untuk mengecek apakah tanggal dari elemen HTML telah melewati atau sama dengan WIB, dan menjalankan fungsi `myFunction` jika ya.
                executeIfPastWIBDate(tglDones, wibDate, myFunction);
            });
        });
    </script>
@endsection
