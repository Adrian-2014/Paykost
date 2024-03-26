@extends('layout.main')
@section('title', 'Jasa Cuci Karpet')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/cuci-khusus.css') }}">
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
                    Layanan Cuci Karpet
                </div>
            </div>
            <div class="ku">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
            </div>
        </div>
    </div>

    <div class="container user-info">
        <div class="row">
            <div class="col-12 id">
                <div class="left">
                    No. Transaksi
                </div>
                <div class="right" id="id_ku">
                    #0D97GEK7208F
                </div>
            </div>
            <div class="col-12 name">
                <div class="left">
                    Nama User
                </div>
                <div class="right" id="nama_ku">
                    {{ auth()->user()->name }}
                </div>
            </div>
            <div class="col-12 no-kamar">
                <div class="left">
                    No. Kamar
                </div>
                <div class="right">
                    Kamar No. 5
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body container">
                        <div class="row" id="item-row">
                            <div class="item col-12">
                                <div class="item-desc">
                                    <div class="gambar">
                                        <img src="{{ asset('img-chategories/carpets.png') }}">
                                    </div>
                                    <div class="properties">
                                        <div class="name">
                                            <div class="names">
                                                Karpet
                                            </div>
                                            <div class="uk">
                                                Uk. 3 x 3m
                                            </div>
                                        </div>
                                        <div class="cost">
                                            Rp. 15.000
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
                            <div class="item col-12">
                                <div class="item-desc">
                                    <div class="gambar">
                                        <img src="{{ asset('img-chategories/doormat.png') }}">
                                    </div>
                                    <div class="properties">
                                        <div class="name">
                                            <div class="names">
                                                Karpet
                                            </div>
                                            <div class="uk">
                                                Uk. 1 x 1m
                                            </div>
                                        </div>

                                        <div class="cost">
                                            Rp. 5.000
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
                            <div class="item col-12">
                                <div class="item-desc">
                                    <div class="gambar">
                                        <img src="{{ asset('img-chategories/carpet.png') }}">
                                    </div>
                                    <div class="properties">
                                        <div class="name">
                                            <div class="names">
                                                Karpet
                                            </div>
                                            <div class="uk">
                                                Uk. 4 x 4m
                                            </div>
                                        </div>

                                        <div class="cost">
                                            Rp. 100.000
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
                        </div>
                        <div class="mores col-12">
                            <div class="more">
                                <button class="btn" type="button" id="more">
                                    Custom Item +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                    <i class="bi bi-chevron-compact-up"></i>
                </button>
            </h2>
        </div>
    </div>
    </div>

    <div class="container user-item d-none">
        <div class="row">
            <div class="col-12 head">
                <div class="head-item">
                    Item
                </div>
                <div class="head-harga">
                    Harga
                </div>
                <div class="head-jml">
                    Jml
                </div>
                <div class="head-total">
                    Total
                </div>
            </div>
            <div class="inner">

            </div>
            <div class="biaya-circle">
                <div class="subtotal">
                    <div class="left">
                        Total
                    </div>
                    <div class="right">

                    </div>
                </div>
                <div class="bl">
                    <div class="left">
                        Biaya Laundry
                    </div>
                    <div class="right">

                    </div>
                </div>
                <div class="total">
                    <div class="left">
                        Total Biaya
                    </div>
                    <div class="right" id="totalB">

                    </div>
                </div>
            </div>
        </div>
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

        </div>
    </div>

    <form action="{{ route('storeJasa') }}" method="POST" enctype="multipart/form-data" class="fr">
        @csrf
        <input type="hidden" name="nama" id="nama" value="">
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="jumlah" id="jumlah" value="">
        <input type="hidden" name="layanan" id="layanan" value="Cuci Karpet">
        <input type="hidden" name="total_biaya" id="tobi" value="">

        <input type="hidden" name="gambar" id="img" value="">
        <input type="hidden" name="bank_name" id="bank_name" value="">

        <input type="hidden" name="mulai" id="mulai" value="">
        <input type="hidden" name="selesai" id="selesai" value="">
        <div class="confirm">
            <div class="container-fluid">
                <button type="submit" class="btn" id="nextPage" disabled>Pesan Sekarang</button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
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

            var nexts = document.querySelector('.table-condensed thead tr th.next');
            var prevs = document.querySelector('.table-condensed thead tr th.prev');
            nexts.innerHTML = '<i class="bi bi-chevron-right"></i>';
            prevs.innerHTML = '<i class="bi bi-chevron-left"></i>';

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

                var nextDayDate = moment(tanggalAktif, 'DD/MM/YYYY').add(2, 'day').format('DD/MM/YYYY');
                var nextDayFormatted = nextDayDate + ', ' + jamAktif;

                var kiriDiv = document.querySelector('#tgl-selesai');
                kiriDiv.textContent = nextDayFormatted;
                kiriDiv.classList.add('kuning');
                forResult.classList.remove('d-none');
            });
        });
    </script>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var moreBtn = document.getElementById('more');
        var wrap = document.getElementById('item-row');
        moreBtn.addEventListener('click', function() {
            var newItem = `
                <div class="item new col-12">
                    <div class="item-desc">
                        <div class="gambar">
                            <img src="{{ asset('img-chategories/floor.png') }}">
                        </div>
                        <div class="properties">
                            <div class="name">
                                <div class="names">
                                    Karpet
                                </div>
                                <div class="uku">
                                    <input type="number" class="f">
                                    <div class="x">x</div>
                                    <input type="number" class="l">
                                    <div class="m">(Meter)</div>
                                </div>
                                <div class="uk d-none">
                                </div>
                            </div>
                            <div class="cost">
                            Rp. 0
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
                <div class="per">Harga 5.000/m<sup>2</sup></div>
                `;
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = newItem;
            wrap.appendChild(tempDiv);

            const items = document.querySelectorAll('.item.new');
            items.forEach(item => {
                // Tangkap input number di dalam item
                var nilai = item.querySelector('.nilai').value;
                const inputF = item.querySelector('.f');
                const inputL = item.querySelector('.l');
                const costDiv = item.querySelector('.cost');
                const ukuran = item.querySelector('.uk');

                inputL.addEventListener('input', function() {
                    updateCost();
                });
                inputF.addEventListener('input', function() {
                    updateCost();
                });

                // Fungsi untuk mengupdate cost pada setiap item
                function updateCost() {
                    // Ambil nilai dari kedua input di dalam item
                    const valF = parseFloat(inputF.value);
                    const valL = parseFloat(inputL.value);

                    // Periksa apakah kedua input tidak kosong
                    if (!isNaN(valF) && !isNaN(valL)) {
                        const res = valF * valL;
                        const result = res * 5000;
                        costDiv.textContent = 'Rp. ' + result.toLocaleString().replaceAll(',', '.');
                        ukuran.innerHTML = ` Uk. ${valF} x ${valL}m`;
                        subtotal();

                    } else {
                        costDiv.textContent = 'Rp. 0';
                    }
                }
            });

        });

    });

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

        var mainContent = document.querySelector('.container.user-item');
        var items = document.querySelectorAll('.item');
        var deButton = document.querySelector('.accordion-button');
        var inner = document.querySelector('.inner');
        var subtotalHTML = '';
        var bungkus = document.querySelector('.tabel');
        var subtotal = document.querySelector('.subtotal .right');
        var bl = document.querySelector('.bl .right');
        var total = document.querySelector('.total .right');
        var jumlah = document.getElementById('jumlah');
        var totalHarga = 0;
        var ongkos = 0;
        var totalQty = 0;

        items.forEach(function(item) {
            var nilai = parseInt(item.querySelector('.nilai').value);
            totalQty += nilai;
            jumlah.value = totalQty;

            if (nilai > 0) {
                var gambar = item.querySelector('.item-desc .gambar img').src;
                var nama = item.querySelector('.names').textContent;
                var ukuran = item.querySelector('.uk').textContent;
                // var subtotal = item.querySelector('.harga').textContent;
                var harga = item.querySelector('.cost').innerHTML;
                var harg = parseInt(harga.replaceAll('Rp. ', '').replaceAll('.', ''));

                var subtotal = nilai * harg;
                totalHarga += subtotal;
                var subisi = subtotal.toLocaleString().replaceAll(',', '.');
                // var hargas = harga.toLocaleString().replaceAll(',', '.');

                subtotalHTML += '<div class="subtotals">';
                subtotalHTML += '<div class="myItem">';
                subtotalHTML += '<img class="Img" src="' + gambar + '">';
                subtotalHTML += '<div class="Name"> ';
                subtotalHTML += '<div class="Names">' + nama + '</div> ';
                subtotalHTML += '<div class="uku">' + ukuran + '</div> ';
                subtotalHTML += '</div> ';
                subtotalHTML += '</div> ';
                subtotalHTML += '<div class="myCost">' + harga + '</div> ';
                subtotalHTML += '<div class="myVal">' + nilai + '</div> ';
                subtotalHTML += '<div class="myTotal"> Rp.  ' + subisi + '</div> ';
                subtotalHTML += '</div> ';
            }
        });
        if (totalQty < 10) {
            ongkos = 4500;
        } else if (totalQty >= 10 && totalQty <= 20) {
            ongkos = 3000;
        } else {
            ongkos = 1500;
        }

        bls = ongkos.toLocaleString().replace(',', '.')

        if (subtotalHTML !== '') {
            totalAsli = totalHarga + ongkos;
            t = totalAsli.toLocaleString().replaceAll(',', '.');
            var hTotal = totalHarga.toLocaleString().replace(',', '.');

            subtotal.innerHTML = 'Rp. ' + hTotal;
            bl.innerHTML = 'Rp. ' + bls;
            total.innerHTML = 'Rp. ' + t;
            inner.innerHTML = subtotalHTML;
            mainContent.classList.remove('d-none');
            deButton.removeAttribute('disabled');

        } else {
            subtotal.innerHTML = '';
            bl.innerHTML = '';
            total.innerHTML = '';
            inner.innerHTML = '';
            mainContent.classList.add('d-none');
            deButton.setAttribute('disabled', 'disabled');
        }
    }

    document.addEventListener('click', function() {
        var button = document.getElementById('nextPage');
        var check = [...document.querySelectorAll('input[type="radio"]')].some(input => input.checked);
        var inner = document.querySelector('.container.user-item.d-none');
        var tglDone = document.getElementById('tgl-selesai');
        var bruh = tglDone.classList.contains('kuning');

        if (check && bruh && !inner) {
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

        var targetName = document.getElementById('nama_ku');
        var targetId = document.getElementById('id_ku');
        var targetMulai = document.getElementById('tgl-pick');
        var targetSelesai = document.getElementById('tgl-selesai');
        var targetBiaya = document.getElementById('totalB');


        nama.value = targetName.innerHTML;
        id.value = targetId.innerHTML;
        mulai.value = targetMulai.innerHTML;
        selesai.value = targetSelesai.innerHTML;
        totalBiaya.value = targetBiaya.innerHTML;
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // var btn = document.querySelector('.accordion-button');
        document.addEventListener('click', function() {
            var toggles = document.querySelector('.accordion-button');
            if (toggles.classList.contains('collapsed')) {
                rotate();
            } else {
                unrotate();
            }
        });


        function rotate() {
            var x = document.querySelector('.accordion-button i');

            x.classList.add('rotate');


            console.log('successs');
        }

        function unrotate() {
            var x = document.querySelector('.accordion-button i');

            x.classList.remove('rotate');

            console.log('unsuccesss');
        }
    });
</script>
