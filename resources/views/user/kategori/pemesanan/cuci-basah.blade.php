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

    <div class="blanks" id="blanks">
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

    <div class="container user-info">
        <div class="row">

            <div class="col-12 inform" id="user-info">
                <div class="tabel">

                </div>
            </div>

        </div>
    </div>

    <div class="container user-item" id="user-item">

    </div>
    <div class="container user-payment" id="user-payment">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>

    <div class="ku">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" x-data="{ open: false }">
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
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" x-on:click="open = !open" id="a">
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
                                                    <img src="{{ asset('gambar-kategori/towel.png   ') }}">
                                                </div>
                                                <div class="name">
                                                    Handuk
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
                                    <li class="items">
                                        <div class="item">
                                            <div class="values">
                                                <div class="gambar">
                                                    <img src="{{ asset('gambar-kategori/picnic.png') }}">
                                                </div>
                                                <div class="name">
                                                    Kain Lap
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
                                                    <img src="{{ asset('gambar-kategori/sajadah.png') }}">
                                                </div>
                                                <div class="name">
                                                    Sajadah
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
                                                    <img src="{{ asset('gambar-kategori/bra.png') }}">
                                                </div>
                                                <div class="name">
                                                    Bra
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
                                    <div class="last">
                                        <button class="btn dropdown-toggle totop" type="button" x-on:click="open = !open" id="b">
                                            <div clas="isi">
                                                Simpan
                                            </div>
                                        </button>
                                    </div>
                                </ul>
                            </div>

                        </div>

                        <div class="subtotal" id="subtotalContainer">
                        </div>
                        <div class="tots mt-2">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal" id="add" disabled>Lanjut</button>
                </div>
            </div>
        </div>
    </div>


    <div class="confirm">
        <div class="container-fluid">
            <button type="submit" class="btn">Pesan Sekarang</button>
        </div>
    </div>



    {{--          M Y   S C R I P T          --}}


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
            var bungkus = document.querySelector('.tabel')
            var subtotalHTML = '';
            var konten = document.querySelector('.tots');

            var totalHarga = 0;

            let button = document.getElementById("add");
            console.log(button);
            items.forEach(function(item) {
                var nilai = parseInt(item.querySelector('.nilai').value);
                if (nilai > 0) {
                    var gambar = item.querySelector('.gambar img').src;
                    var nama = item.querySelector('.name').textContent;
                    var harga = item.querySelector('.harga').textContent;
                    var rego = item.querySelector('.cost').innerHTML;
                    harga = parseInt(harga.replaceAll('Rp. ', '').replace('.', '')); // Remove Rp. and comma, then parse as integer

                    var subtotal = nilai * harga;
                    totalHarga += subtotal;

                    subtotalHTML += '<div class="item-subtotal">';
                    subtotalHTML += '<div class="sub-gambar">';
                    subtotalHTML += '<img src="' + gambar + '">';
                    subtotalHTML += '</div>';
                    subtotalHTML += '<div class="sub-name">' + nama + '</div>';
                    subtotalHTML += '<div class="sub-harga">' + rego + '</div>';
                    subtotalHTML += '<div class="sub-nilai">' + nilai + '<span class="perspan">' +
                        "ptg" +
                        '</span>' +
                        '</div>';
                    subtotalHTML += '<div class="sub">Rp. ' + subtotal.toLocaleString().replace(',', '.') + '</div>'; // Convert subtotal to currency format
                    subtotalHTML += '</div>';
                }
            });

            if (subtotalHTML !== '') {
                var hTotal = totalHarga.toLocaleString().replace(',', '.');
                konten.innerHTML = `
                        <div class="rp">Total harga</div>
                        <div class="totalHarga fw-medium">Rp. ${hTotal}</div>
                    `; // Convert totalHarga to currency format
                subtotalDiv.innerHTML = subtotalHTML;

            } else {
                konten.innerHTML = '';
                subtotalDiv.innerHTML = '';

            }
        }

        function updateAddButton() {
            // Ambil semua item dalam dropdown menu
            var items = document.querySelectorAll('.dropdown-menu .nilai');
            // var dropToggle = document.querySelector('.btn.dropdown-toggle');
            var addButton = document.getElementById('add');
            var showClassExists = document.querySelector('.dropdown-menu').classList.contains('show');
            var inputGreaterThanZero = false;

            // Periksa apakah setidaknya ada satu item dengan nilai input > 0
            items.forEach(function(item) {
                if (parseInt(item.value) > 0) {
                    inputGreaterThanZero = true;
                }
            });

            // Periksa apakah kedua kondisi terpenuhi
            if (!showClassExists && inputGreaterThanZero) {
                // Jika ya, tambahkan class ke tombol "add"
                addButton.classList.add('myback');
                addButton.disabled = false;
            } else {
                // Jika tidak, hapus class dari tombol "add"
                addButton.classList.remove('myback');
                addButton.disabled = true;

            }

        }

        document.querySelectorAll('.dropdown-menu .nilai').forEach(function(item) {
            item.addEventListener('change', updateAddButton);
        });
        document.querySelector('.dropdown').addEventListener('click', updateAddButton);

        document.getElementById('add').addEventListener('click', function() {

            var total = document.querySelector('.tots').innerHTML;
            var subtotalHTML = document.querySelector('.subtotal').innerHTML;
            var head = document.querySelector('.modal-header').innerHTML;
            var inf = document.querySelector('.info-umum').innerHTML;

            var tab = document.createElement('div');
            tab.innerHTML = '<div class="item">Item</div><div class="harga">Harga</div><div class="jumlah"> Jumlah</div><div class="jumlah">Subtotal</div>';
            tabe = tab.innerHTML;
            tabel = document.querySelector('.tabel');
            tabel


            var idT = document.querySelector('.id').innerHTML;
            var transId = document.createElement('div');
            transId.innerHTML = `
            <div class="info-item mb-2">
            <div class="kiri">
                No Transaksi
            </div>
                                <div class="kanan fw-medium">
                                    ${idT}
                                </div>
                                </div> `;
            transReal = transId.innerHTML;

            var totalDiv = document.createElement('div')
            totalDiv.classList.add('totalHarga');
            totalDiv.innerHTML = `<div class="totals">
                ${total}
            </div>`;

            var totals = totalDiv.innerHTML;

            var infoUser = document.getElementById('user-info');
            var itemUser = document.getElementById('user-item');

            infoUser.innerHTML = transReal + inf;
            itemUser.innerHTML = tabel + subtotalHTML + totals;

        });
    </script>

    <script>
        var buttonA = document.getElementById("a");
        var buttonB = document.getElementById("b");

        // Menambahkan event listener untuk button A
        buttonA.addEventListener("click", function() {
            buttonA.disabled = true; // Menonaktifkan button A
            buttonA.classList.add("dis"); // Menambahkan class 'disabled'
        });

        // Menambahkan event listener untuk button B
        buttonB.addEventListener("click", function() {
            buttonA.disabled = false; // Mengaktifkan kembali button A
            buttonA.classList.remove("dis"); // Menghapus class 'disabled'
        });
    </script>

    <script>
        // Memilih elemen div yang akan diamati
        var divDiamati = document.getElementById('user-info');
        var btnku = document.querySelector('.ku');
        var confirm = document.querySelector('.confirm')
        // Membuat event listener untuk perubahan dalam elemen div
        divDiamati.addEventListener('DOMSubtreeModified', function() {
            // Memilih div lain yang ingin ditambahkan kelasnya
            var divDitambahkanKelas = document.getElementById('blanks');

            // Menambahkan kelas ke div lain jika div diamati memiliki isi
            if (divDiamati.innerHTML.trim() !== '') {
                divDitambahkanKelas.classList.add('boom');
                btnku.classList.add('visible');
                confirm.classList.add('nampak');

            } else {
                divDitambahkanKelas.classList.remove('boom');
                btnku.classList.remove('visible');
                confirm.classList.remove('nampak');
            }
        });
    </script>


@endsection
