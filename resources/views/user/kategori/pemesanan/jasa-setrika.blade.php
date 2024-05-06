@extends('layout.main')
@section('title', 'jasa setrika')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/cuci-umum.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://eonasdan.github.io/bootstrap-datetimepicker/css/prettify-1.0.css">
<link rel="stylesheet" href="https://eonasdan.github.io/bootstrap-datetimepicker/css/base.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">

@section('container')

    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/cuci" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Jasa Setrika
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

        <div id="datetimepicker"></div>
        <div class="for-jam">
            <button type="button" class="jam-item">
                <input type="hidden" value="06:30:00">
                <div class="jam-value">
                    06:30
                </div>
            </button>
            <button type="button" class="jam-item">
                <input type="hidden" value="13:00:00">
                <div class="jam-value">
                    13:00
                </div>
            </button>
            <button type="button" class="jam-item">
                <input type="hidden" value="17:00:00">
                <div class="jam-value">
                    17:00
                </div>
            </button>
            <button type="button" class="jam-item">
                <input type="hidden" value="20:00:00">
                <div class="jam-value">
                    20:00
                </div>
            </button>
        </div>

        <div class="d-flex align-items-center justify-center">
            <button type="button" id="ok-button" class="death" disabled>
                Konfirmasi
            </button>
        </div>

        <div class="for-result d-none">
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
                    @foreach ($banks as $bank)
                        <div class="payItems {{ $loop->first ? 'first' : ($loop->last ? 'last' : null) }}">
                            <div class="item">
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

        </div>
    </div>

    <form action="{{ route('storeJasa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="nama" id="nama" value="">
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="jumlah" id="jumlah" value="">
        <input type="hidden" name="layanan" id="layanan" value="Jasa Setrika">
        <input type="hidden" name="total_biaya" id="tobi" value="">
        <input type="hidden" name="no_kamar" id="no_kamar" value="5">

        <input type="hidden" name="gambar" id="img" value="">
        <input type="hidden" name="bank_name" id="bank_name" value="">

        <input type="hidden" name="mulai" id="mulai" value="">
        <input type="hidden" name="selesai" id="selesai" value="">
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
                    <div class="id" id="idku">
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
                                <div class="kanan" id="name_of_user">
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
                                    @foreach ($cuciItems as $item)
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
                                                            Rp. {{ $item->harga_barang }}
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

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{ asset('code.js') }}"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

    <script id="rendered-js">
        $(function() {
            $('#datetimepicker').datetimepicker({
                inline: true,
                sideBySide: true,
                locale: 'id',
                format: 'DD/MM/YYYY',
                minDate: new Date(),
            });

            $('#datetimepicker').on('dp.change', function() {
                var tglActive = document.querySelector('.day.active');
                var jamActive = document.querySelector('.jam-item.terselect');
                var Btarget = document.getElementById('ok-button');
                var perbaikanJam = document.querySelector('.day.active.today');
                if (perbaikanJam) {
                    const currentTime = new Date();
                    const currentHours = currentTime.getHours();
                    const currentMinutes = currentTime.getMinutes();
                    const currentSeconds = currentTime.getSeconds();

                    // Loop melalui setiap tombol jam
                    jamItems.forEach(jamItem => {
                        // Mendapatkan waktu dari input tersembunyi dalam format jam
                        const jamValue = jamItem.querySelector('input').value.split(':');
                        const jamHours = parseInt(jamValue[0]);
                        const jamMinutes = parseInt(jamValue[1]);
                        const jamSeconds = parseInt(jamValue[2]) || 0; // Menangani kasus di mana detik tidak tersedia

                        // Memeriksa apakah waktu saat ini sudah terlewati waktu tombol jam
                        if (currentHours > jamHours ||
                            (currentHours === jamHours && currentMinutes > jamMinutes) ||
                            (currentHours === jamHours && currentMinutes === jamMinutes && currentSeconds >= jamSeconds)) {
                            // Menambahkan kelas "disabled" dan atribut "disabled"
                            jamItem.classList.add('disabled');
                            jamItem.setAttribute('disabled', true);
                            jamItem.classList.remove('terselect');
                        } else {
                            // Menghapus kelas "disabled" dan atribut "disabled" jika sudah tidak terlewati
                            jamItem.classList.remove('disabled');
                            jamItem.removeAttribute('disabled');
                            // jamItem.classList.add('terselect');
                        }
                    });
                    setInterval(updateJamItems, 1000);
                } else {
                    jamItems.forEach(jamItem => {
                        jamItem.classList.remove('disabled');
                        jamItem.removeAttribute('disabled');

                    });
                }

                if (tglActive && jamActive) {
                    Btarget.classList.remove('death');
                    Btarget.removeAttribute('disabled');
                } else {
                    Btarget.classList.add('death');
                    Btarget.setAttribute('disabled', true);
                }

            });

            const jamItems = document.querySelectorAll('.jam-item');

            const currentTime = new Date();
            const currentHours = currentTime.getHours();
            const currentMinutes = currentTime.getMinutes();
            const currentSeconds = currentTime.getSeconds();

            // Loop melalui setiap tombol jam
            jamItems.forEach(jamItem => {
                // Mendapatkan waktu dari input tersembunyi dalam format jam
                const jamValue = jamItem.querySelector('input').value.split(':');
                const jamHours = parseInt(jamValue[0]);
                const jamMinutes = parseInt(jamValue[1]);
                const jamSeconds = parseInt(jamValue[2]) || 0; // Menangani kasus di mana detik tidak tersedia
                var okbtn = document.getElementById('ok-button');

                // Memeriksa apakah waktu saat ini sudah terlewati waktu tombol jam
                if (currentHours > jamHours ||
                    (currentHours === jamHours && currentMinutes > jamMinutes) ||
                    (currentHours === jamHours && currentMinutes === jamMinutes && currentSeconds >= jamSeconds)) {
                    // Menambahkan kelas "disabled" dan atribut "disabled"
                    jamItem.classList.add('disabled');
                    jamItem.setAttribute('disabled', true);

                } else {
                    // Menghapus kelas "disabled" dan atribut "disabled" jika sudah tidak terlewati
                    jamItem.classList.remove('disabled');
                    jamItem.removeAttribute('disabled');
                }
            });


            var currentDate = new Date();
            var currentDay = currentDate.getDate();
            var currentMonthIndex = currentDate.getMonth();
            var currentYear = currentDate.getFullYear();
            var tanggalItems = document.querySelectorAll('.day');


            jamItems.forEach(function(divItem) {
                divItem.addEventListener('click', function() {

                    var isSelected = this.classList.contains('terselect');
                    jamItems.forEach(function(item) {
                        item.classList.remove('terselect');
                    });
                    if (!isSelected) {
                        this.classList.add('terselect');
                    }
                    check();
                });
            });

            var target = document.querySelector('.datepicker-days .table-condensed tbody tr .today');
            target.scrollIntoView();

            var bulan = document.querySelector('.picker-switch');
            bulan.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
            });

            function check() {
                var tglActive = document.querySelector('.day.active');
                var jamActive = document.querySelector('.jam-item.terselect');
                var Btarget = document.getElementById('ok-button');

                if (tglActive && jamActive) {
                    Btarget.classList.remove('death');
                    Btarget.removeAttribute('disabled');
                } else {
                    Btarget.classList.add('death');
                    Btarget.setAttribute('disabled', true);
                }
            }

            function uncheck() {
                var tglActive = document.querySelector('.day.active');
                var jamActive = document.querySelector('.jam-item.terselect');
                var Btarget = document.getElementById('ok-button');
                Btarget.classList.add('death');
                Btarget.setAttribute('disabled', true);

            }

            document.addEventListener('change', function() {
                check();
            });

            var okButton = document.getElementById('ok-button');
            okButton.addEventListener('click', function() {
                uncheck();

                var forResult = document.querySelector('.for-result');
                var tanggalAktif = document.querySelector('.day.active');
                var jamAktif = document.querySelector('.jam-item.terselect');

                tanggalAktif = tanggalAktif.getAttribute('data-day');
                jamAktif = jamAktif.querySelector('input').value;

                var takeOffFormatted = tanggalAktif + ', ' + jamAktif;
                var kananDiv = document.querySelector('#tgl-pick');
                kananDiv.textContent = takeOffFormatted;

                var nextDayDate = moment(tanggalAktif, 'DD/MM/YYYY').add(1, 'day').format('DD/MM/YYYY');
                var nextDayFormatted = nextDayDate + ', ' + jamAktif;

                var kiriDiv = document.querySelector('#tgl-selesai');
                kiriDiv.textContent = nextDayFormatted;
                kiriDiv.classList.add('kuning');
                forResult.classList.remove('d-none');
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
            var quantity = document.getElementById('jumlah');

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

            quantity.value = totalQty;

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
            <div class="value fw-bold" id="TB">Rp. ${t}</div>`;
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
            var items = document.querySelectorAll('.dropdown-menu .nilai');
            var addButton = document.getElementById('add');
            var sub = document.querySelector('.subtotal');
            var showClassExists = document.querySelector(".dropdown-toggle").classList.contains('dis');
            var inputGreaterThanZero = false;
            if (!showClassExists && sub.innerHTML !== '') {
                addButton.classList.add('myback');
                sub.classList.add('shut');
                addButton.removeAttribute('disabled');

                console.log('active')
            } else {
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

            var nexts = document.querySelector('.table-condensed thead tr th.next');
            var prevs = document.querySelector('.table-condensed thead tr th.prev');
            nexts.innerHTML = '<i class="bi bi-chevron-right"></i>';
            prevs.innerHTML = '<i class="bi bi-chevron-left"></i>';

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

        document.addEventListener('click', function() {
            var button = document.getElementById('nextPage');
            var check = [...document.querySelectorAll('input[type="radio"]')].some(input => input.checked);
            var tglDone = document.getElementById('tgl-selesai');
            var bruh = tglDone.classList.contains('kuning');

            if (check && bruh) {
                button.disabled = false;
                button.classList.remove('mati');
                kirim();
            } else {
                button.disabled = true;
                button.classList.add('mati');
            }

        });

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

        function kirim() {
            var nama = document.getElementById('nama');
            var id = document.getElementById('id');
            var mulai = document.getElementById('mulai');
            var selesai = document.getElementById('selesai');
            var totalBiaya = document.getElementById('tobi');

            var targetName = document.getElementById('name_of_user');
            var targetId = document.getElementById('idku');
            var targetMulai = document.getElementById('tgl-pick');
            var targetSelesai = document.getElementById('tgl-selesai');
            var targetBiaya = document.getElementById('TB');


            nama.value = targetName.innerHTML;
            id.value = idku.innerHTML;
            mulai.value = targetMulai.innerHTML;
            selesai.value = targetSelesai.innerHTML;
            totalBiaya.value = targetBiaya.innerHTML;
        }
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
