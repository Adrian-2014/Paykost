@extends('layout.main')
@section('title', 'cuci basah')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/cuci-basah.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/cuci" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Layanan Cuci Basah
            </div>
        </div>
    </div>

    <div class="blanks">
        <div class="blank">
            <img src="{{ asset('img/people.png') }}">
            <div class="isi-blank">
                Kamu belum memilih item apapun,
            </div>
            <div class="sec">
                Silahkan pilih item terlebih dahulu !
            </div>
            <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> <span class="tombol">+</span> <span class="isian">Tambahkan</span></button>
        </div>
    </div>

    <section class="body">

        {{-- <div class="container">
            <div class="row pesanan">
                 <div class="col-12 pesanan-items">
                    <div class="item item1">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/shirt.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Kaos
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 2000
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item1')" class="kurang">-</button>
                                <button onclick="tambah('item1')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item2">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/kemeja.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Kemeja
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 4000
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item2')" class="kurang">-</button>
                                <button onclick="tambah('item2')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item3">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/socks.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Kaos Kaki
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 1000
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item3')" class="kurang">-</button>
                                <button onclick="tambah('item3')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item4">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/pants.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Celana
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 2500
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item4')" class="kurang">-</button>
                                <button onclick="tambah('item4')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item5">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/towel.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Handuk
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 2500
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item5')" class="kurang">-</button>
                                <button onclick="tambah('item5')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item6">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/underwear.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Pakaian Dalam
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 1000
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item6')" class="kurang">-</button>
                                <button onclick="tambah('item6')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item7">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/skirt.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Rok
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 1000
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item7')" class="kurang">-</button>
                                <button onclick="tambah('item7')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item item8">
                        <div class="image-item">
                            <img src="{{ asset('gambar-kategori/tie.png') }}">
                        </div>
                        <div class="rincian-item">
                            <div class="nama-item fw-medium">
                                Dasi
                            </div>
                            <div class="detail-item">
                                <div class="harga fw-semibold">
                                    Rp. 500
                                </div>
                                <div class="per">
                                    /pcs
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="nilai">
                                0
                            </div>
                            <div class="pm">
                                <button onclick="kurang('item8')" class="kurang">-</button>
                                <button onclick="tambah('item8')" class="tambah">+</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

        {{-- <div class="add">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="trigger-modal">
                    +
                </div>
            </button>
        </div> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="isi">
                            Pilih Item
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                            <div class="info-umum">
                                <div class="info-item">
                                    <div class="kiri">
                                        Nama User
                                    </div>
                                    <div class="kanan">
                                        {{ auth()->user()->name }}
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="kiri">
                                        No. Kamar
                                    </div>
                                    <div class="kanan">
                                        Kamar No. 5
                                    </div>
                                </div>
                            </div>

                            <div class="item-choice">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div clas="isi">
                                            Pilih Item Untuk Di Cuci
                                        </div>
                                        <i class="bi bi-caret-down-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">

                                        <li class="first">
                                            <div class="item" onclick="changeValue('Kamar No. 1', 'Rp. 1.300.000', 'Uk. 3,5 x 3m')">
                                                <div class="values">
                                                    <img src="{{ asset('gambar-kategori/shirt.png') }}">
                                                    <div class="name">
                                                        Baju
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1000
                                                        </div>
                                                        <div class="per">
                                                            /pcs
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambahan">
                                                    +
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal"> <span class="tombol">+</span> <span class="isian">Tambah</span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- <div class="for-modal navbar fixed-bottom d-flex justify-content-center ">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Pesan Jasa
        </button>
    </div> --}}

    {{-- <script>
        // Function untuk menambah jumlah item
        function tambah(item) {
            var nilaiDiv = document.querySelector('.' + item + ' .nilai');
            var nilai = parseInt(nilaiDiv.textContent);
            nilaiDiv.textContent = nilai + 1;
        }

        // Function untuk mengurangi jumlah item
        function kurang(item) {
            var nilaiDiv = document.querySelector('.' + item + ' .nilai');
            var nilai = parseInt(nilaiDiv.textContent);
            if (nilai > 0) {
                nilaiDiv.textContent = nilai - 1;
            }
        }

        // Function untuk memperbarui subtotal
        function updateSubtotal(item, nilai) {
            var itemDiv = document.querySelector('.' + item);
            var hargaPerBarang = parseInt(itemDiv.querySelector('.harga').textContent.trim().split(' ')[1]);
            var hargaBarang = hargaPerBarang * nilai;

            // Update subtotal harga barang
            var subtotalDiv = document.getElementById('' + item);
            subtotalDiv.textContent = 'Rp. ' + hargaBarang;

            // Update total harga
            hitungTotalHarga();
        }

        // Function untuk menghitung total harga semua item
        function hitungTotalHarga() {
            var totalHarga = 0;
            var items = document.querySelectorAll('.item');
            items.forEach(function(item) {
                var subtotalHarga = parseInt(item.querySelector('.subtotal').textContent.trim().split(' ')[1]);
                totalHarga += subtotalHarga;
            });
            document.getElementById('totalHarga').textContent = 'Rp. ' + totalHarga;
        }
    </script> --}}

    <script>
        function tambah(item) {
            var nilaiDiv = document.querySelector('.' + item + ' .nilai');
            var nilai = parseInt(nilaiDiv.textContent);
            nilaiDiv.textContent = nilai + 1;
            hitungTotalHarga();
        }

        function kurang(item) {
            var nilaiDiv = document.querySelector('.' + item + ' .nilai');
            var nilai = parseInt(nilaiDiv.textContent);
            if (nilai > 0) {
                nilaiDiv.textContent = nilai - 1;
                hitungTotalHarga();
            }
        }

        function hitungTotalHarga() {
            var items = document.querySelectorAll('.pesanan-items .item');
            var totalHarga = 0;

            items.forEach(function(item) {
                var nilai = parseInt(item.querySelector('.nilai').textContent);
                var harga = parseInt(item.querySelector('.harga').textContent.replace('Rp. ', '').replace(',', ''));
                totalHarga += nilai * harga;
            });

            document.getElementById('total-harga').textContent = 'Rp.' + ' ' + totalHarga.toLocaleString();

            var subtotal = document.querySelector('.modal .modal-dialog .modal-content .modal-body .subtotals');
            subtotal.innerHTML = ''; // Mengosongkan isi subtotal sebelum mengisi kembali

            items.forEach(function(item) {
                var nilai = parseInt(item.querySelector('.nilai').textContent);
                if (nilai > 0) {
                    var namaItem = item.querySelector('.nama-item').textContent;
                    var hargaItem = parseInt(item.querySelector('.harga').textContent.replace('Rp. ', '').replace(',', ''));
                    var subtotalItem = nilai * hargaItem;
                    var gambarItem = item.querySelector('.image-item img').src;
                    subtotal.innerHTML += ` <div class="subtotal">
                                <div class="gambar">
                                    <img src="${gambItem}">
                                </div>
                                <div class="details">
                                    <div class="nama fw-medium">${namaItem}</div>
                                    <div class="nilai">
                                        ( ${nil} )
                                    </div>
                                </div>
                                <div class="sub">
                                    Rp. ${subtotalItem.toLocaleString()}
                                </div>
                            </div>`;
                }
            });
        }
    </script>

@endsection
