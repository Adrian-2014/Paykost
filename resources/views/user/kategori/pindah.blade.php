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
                PENGAJUAN PINDAH KAMAR
            </div>
        </div>
    </div>

    <form action="" method="" class="form" id="form">
        <div class="formulir" id="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama</label>
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

                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div clas="isi">
                            Pilih Kamar Barus anda
                        </div>
                        <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li class="first">
                            <div class="item" onclick="changeValue('Kamar No. 1', 'Rp. 1.300.000')">Kamar No. 1</div>
                        </li>
                        <li>
                            <div class="item" onclick="changeValue('Kamar No. 2', 'Rp. 1.450.000')">Kamar No. 2</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 3', 'Rp. 1.200.000')">Kamar No. 3</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 4', 'Rp. 1.60.000')">Kamar No. 4</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 5', 'Rp. 1.250.000')">Kamar No. 5</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 6', 'Rp. 1.100.000')">Kamar No. 6</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="changeValue('Kamar No. 7', 'Rp. 1.450.000')">Kamar No. 7</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-item">
                <label for="p" class="form-label fw-medium">No. Kamar Baru</label>
                <input type="text" id="p" class="form-control" disabled placeholder="mohon pilih kamar baru..">
            </div>
            <div class="form-item">
                <label for="p" class="form-label fw-medium">Harga Kamar Baru</label>
                <input type="text" id="d" class="form-control" disabled placeholder="mohon pilih kamar baru..">
            </div>
            <div class="form-item">
                <label for="tanggal" class="form-label fw-medium">Tanggal Pindah</label>
                <input type="date" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Alasan Pindah Kamar (Opsional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="tambahkan alasan anda pindah kamar.."></textarea>
            </div>
        </div>

        <button type="submit" class="fw-medium rounded-pill mt-0 mb-4" disabled id="tombol">KIRIM PENGAJUAN</button>
    </form>
    <script>
        function changeValue(nomor, kamar) {
            document.getElementById('p').value = nomor;
            document.getElementById('d').value = kamar;

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
