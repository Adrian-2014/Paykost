@extends('layout.main')
@section('title', 'pindah kamar')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pindah.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Pengajuan Pindah Kamar
            </div>
        </div>
    </div>

    <form action="" method="" class="form" id="form">
        <div class="formulir first" id="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama User</label>
                <input type="text" id="name" class="form-control" value="Adrian Kurniawan" disabled>
            </div>
            <div class="form-item">
                <label for="k-now" class="form-label fw-medium">No. Kamar saat ini</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. 5" disabled>
            </div>
            <div class="form-item">
                <label for="h-now" class="form-label fw-medium">Harga Kamar saat ini</label>
                <input type="text" id="h-now" class="form-control" value="Rp. 1.500.000" disabled>
            </div>
        </div>

        <div class="formulir sec">
            <div class="form-item">
                <label for="k-new" class="form-label fw-medium">Kamar Baru</label>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div clas="isi">
                            Pilih Kamar Baru Kamu
                        </div>
                        <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li class="first">
                            <div class="item" onclick="changeValue('Kamar No. 1', 'Rp. 1.300.000', 'Uk. 3,5 x 3m')">
                                <img src="{{ asset('img-chategories/room-1.jpg') }}">
                                <div class="nomor">Kamar No. 1</div>
                                <div class="ukuran">Uk. 3,5 x 3m</div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 2', 'Rp. 1.450.000', 'Uk. 3,5 x 3,5m')">
                                <img src="{{ asset('img-chategories/room-4.jpg') }}">
                                <div class="nomor">Kamar No. 2</div>
                                <div class="ukuran">Uk. 3,5 x 3,5m</div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 3', 'Rp. 1.200.000', 'Uk. 3 x 2,8m')">
                                <img src="{{ asset('img-chategories/room-3.jpg') }}">
                                <div class="nomor">Kamar No. 3</div>
                                <div class="ukuran">Uk. 3 x 2,8m</div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 4', 'Rp. 1.60.000', 'Uk. 4 x 3,5m')">
                                <img src="{{ asset('img/tyler.jpg') }}">
                                <div class="nomor">Kamar No. 4</div>
                                <div class="ukuran">Uk. 4 x 3,5m</div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 5', 'Rp. 1.250.000', 'Uk. 3,5 x 2,3m')">
                                <img src="{{ asset('img/satu.jpg') }}">
                                <div class="nomor">Kamar No. 5</div>
                                <div class="ukuran">Uk. 3,5 x 2,3m</div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 6', 'Rp. 1.100.000', 'Uk. 2,5 x 2,5m')">
                                <img src="{{ asset('img-chategories/room-6.jpg') }}">
                                <div class="nomor">Kamar No. 6</div>
                                <div class="ukuran">Uk. 2,5 x 2,5m</div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 7', 'Rp. 1.450.000', 'Uk. 3,5 x 3,5m')">
                                <img src="{{ asset('img-chategories/room-1`.jpg') }}">
                                <div class="nomor">Kamar No. 7</div>
                                <div class="ukuran">Uk. 3,5 x 3,5mm</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-item">
                <label for="p" class="form-label fw-medium">No. Kamar Baru</label>
                <input type="text" id="p" class="form-control" disabled placeholder="Mohon pilih kamar dahulu!">
            </div>
            <div class="form-item">
                <label for="p" class="form-label fw-medium">Harga Kamar Baru</label>
                <input type="text" id="d" class="form-control" disabled placeholder="Mohon pilih kamar dahulu!">
            </div>
            <div class="form-item">
                <label for="i" class="form-label fw-medium">Ukuran Kamar</label>
                <input type="text" id="i" class="form-control" disabled placeholder="Mohon pilih kamar dahulu!">
            </div>
            <div class="form-item">
                <label for="tanggal" class="form-label fw-medium">Tanggal Pindah</label>
                <input type="date" id="tanggal" class="form-control">
            </div>
            <div class="form-item">
                <label for="jam" class="form-label fw-medium">Jam Pindah</label>
                <input type="time" id="jam" class="form-control">
            </div>
        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Alasan Pindah (Opsional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tambahkan alasan kamu pindah..."></textarea>
            </div>
        </div>

        <div class="navbar sticky-bottom">
            <div class="isi">
                <button type="submit" class="fw-medium rounded-pill" disabled id="tombol">Kirim Laporan</button>
            </div>
        </div>
    </form>
    <script>
        function changeValue(nomor, kamar, ukuran) {
            document.getElementById('p').value = nomor;
            document.getElementById('d').value = kamar;
            document.getElementById('i').value = ukuran;
            var dropdownButton = document.querySelector('.btn.dropdown-toggle');
            dropdownButton.classList.add('selected');
            var inputItemp = document.getElementById('p');
            var inputItemd = document.getElementById('d');
            var inputItemi = document.getElementById('i');
            inputItemp.classList.add('nyalaOi');
            inputItemd.classList.add('nyalaOi');
            inputItemi.classList.add('nyalaOi');
        }
    </script>

    <script>
        function enableSubmit() {
            var requiredInputs = document.getElementById("form").querySelectorAll("input");
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
        var formInputs = document.getElementById("form").querySelectorAll("input");
        formInputs.forEach(function(input) {
            input.addEventListener("input", enableSubmit);
        });
    </script>

@endsection
