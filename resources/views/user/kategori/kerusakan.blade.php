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
                        <input type="file" id="files" class="form-control" accept="image/*">
                        <label for="files" class="labelFile" id="labelku">
                            <i class='far fa-folder-open'></i>
                        </label>
                    </div>
                    <div class="uploadFoto-item">
                        <input type="file" id="files" class="form-control" accept="image/*">
                        <label for="files" class="labelFile" id="labelku">
                            <i class='far fa-folder-open'></i>
                        </label>
                    </div>
                    <div class="uploadFoto-item">
                        <input type="file" id="files" class="form-control" accept="image/*">
                        <label for="files" class="labelFile" id="labelku">
                            <i class='far fa-folder-open'></i>
                        </label>
                    </div>
                    <div class="uploadFoto-item">
                        <input type="file" id="files" class="form-control" accept="image/*">
                        <label for="files" class="labelFile" id="labelku">
                            <i class='far fa-folder-open'></i>
                        </label>
                    </div>
                    <div class="uploadFoto-item">
                        <input type="file" id="files" class="form-control" accept="image/*">
                        <label for="files" class="labelFile" id="labelku">
                            <i class='far fa-folder-open'></i>
                        </label>
                    </div>
                </div>
                <div class="splide fotoCrewsakan" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">

                            </li>
                            <li class="splide__slide">

                            </li>
                            <li class="splide__slide">

                            </li>
                        </ul>
                    </div>
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

    <script>
        var splide = new Splide('.splide', {
            perPage: 1,
            autoplay: false,
            drag: 'free',
            arrows: false,
        });

        splide.mount();
    </script>

    {{-- <script>
        document.getElementById('files').addEventListener('change', function() {
            var file = this.files[0];
            var butt = document.querySelector('#statusnya');
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var image = document.querySelector('.uploadItem');
                    image.src = e.target.result;
                    image.setAttribute('id', 'imagePreview');
                    var imageContainer = document.getElementById('');
                    imageContainer.innerHTML = ''; // Kosongkan konten sebelumnya
                    imageContainer.appendChild(image); // Tambahkan gambar baru
                    document.getElementById('labelku').classList.add('uploaded'); //
                    butt.textContent = 'Ganti Foto? ';
                };
                reader.readAsDataURL(file);
            }
        });
    </script> --}}

    <script>
        document.getElementById('files').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var splide = document.querySelectorAll('.splide__slide')
                    var image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('uploadItem')
                    splide.appendChild(image)
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
