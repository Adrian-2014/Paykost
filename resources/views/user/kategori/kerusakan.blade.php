@extends('layout.main')
@section('title', 'pindah kamar')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/kerusakan.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Laporan Kerusakan
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
                <label for="k-now" class="form-label fw-medium">No. Kamar</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. 5" disabled>
            </div>
        </div>

        <div class="formulir sec">

            <div class="form-item">
                <label for="p" class="form-label fw-medium forFile">Kerusakan</label>
                <div class="dropdown">

                    <input type="text" disabled class="form-control" id="isi" placeholder="pilih barang anda yang hilang">
                    </input>
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="first">
                            <div class="item" onclick="bagian('Kunci Kamar')">Pintu</div>
                        </li>
                        <li>
                            <div class="item" onclick="bagian('Handphone')">Plafon</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="bagian('Laptop')">Ac</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="bagian('Dompet')">Lantai Kamar</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="bagian('Uang Tunai')">Keran Air</div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="bagian('Lainnya..')">Lainnya..</div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="form-item">
                <label for="files" class="form-label fw-medium">Unggah foto bagian yang rusak</label>
                <input type="file" id="files" class="form-control">
                <label for="files" class="labelFile">
                    <div class="placeholder">choose file</div>
                </label>
            </div>

        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Keterangan lanjutan (Opsional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="tambahkan keterangan anda di sini.."></textarea>
            </div>
        </div>

        <button type="submit" class="fw-medium rounded-pill mt-0 mb-4" disabled id="tombol">KIRIM LAPORAN</button>
    </form>

    <script>
        function bagian(barangHilang) {
            var isiInput = document.getElementById('isi');
            var placeholderText = '';
            if (barangHilang === 'Lainnya..') {
                isiInput.value = '';
                isiInput.disabled = false;
                placeholderText = 'Bagian yang mengalami kerusakan..';
                isiInput.focus();
            } else {
                isiInput.value = barangHilang;
                isiInput.disabled = true;
                placeholderText = 'Pilih bagian yang rusak';
            }
            isiInput.placeholder = placeholderText;
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
