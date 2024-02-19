@extends('layout.main')
@section('title', 'laporan kerusakan')
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

    <form action="" method="" class="form" id="form" enctype="multipart/form-data">
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
            <div class="form-item first">
                <label class="form-label fw-medium forFile">Apa yang Rusak? <span>*</span></label>
                <div class="dropdown">
                    <input type="text" disabled class="form-control" id="isi" placeholder="Bagian yang mengalami kerusakan...">
                    </input>
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="first">
                            <div class="item" onclick="bagian('Pintu Kamar')">
                                <div class="icons">
                                    <img src="{{ asset('/gambar-kategori/door.png') }}">
                                </div>
                                <div class="value">
                                    Pintu Kamar
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="bagian('Plafon Kamar')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/asbestos.png') }}">
                                </div>
                                <div class="value">
                                    Plafon Kamar
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="bagian('Ac Kamar')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/air-conditioner.png') }}">
                                </div>
                                <div class="value">
                                    AC Kamar
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="bagian('Lantai Kamar')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/floor.png') }}">
                                </div>
                                <div class="value">
                                    Lantai Kamar
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item" onclick="bagian('Keran Air Kamar mandi')">
                                <div class="icons">
                                    <img src="{{ asset('gambar-kategori/faucet.png') }}">
                                </div>
                                <div class="value">
                                    Keran Air Kamar Mandi
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="item" onclick="bagian('Lainnya...')">
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
                <label for="tanggal" class="fw-medium">Tanggal Rusak <span>*</span></label>
                <input type="date" id="tangal" class="form-control">
            </div>
            <div class="form-item">
                <label for="files" class="form-label fw-medium">Unggah Foto <span>*</span></label>
                <div class="uploadFoto">
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files1" class="form-control untuk-file" accept="image/*">
                            <label for="files1" class="labelFile" id="labelku1">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files2" class="form-control untuk-file" accept="image/*">
                            <label for="files2" class="labelFile" id="labelku2">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files3" class="form-control untuk-file" accept="image/*">
                            <label for="files3" class="labelFile" id="labelku3">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files4" class="form-control untuk-file" accept="image/*">
                            <label for="files4" class="labelFile" id="labelku4">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files5" class="form-control untuk-file" accept="image/*">
                            <label for="files5" class="labelFile" id="labelku5">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="notification">
                    Berhasil Di Hapus!
                </div>

            </div>
        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Keterangan (Opsional)</label>
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
        // Menangkap semua elemen input file
        const inputFiles = document.querySelectorAll('.untuk-file');
        const isian = document.querySelector('.uploadFoto');

        // Loop melalui setiap elemen input file
        inputFiles.forEach(input => {
            input.addEventListener('change', function() {
                // Menghapus gambar sebelumnya jika ada
                const inputArea = this.parentElement;
                const existingImg = inputArea.querySelector('img');
                if (existingImg) {
                    existingImg.remove();
                    // Mengembalikan label
                    const label = inputArea.querySelector('.labelFile');
                    label.style.display = 'flex';
                }

                // Mengambil file yang diunggah
                const file = this.files[0];

                // Membuat elemen gambar baru
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);

                // Membuat tombol hapus
                var deleteButton = document.createElement('button');
                deleteButton.classList.add('button-delete')
                deleteButton.innerHTML = '<i class="bi bi-trash3"></i>';
                deleteButton.addEventListener('click', function() {
                    img.remove();
                    this.remove();
                    // Mengembalikan label
                    const label = inputArea.querySelector('.labelFile');
                    label.style.display = 'flex';
                    // Mengosongkan nilai input file
                    input.value = '';

                    // Menambahkan div pesan berhasil dihapus
                    const successMessage = document.createElement('div');
                    successMessage.classList.add('notification', 'visible');
                    successMessage.textContent = 'Berhasil dihapus';
                    isian.appendChild(successMessage);

                    // Menambahkan timeout untuk menghapus pesan setelah 2 detik
                    setTimeout(function() {
                        successMessage.classList.remove('visible');
                    }, 800);


                    // Menambahkan div dengan latar belakang merah selama 2 detik
                });

                // Menghapus label
                const label = inputArea.querySelector('.labelFile');
                label.style.display = 'none';

                // Menambahkan gambar dan tombol hapus ke dalam div input-area
                inputArea.appendChild(img);
                inputArea.appendChild(deleteButton);
            });
        });
    </script>

    <script>
        function bagian(barangHilang) {
            var isiInput = document.getElementById('isi');
            var placeholderText = '';
            if (barangHilang === 'Lainnya...') {
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

    {{-- <script>
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
    </script> --}}

    <script>
        function enableSubmit() {
            var requiredInputs = document.querySelectorAll(".form-item:not(.uploadFoto) input");
            var uploadFotoInputs = document.querySelectorAll(".uploadFoto input");
            var btn = document.getElementById('tombol');
            var isValid = true;

            // Check if all required inputs outside the uploadFoto div are filled
            for (var i = 0; i < requiredInputs.length; i++) {
                if (requiredInputs[i].value.trim() === "" || requiredInputs[i].value === null) {
                    isValid = false;
                    break;
                }
            }

            // Check if at least one input inside the uploadFoto div is filled
            var uploadFotoFilled = false;
            for (var j = 0; j < uploadFotoInputs.length; j++) {
                if (uploadFotoInputs[j].value.trim() !== "" && uploadFotoInputs[j].value !== null) {
                    uploadFotoFilled = true;
                    break;
                }
            }

            // Enable or disable the button based on conditions
            btn.disabled = !(isValid && uploadFotoFilled);

            // Update button class based on validity
            if (isValid && uploadFotoFilled) {
                btn.classList.remove("mati");
                btn.classList.add("active");
            } else {
                btn.classList.remove("active");
                btn.classList.add("mati");
            }
        }

        // Attach the function to input events (e.g., input, change)
        var formInputs = document.querySelectorAll("#form input");
        formInputs.forEach(function(input) {
            input.addEventListener("input", enableSubmit);
        });
    </script>

@endsection
