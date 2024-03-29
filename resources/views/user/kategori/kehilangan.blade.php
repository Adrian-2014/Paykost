@extends('layout.main')
@section('title', 'Laporan kehilangan')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/kehilangan.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Laporan Kehilangan
            </div>
        </div>
    </div>

    <form action="/" method="POST" class="form" id="form">
        @csrf
        <div class="formulir first" id="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama User</label>
                <input type="text" id="name" class="form-control" value="Adrian Kurniawan" disabled>
            </div>
            <div class="form-item">
                <label for="k-now" class="form-label fw-medium">No. Kamar</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. 5" disabled>
            </div>
        </div>

        <div class="formulir sec">
            <div class="form-item">
                <label for="k-new" class="form-label fw-medium">Apa yang Hilang? <span>*</span></label>
                <div class="dropdown">

                    <input type="text" disabled class="form-control" id="isi" placeholder="pilih barang anda yang hilang">
                    </input>
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="first">
                            <div class="item" onclick="barang('Kunci Kamar')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/key-chain.png') }}">
                                </div>
                                <div class="value">
                                    Kunci Kamar
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="barang('Dompet')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/wallet.png') }}">
                                </div>
                                <div class="value">
                                    Dompet
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="barang('Handphone')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/smartphone.png') }}">
                                </div>
                                <div class="value">
                                    Handphone
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="barang('Laptop')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/laptop.png') }}">
                                </div>
                                <div class="value">
                                    Laptop
                                </div>
                            </div>
                        </li>

                        <li class="last">
                            <div class="item" onclick="barang('Uang Tunai')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/money.png') }}">
                                </div>
                                <div class="value">
                                    Uang Tunai
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="barang('Lainnya...')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/pencil.png') }}">
                                </div>
                                <div class="value">
                                    Lainnya...
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="form-item">
                <label for="tanggal" class="form-label fw-medium">Tanggal Kehilangan <span>*</span></label>
                <input type="date" id="tanggal" class="form-control">
            </div>
            <div class="form-item">
                <label for="waktu" class="form-label fw-medium">Jam Kehilangan <span>*</span></label>
                <input type="time" id="waktu" class="form-control">
            </div>
        </div>

        <div class="formulir last">
            <div class="form-item">
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Keterangan Tambahan <span>*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tambahkan keterangan kamu..."></textarea>
            </div>
        </div>

        <div class="navbar sticky-bottom">
            <div class="isi">
                <button type="submit" class="fw-medium rounded-pill" disabled id="tombol">Kirim Laporan</button>
            </div>
        </div>
    </form>

    <script>
        function barang(barangHilang) {
            var isiInput = document.getElementById('isi');
            var placeholderText = '';
            if (barangHilang === 'Lainnya...') {
                isiInput.value = '';
                isiInput.disabled = false;
                placeholderText = 'Isi barang anda yang hilang...';
                isiInput.focus();
            } else {
                isiInput.value = barangHilang;
                isiInput.disabled = true;
                placeholderText = 'Pilih barang anda yang hilang';
            }
            isiInput.placeholder = placeholderText;
        }
    </script>
    <script>
        function enableSubmit() {
            var requiredInputs = document.getElementById("form").querySelectorAll(".form-control");
            let btn = document.getElementById('tombol');
            let isValid = true;

            for (var i = 0; i < requiredInputs.length; i++) {
                let changedInput = requiredInputs[i];

                if (changedInput.value.trim() === "" || changedInput.value === null) {
                    changedInput.classList.remove("mati");
                    isValid = false;
                    break;
                } else {
                    changedInput.classList.add("mati");
                }
            }
            btn.disabled = !isValid;

            if (isValid) {
                btn.classList.remove("mati");
                btn.classList.add("active");
            } else {

                btn.classList.remove("active");
                btn.classList.add("mati");
            }

        }
        // Attach the function to input events (e.g., input, change)
        var formInputs = document.getElementById("form").querySelectorAll(".form-control");
        formInputs.forEach(function(input) {
            input.addEventListener("input", enableSubmit);
        });
    </script>


@endsection
