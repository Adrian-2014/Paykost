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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel">
                            <img src="{{ asset('img/two.png') }}">
                        </div>
                        <div class="id">
                            #0D97GEK7208F
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

                            <div class="judul fw-medium">
                                Pilih Item Cucian !
                            </div>

                            <div class="item-choice">
                                <div class="dropdown" x-data="{ open: false }">
                                    <button class="btn dropdown-toggle" type="button" x-on:click="open = !open">
                                        <div clas="isi">
                                            Pilih Item untuk di Cuci
                                        </div>
                                        <i class="bi bi-caret-down-fill"></i>
                                    </button>

                                    <ul class="dropdown-menu" x-bind:class="{ 'show': open }">
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/shirt.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Baju
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1.000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/skirt.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Rok
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1.000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/kemeja.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Kemeja
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1.500
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/pants.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Celana Panjang
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1.500
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/tie.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Dasi
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 500
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/hoodie.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Hoodie
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 2.000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/underwear.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Celana Dalam
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 500
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/jacket.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Jaket
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 2.000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/pareo.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Sarung
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/flapper-dress.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Daster
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 1000
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('gambar-kategori/kaos-dalam.png') }}">
                                                    </div>
                                                    <div class="name">
                                                        Kaos Dalam
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            Rp. 500
                                                        </div>
                                                        <div class="per">
                                                            /ptg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="valuasi">
                                                    <div class="kurang" onclick="kurang(this)">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0" class="nilai">
                                                    <div class="tambah" onclick="tambah(this)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="subtotal" id="subtotalContainer">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal"> <span class="tombol">+</span> <span class="isian">Tambah</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function tambah(button) {
            var nilaiDiv = button.parentNode.querySelector('.nilai');
            var nilai = parseInt(nilaiDiv.value);
            nilaiDiv.value = nilai + 1;
            subtotal();
        }

        function kurang(button) {
            var nilaiDiv = button.parentNode.querySelector('.nilai');
            var nilai = parseInt(nilaiDiv.value);
            if (nilai > 0) {
                nilaiDiv.value = nilai - 1;
                subtotal();
            }
        }

        function subtotal() {

            var items = document.querySelectorAll('.items');
            var subtotalDiv = document.querySelector('.subtotal');
            var subtotalHTML = '';

            var totalHarga = 0;

            items.forEach(function(item) {
                var nilai = parseInt(item.querySelector('.nilai').value);
                if (nilai > 0) {
                    var gambar = item.querySelector('.gambar img').src;
                    var nama = item.querySelector('.name').textContent;
                    var harga = item.querySelector('.harga').textContent;
                    harga = parseInt(harga.replace('Rp. ', '').replace('.', '')); // Remove Rp. and comma, then parse as integer

                    var subtotal = nilai * harga;
                    totalHarga += subtotal;

                    subtotalHTML += '<div class="item-subtotal">';
                    subtotalHTML += '<img src="' + gambar + '" alt="' + nama + '">';
                    subtotalHTML += '<div>' + nama + '</div>';
                    subtotalHTML += '<div>Rp. ' + subtotal.toLocaleString() + '</div>'; // Convert subtotal to currency format
                    subtotalHTML += '</div>';
                }
            });

            if (subtotalHTML !== '') {
                subtotalHTML += '<div class="total">Total: Rp. ' + totalHarga.toLocaleString() + '</div>'; // Convert totalHarga to currency format
                subtotalDiv.innerHTML = subtotalHTML;
            } else {
                subtotalDiv.innerHTML = ''; // Clear the subtotal div if no items have a quantity greater than zero
            }
        }
    </script>

@endsection
