@extends('layout.main')
@section('title', 'cuci kering')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/cuci-basah.css') }}">

@section('container')

    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/cuci" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Layanan Cuci Kering
                </div>
            </div>
            <div class="ku">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
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

    <form action="/konfirmasiPay">

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

        <div class="container user-tanggal" id="user-tanggal">
            <div class="heading">Waktu Pengambilan</div>
            <div class="row">
                <div class="col-12 for-slide">
                    <div class="splide bulan" role="group" aria-label="Splide Basic HTML Example">
                        <div class="splide__arrows splide__arrows--ltr">
                            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Go to last slide" aria-controls="splide01-track">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">Januari</li>
                                <li class="splide__slide">Februari</li>
                                <li class="splide__slide">Maret</li>
                                <li class="splide__slide">April</li>
                                <li class="splide__slide">Mei</li>
                                <li class="splide__slide">Juni</li>
                                <li class="splide__slide">Juli</li>
                                <li class="splide__slide">Agustus</li>
                                <li class="splide__slide">September</li>
                                <li class="splide__slide">Oktober</li>
                                <li class="splide__slide">November</li>
                                <li class="splide__slide">Desember</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 for-tangal">
                    <div class="tanggal">
                        <div class="tanggal-item"> 1 </div>
                        <div class="tanggal-item"> 2 </div>
                        <div class="tanggal-item"> 3 </div>
                        <div class="tanggal-item"> 4 </div>
                        <div class="tanggal-item"> 5 </div>
                        <div class="tanggal-item"> 6 </div>
                        <div class="tanggal-item"> 7 </div>
                        <div class="tanggal-item"> 8 </div>
                        <div class="tanggal-item"> 9 </div>
                        <div class="tanggal-item"> 10 </div>
                        <div class="tanggal-item"> 11 </div>
                        <div class="tanggal-item"> 12 </div>
                        <div class="tanggal-item"> 13 </div>
                        <div class="tanggal-item"> 14 </div>
                        <div class="tanggal-item"> 15 </div>
                        <div class="tanggal-item"> 16 </div>
                        <div class="tanggal-item"> 17 </div>
                        <div class="tanggal-item"> 18 </div>
                        <div class="tanggal-item"> 19 </div>
                        <div class="tanggal-item"> 20 </div>
                        <div class="tanggal-item"> 21 </div>
                        <div class="tanggal-item"> 22 </div>
                        <div class="tanggal-item"> 23 </div>
                        <div class="tanggal-item"> 24 </div>
                        <div class="tanggal-item"> 25 </div>
                        <div class="tanggal-item"> 26 </div>
                        <div class="tanggal-item"> 27 </div>
                        <div class="tanggal-item"> 28 </div>
                        <div class="tanggal-item"> 29 </div>
                        <div class="tanggal-item"> 30 </div>
                        <div class="tanggal-item"> 31 </div>
                    </div>
                </div>
            </div>
            <div class="for-jam">

                <div class="jam-item">
                    <input type="hidden" value="06:30:00">
                    <div class="jam-value">
                        06:30
                    </div>
                </div>
                <div class="jam-item">
                    <input type="hidden" value="13:00:00">
                    <div class="jam-value">
                        13:00
                    </div>
                </div>
                <div class="jam-item">
                    <input type="hidden" value="20:00:00">
                    <div class="jam-value">
                        20:00
                    </div>
                </div>

            </div>

            <div class="d-flex align-items-center justify-center">
                <button type="button" id="ok-button" class="death" disabled>
                    Konfirmasi
                </button>
            </div>

            <div class="for-result">
                <div class="result-item">
                    <div class="kiri">Pengambilan Laundry</div>
                    <div class="kanan" id="tgl-pick">belum dipilih !</div>
                </div>
                <div class="result-item">
                    <div class="kiri">Selesai Laundry</div>
                    <div class="kanan" id="tgl-selesai">belum di pilih !</div>
                </div>
            </div>
        </div>

        <div class="container user-payment" id="user-payment">
            <div class="row">
                <div class="col-12">
                    <div class="pay" id="drop1">
                        <div class="paymentChoice">Metode Pembayaran</div>
                        <div class="paymentIcons">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>
                    </div>
                    <div class="payChoice">
                        <div class="payItems first">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/bca.png') }}">
                                </div>
                                <div class="nama">
                                    Bank BCA
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="bca">
                            </div>
                        </div>
                        <div class="payItems">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/bni.png') }}">
                                </div>
                                <div class="nama">
                                    Bank BNI
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="bni">
                            </div>
                        </div>
                        <div class="payItems">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/mandiri.png') }}">
                                </div>
                                <div class="nama">
                                    Bank Mandiri
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="mandri">
                            </div>
                        </div>
                        <div class="payItems">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/bri.png') }}">
                                </div>
                                <div class="nama">
                                    Bank BRI
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="bri">
                            </div>
                        </div>
                        <div class="payItems">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/jatim.jpeg') }}">
                                </div>
                                <div class="nama">
                                    Bank Jatim
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="jatim">
                            </div>
                        </div>
                        <div class="payItems last">
                            <div class="item">
                                <div class="logos">
                                    <img src="{{ asset('img/btn.png') }}">
                                </div>
                                <div class="nama">
                                    Bank BTN
                                </div>
                            </div>
                            <div class="input">
                                <input type="radio" name="gate" value="btn">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="confirm">
            <div class="container-fluid">
                <button type="submit" class="btn mati" id="nextPage" disabled>Pesan Sekarang</button>
            </div>
        </div>

    </form>

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

                                    @foreach ($cuciKeringItems as $item)
                                        <li class="items">
                                            <div class="item">
                                                <div class="values">
                                                    <div class="gambar">
                                                        <img src="{{ asset('uploads/' . $item->gambar_barang) }}">
                                                    </div>
                                                    <div class="name">
                                                        {{ $item->nama_barang }}
                                                    </div>
                                                    <div class="cost">
                                                        <div class="harga">
                                                            {{ $item->harga_barang }}
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
                                    @endforeach

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
                        <div class="tots mt-3">

                        </div>
                        <div class="ongkos">

                        </div>

                        <div class="total-real mt-2 removeBorder">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal" id="add" disabled>Lanjut</button>
                </div>
            </div>
        </div>
    </div>

    {{--          M Y   S C R I P T          --}}

    <script>
        var currentDate = new Date();
        var currentDay = currentDate.getDate();
        var currentMonthIndex = currentDate.getMonth();
        var currentYear = currentDate.getFullYear();

        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                perPage: 1,
                pagination: false,
                drag: true,
                autoplay: false,
                start: currentMonthIndex,
            });
            splide.mount();

            var tanggalItems = document.querySelectorAll('.tanggal-item');
            tanggalItems[currentDay - 1].classList.add('active');

            var jamItems = document.querySelectorAll('.jam-item');
            jamItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    jamItems.forEach(function(item) {
                        item.classList.remove('terselect');
                        okButton.classList.remove('death');
                        okButton.removeAttribute('disabled')
                    });
                    item.classList.add('terselect');
                });
            });

            var tanggalItems = document.querySelectorAll('.tanggal-item');
            tanggalItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    tanggalItems.forEach(function(item) {
                        item.classList.remove('active');
                    });
                    item.classList.add('active');
                });
            });

            var okButton = document.getElementById('ok-button');

            okButton.addEventListener('click', function() {
                var tanggalAktif = document.querySelector('.tanggal-item.active').textContent;

                var bulanAktifIndex = splide.index;
                var bulanAktif = document.querySelectorAll('.splide__slide')[bulanAktifIndex].textContent;
                var jamAktif = document.querySelector('.jam-item.terselect input').value;

                var takeOffDiv = document.querySelector('#tgl-pick');
                var takeOffDate = new Date(currentYear, bulanAktifIndex, parseInt(tanggalAktif));

                var takeOffFormatted = takeOffDate.getDate() + '/' + (takeOffDate.getMonth() + 1) + '/' + takeOffDate.getFullYear() + ', ' + jamAktif;
                takeOffDiv.textContent = takeOffFormatted;

                var nextDayDiv = document.querySelector('#tgl-selesai');
                nextDayDiv.classList.add('kuning');
                var nextDayDate = new Date(takeOffDate);
                nextDayDate.setDate(nextDayDate.getDate() + 3);
                var nextDayFormatted = nextDayDate.getDate() + '/' + (nextDayDate.getMonth() + 1) + '/' + nextDayDate.getFullYear() + ', ' + jamAktif;
                nextDayDiv.textContent = nextDayFormatted;
            });

        });
    </script>

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
            var ongkost = document.querySelector('.ongkos');
            var totalReal = document.querySelector('.total-real');
            var totalHarga = 0;
            var ongkos = 0;
            var totalQty = 0;

            let button = document.getElementById("add");
            console.log(button);

            items.forEach(function(item) {
                var nilai = parseInt(item.querySelector('.nilai').value);
                totalQty += nilai;
                if (nilai > 0) {
                    var gambar = item.querySelector('.gambar img').src;
                    var nama = item.querySelector('.name').textContent;
                    var harga = item.querySelector('.harga').textContent;
                    var rego = item.querySelector('.cost').innerHTML;
                    harga = parseInt(harga.replaceAll('Rp. ', '').replace('.', ''));

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

            if (totalQty < 10) {
                ongkos = 5000;
            } else if (totalQty >= 10 && totalQty <= 20) {
                ongkos = 3000;
            } else {
                ongkos = 1500;
            }

            ongkotz = ongkos.toLocaleString().replace(',', '.')

            if (subtotalHTML !== '') {

                totalAsli = totalHarga + ongkos;
                t = totalAsli.toLocaleString().replaceAll(',', '.');
                var hTotal = totalHarga.toLocaleString().replace(',', '.');

                konten.innerHTML = `
                <div class="rp">Total</div>
                <div class="totalHarga fw-medium">Rp. ${hTotal}</div>
            `;
                ongkost.innerHTML = `<div class="ol">Biaya Laundry</div>
                <div class="ongkos-laundry fw-medium">Rp. ${ongkotz}</div>`;

                totalReal.innerHTML = `<div class="total">Total Biaya</div>
            <div class="value fw-bold">Rp. ${t}</div>`;
                totalReal.classList.remove('removeBorder');
                subtotalDiv.innerHTML = subtotalHTML;


            } else {
                konten.innerHTML = '';
                subtotalDiv.innerHTML = '';
                ongkost.innerHTML = '';
                totalReal.innerHTML = '';
                totalReal.classList.add('removeBorder');
            }
        }

        function updateAddButton() {
            // Ambil semua item dalam dropdown menu
            var items = document.querySelectorAll('.dropdown-menu .nilai');
            // var dropToggle = document.querySelector('.btn.dropdown-toggle');
            var addButton = document.getElementById('add');
            var sub = document.querySelector('.subtotal');
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
                sub.classList.add('shut');
                addButton.disabled = false;
            } else {
                // Jika tidak, hapus class dari tombol "add"
                addButton.classList.remove('myback');
                sub.classList.remove('shut');
                addButton.disabled = true;

            }

        }

        document.querySelectorAll('.dropdown-menu .nilai').forEach(function(item) {
            item.addEventListener('change', updateAddButton);
        });
        document.querySelector('.dropdown').addEventListener('click', updateAddButton);

        document.getElementById('add').addEventListener('click', function() {

            var total = document.querySelector('.tots').innerHTML;
            var bl = document.querySelector('.ongkos').innerHTML;
            var totalBiaya = document.querySelector('.total-real').innerHTML;
            var subtotalHTML = document.querySelector('.subtotal').innerHTML;
            var head = document.querySelector('.modal-header').innerHTML;
            var inf = document.querySelector('.info-umum').innerHTML;
            var dis = document.querySelector('.user-payment');

            var tab = document.createElement('div');
            tab.innerHTML = '<div class="tabel"><div class="item">Item</div><div class="harga">Harga</div><div class="jumlah">Jml</div><div class="sub">Total</div></div>';
            tabe = tab.innerHTML;
            tabel = document.querySelector('.tabel');
            tabel.innerHTML = tab.innerHTML;


            var idT = document.querySelector('.id').innerHTML;
            var transId = document.createElement('div');
            transId.innerHTML = `
        <div class="info-item">
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
            var blDiv = document.createElement('div')
            blDiv.classList.add('bl');
            blDiv.innerHTML = `<div class="bls">
            ${bl}
        </div>`;
            var tb = document.createElement('div')
            tb.classList.add('tr');
            tb.innerHTML = `<div class="trs">
            ${totalBiaya}
        </div>`;

            var totals = totalDiv.innerHTML + blDiv.innerHTML + tb.innerHTML;


            var infoUser = document.getElementById('user-info');
            var itemUser = document.getElementById('user-item');

            infoUser.innerHTML = transReal + inf;
            itemUser.innerHTML = tabel.innerHTML + subtotalHTML + totals;

        });

        const payItems = document.querySelectorAll('.payItems');

        payItems.forEach(item => {
            // Menambahkan event listener untuk setiap elemen payItems
            item.addEventListener('click', function() {
                const radioInput = this.querySelector('input[type="radio"]');

                radioInput.checked = !radioInput.checked;
                const anyChecked = [...document.querySelectorAll('input[type="radio"]')].some(input => input.checked);
            });
        });

        // const jamItem = document.querySelectorAll('.jam-item');
        // jamItem.forEach(item => {
        //     // Menambahkan event listener untuk setiap elemen payItems
        //     item.addEventListener('click', function() {
        //        item.classList.toggle('terselect')
        //         radioInput.checked = !radioInput.checked;
        //         const anyChecked = [...document.querySelectorAll('input[type="radio"]')].some(input => input.checked);
        //     });
        // });

        document.addEventListener('click', function() {
            var button = document.getElementById('nextPage');
            var check = [...document.querySelectorAll('input[type="radio"]')].some(input => input.checked);
            var tglDone = document.getElementById('tgl-selesai');
            var bruh = tglDone.classList.contains('kuning');

            if (check && bruh) {
                button.disabled = false;
                button.classList.remove('mati');
            } else {
                button.disabled = true;
                button.classList.add('mati');
            }

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
        var confirm = document.querySelector('.confirm');
        var dis = document.getElementById('user-payment');
        var tgl = document.getElementById('user-tanggal');
        // Membuat event listener untuk perubahan dalam elemen div
        divDiamati.addEventListener('DOMSubtreeModified', function() {
            // Memilih div lain yang ingin ditambahkan kelasnya
            var divDitambahkanKelas = document.getElementById('blanks');

            // Menambahkan kelas ke div lain jika div diamati memiliki isi
            if (divDiamati.innerHTML.trim() !== '') {
                divDitambahkanKelas.classList.add('boom');
                btnku.classList.add('visible');
                confirm.classList.add('nampak');
                dis.classList.add('aktif');
                tgl.classList.add('showing');

            } else {
                divDitambahkanKelas.classList.remove('boom');
                btnku.classList.remove('visible');
                confirm.classList.remove('nampak');
                dis.classList.remove('aktif');
                tgl.classList.remove('showing');
            }
        });
    </script>

@endsection
