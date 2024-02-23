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
                                        <li class="first">
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" readonly value="0">
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="end">
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
                                                    <div class="kurang">
                                                        -
                                                    </div>
                                                    <input type="number" disabled>
                                                    <div class="tambah">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="subtotal" id="subtotal">
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
        // Get all elements with class "tambah" and "kurang"
        const tambahButtons = document.querySelectorAll('.tambah');
        const kurangButtons = document.querySelectorAll('.kurang');

        // Add event listener to each "tambah" button
        tambahButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the input element in the same parent node
                const input = this.parentNode.querySelector('input');
                // Get the current value of the input as an integer (or 0 if it's not a valid number)
                let value = parseInt(input.value) || 0;
                // Increment the value of the input
                input.value = value + 1;
                if (input.value > 0) {
                    this.closest('.item').classList.add('red');
                }
            });
        });

        // Add event listener to each "kurang" button
        kurangButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the input element in the same parent node
                const input = this.parentNode.querySelector('input');
                let value = parseInt(input.value) || 0;
                // Ensure the value doesn't go below 0
                if (value > 0) {
                    // Decrement the value of the input
                    input.value = value - 1;
                }
                if (input.value == 0) {
                    this.closest('.item').classList.remove('red');
                }

            });
        });
    </script>

@endsection
