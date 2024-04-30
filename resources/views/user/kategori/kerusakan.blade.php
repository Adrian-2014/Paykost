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

    <form action="{{ route('laporan.kerusakan') }}" method="post" class="form" id="form" enctype="multipart/form-data" x-data="{ rusak: '' }">
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
                <div class="for-uploadFoto">
                    <label for="files" class="form-label fw-medium">Unggah Foto<span>*</span></label>
                    <div class="uploadFoto">
                        <div class="uploadFoto-item">
                            <input type="file" id="files1" name="input1" class="form-control untuk-file" accept="image/*">
                            <div class="input-area">
                                <label for="files1" class="labelFile" id="labelku1">
                                    <i class='bx bx-cloud-upload'></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addInput">
                        <i class="bi bi-plus"></i>
                    </button>
                    <div class="notification">
                        Berhasil Di Hapus!
                    </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            const uploadContainer = document.querySelector('.uploadFoto');
            const addInputButton = document.getElementById('addInput');
            let inputCount = 1;

            addInputButton.style.display = 'none';

            function checkInputs() {
                const inputs = uploadContainer.querySelectorAll('.untuk-file');
                let allInputsFilled = true;
                inputs.forEach(input => {
                    if (!input.files[0]) {
                        allInputsFilled = false;
                    }
                });

                if (allInputsFilled && inputCount < 5) {
                    addInputButton.disabled = false;
                } else {
                    addInputButton.disabled = true;
                }
            }

            uploadContainer.addEventListener('change', function(event) {
                if (event.target && event.target.classList.contains('untuk-file')) {
                    const fileInput = event.target;
                    const file = fileInput.files[0];
                    const targetLabel = fileInput.parentElement.querySelector('.labelFile');

                    if (targetLabel && file) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);

                        targetLabel.style.display = 'none';
                        targetLabel.parentElement.appendChild(img);

                        const deleteButton = document.createElement('button');
                        deleteButton.classList.add('button-delete');
                        deleteButton.innerHTML = '<i class="bi bi-trash3"></i>';
                        deleteButton.addEventListener('click', function() {
                            const parentDiv = fileInput.closest('.uploadFoto-item');
                            parentDiv.remove();
                            inputCount--;
                            updateIdsAndNames();
                            checkInputs();
                            addInputButton.style.display = 'block';
                        });
                        targetLabel.parentElement.appendChild(deleteButton);

                        if (inputCount < 5) {
                            addInputButton.style.display = 'block';
                        }
                    }

                    if (inputCount === 5) {
                        addInputButton.style.display = 'none';
                    }

                    checkInputs();
                }
            });

            addInputButton.addEventListener('click', function() {
                if (inputCount < 5) {
                    const newInputDiv = document.createElement('div');
                    newInputDiv.classList.add('uploadFoto-item');
                    newInputDiv.innerHTML = `
                <input type="file" id="files${inputCount + 1}" name="input${inputCount + 1}" class="form-control untuk-file" accept="image/*">
                <div class="input-area">
                    <label for="files${inputCount + 1}" class="labelFile" id="labelku${inputCount + 1}">
                        <i class='bx bx-cloud-upload'></i>
                    </label>
                </div>`;
                    uploadContainer.appendChild(newInputDiv);

                    inputCount++;

                    if (inputCount === 5) {
                        addInputButton.style.display = 'none';
                    }

                    checkInputs();
                }
            });


            function updateIdsAndNames() {
                const inputs = uploadContainer.querySelectorAll('.untuk-file');
                inputs.forEach((input, index) => {
                    input.id = `files${index + 1}`;
                    input.name = `input${index + 1}`;
                    const label = input.parentElement.querySelector('.labelFile');
                    label.setAttribute('for', `files${index + 1}`);
                });
            }
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     const uploadContainer = document.querySelector('.uploadFoto');
        //     const addInputButton = document.getElementById('addInput');
        //     let inputCount = 1;

        //     addInputButton.addEventListener('click', function() {
        //         if (inputCount < 5) {
        //             inputCount++;
        //             const newInputDiv = document.createElement('div');
        //             newInputDiv.classList.add('uploadFoto-item');
        //             newInputDiv.innerHTML = `
    //             <input type="file" id="files${inputCount}" name="input${inputCount}" class="form-control untuk-file" accept="image/*">
    //              <div class="input-area">
    //                  <label for="files${inputCount}" class="labelFile" id="labelku${inputCount}">
    //                         <i class='bx bx-cloud-upload'></i>
    //                     </label>
    //                 </div>
    //             `;
        //             uploadContainer.insertBefore(newInputDiv, addInputButton);
        //         } else {
        //             addInputButton.style = 'display: none;'
        //         }

        //         if (inputCount === 5) {
        //             addInputButton.style = 'display: none;'
        //         }
        //     });

        //     uploadContainer.addEventListener('click', function(event) {
        //         if (event.target && event.target.classList.contains('button-delete')) {
        //             const deleteButton = event.target;
        //             const uploadItem = deleteButton.parentElement;
        //             const uploadContainer = uploadItem.parentElement;
        //             uploadContainer.removeChild(uploadItem);
        //             inputCount--;

        //             // Mengatur ulang ID dan label untuk input yang tersisa
        //             const uploadItems = uploadContainer.querySelectorAll('.uploadFoto-item');
        //             uploadItems.forEach((item, index) => {
        //                 const input = item.querySelector('input');
        //                 const label = item.querySelector('label');
        //                 input.id = `files${index + 1}`;
        //                 input.name = `input${index + 1}`;
        //                 label.setAttribute('for', `files${index + 1}`);
        //                 label.id = `labelku${index + 1}`;
        //             });
        //         }
        //     });

        //     // Event listener untuk menghapus preview img dan input saat tombol hapus di klik
        //     uploadContainer.addEventListener('click', function(event) {
        //         if (event.target && event.target.tagName === 'IMG') {
        //             const img = event.target;
        //             const uploadItem = img.parentElement;
        //             const input = uploadItem.querySelector('input');
        //             const label = uploadItem.querySelector('label');
        //             const deleteButton = uploadItem.querySelector('.button-delete');

        //             input.value = '';
        //             label.style.display = 'flex';
        //             uploadItem.removeChild(img);
        //             uploadItem.removeChild(deleteButton);
        //         }
        //     });
        // });


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
