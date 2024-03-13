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
                    <input type="text" disabled class="form-control" id="isi" placeholder="Bagian yang mengalami kerusakan..." onkeyup="inputTyped()">
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
            <div class="form-item sec">
                <label for="tanggal" class="fw-medium">Tanggal Rusak <span>*</span></label>
                <input type="date" id="tanggal" class="form-control" style="box-shadow: unset !important">
            </div>
            <div class="form-item third">
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
                <button type="submit" class="fw-medium rounded-pill" id="tombol" disabled>Kirim Laporan</button>
            </div>
        </div>
    </form>


    <script>
        // Mengambil elemen input dan div gambar
        const inputElement = document.getElementById('tanggal');
        const inputIsi = document.getElementById('isi');
        const imageContainer = document.querySelector('.form-item.third');
        const submitButton = document.getElementById('tombol');

        // Menambahkan event listener untuk input
        inputElement.addEventListener('input', function() {
            checkValidation();
        });

        // Menambahkan event listener untuk div gambar
        imageContainer.addEventListener('DOMSubtreeModified', function() {
            checkValidation();
        });


        // dropdown

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

            checkValidation();
        }

        function inputTyped() {
            checkValidation();
        }

        // Loop melalui setiap elemen input file
        const inputFiles = document.querySelectorAll('.untuk-file');
        const isian = document.querySelector('.uploadFoto');

        // Loop melalui setiap elemen input file
        inputFiles.forEach(input => {
            // ...
            input.addEventListener('change', function() {
                // Mengambil file yang diunggah
                const file = this.files[0];

                // Mencari label yang belum memiliki gambar
                let targetLabel = null;
                for (let i = 1; i <= 5; i++) {
                    const label = document.getElementById(`labelku${i}`);
                    const img = label.nextElementSibling;
                    if (!img) {
                        targetLabel = label;
                        break;
                    }
                }

                if (targetLabel) {
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
                        targetLabel.style.display = 'flex';
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

                        // Memeriksa apakah ada elemen gambar kosong di sebelah kanan
                        const nextImageContainer = targetLabel.parentElement.nextElementSibling;
                        if (nextImageContainer) {
                            const nextImg = nextImageContainer.querySelector('img');
                            if (!nextImg) {
                                // Geser gambar-gambar ke kiri
                                const currentImageContainer = targetLabel.parentElement;
                                currentImageContainer.parentElement.removeChild(currentImageContainer);
                                nextImageContainer.parentElement.insertBefore(currentImageContainer, nextImageContainer);
                            }
                        }
                    });

                    // Menghapus label
                    targetLabel.style.display = 'none';

                    // Menambahkan gambar dan tombol hapus ke dalam div input-area
                    targetLabel.parentElement.appendChild(img);
                    targetLabel.parentElement.appendChild(deleteButton);
                }
            });

        });



        function checkValidation() {
            // Memeriksa jika nilai input tidak kosong dan div gambar memiliki setidaknya satu gambar
            if (inputElement.value !== '' && inputIsi.value !== '' && imageContainer.getElementsByTagName('img').length > 0) {
                // Mengaktifkan tombol submit
                submitButton.removeAttribute('disabled');
                submitButton.classList.add('active');
            } else {
                // Menonaktifkan tombol submit
                submitButton.setAttribute('disabled', 'disabled');
                submitButton.classList.remove('active');
            }
        }
    </script>
@endsection
