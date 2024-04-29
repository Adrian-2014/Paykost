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

    <form action="{{ route('laporan.kerusakan') }}" method="post" class="form" id="form" enctype="multipart/form-data" x-data="{ rusak: ''}">
        @csrf
        <div class="formulir first" id="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama User</label>
                <input type="text" id="name" name="nama" class="form-control" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="form-item">
                <label for="k-now" class="form-label fw-medium">No. Kamar</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. {{ auth()->user()->no_kamar }}" readonly>
                <input type="hidden" name="no_kamar" class="form-control" value="{{ auth()->user()->no_kamar }}">
            </div>
        </div>

        <div class="formulir sec">
            <div class="form-item first">
                <label class="form-label fw-medium forFile">Apa yang Rusak? <span>*</span></label>
                <div class="dropdown">
                    <input type="text" disabled class="form-control" name="bagian_rusak" id="isi" placeholder="Bagian yang mengalami kerusakan..." onkeyup="inputTyped()">
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
                <input type="date" id="tanggal" name="tanggal" class="form-control" style="box-shadow: unset !important">
            </div>
            <div class="form-item third">
                <label for="files" class="form-label fw-medium">Unggah Foto <span>*</span></label>
                <div class="uploadFoto">
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files1" name="input1" class="form-control untuk-file" accept="image/*">
                            <label for="files1" class="labelFile" id="labelku1">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files2" name="input2" class="form-control untuk-file" accept="image/*">
                            <label for="files2" class="labelFile" id="labelku2">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files3" name="input3" class="form-control untuk-file" accept="image/*">
                            <label for="files3" class="labelFile" id="labelku3">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files4" name="input4" class="form-control untuk-file" accept="image/*">
                            <label for="files4" class="labelFile" id="labelku4">
                                <i class='bx bx-cloud-upload'></i>
                            </label>
                        </div>
                    </div>
                    <div class="uploadFoto-item">
                        <div class="input-area">
                            <input type="file" id="files5" name="input5" class="form-control untuk-file" accept="image/*">
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
                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="5" placeholder="Tambahkan keterangan kamu..."></textarea>
            </div>
        </div>

        <div class="navbar sticky-bottom">
            <div class="isi">
                <button type="submit" class="fw-medium rounded-pill" id="tombol" disabled>Kirim Laporan</button>
            </div>
        </div>
    </form>


    <script>
        var hariIni = new Date();

        // var besok = new Date(hariIni);
        // besok.setDate(besok.getDate() + 1);
        var hari_real = hariIni.toISOString().split('T')[0];

        document.getElementById("tanggal").setAttribute("max", hari_real);

        const inputElement = document.getElementById('tanggal');
        const inputIsi = document.getElementById('isi');
        const imageContainer = document.querySelector('.form-item.third');
        const submitButton = document.getElementById('tombol');

        inputElement.addEventListener('input', function() {
            checkValidation();
        });

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

        const inputFiles = document.querySelectorAll('.untuk-file');
        const isian = document.querySelector('.uploadFoto');

        inputFiles.forEach(input => {

            input.addEventListener('change', function() {

                const file = this.files[0];

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
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);

                    var deleteButton = document.createElement('button');
                    deleteButton.classList.add('button-delete')
                    deleteButton.innerHTML = '<i class="bi bi-trash3"></i>';
                    deleteButton.addEventListener('click', function() {
                        img.remove();
                        this.remove();

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
            if (inputElement.value !== '' && inputIsi.value !== '' && imageContainer.getElementsByTagName('img').length > 0) {
                submitButton.removeAttribute('disabled');
                submitButton.classList.add('active');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
                submitButton.classList.remove('active');
            }
        }
    </script>
@endsection
