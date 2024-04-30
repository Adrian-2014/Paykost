@extends('layout.main')

@section('title', 'Pembayaran kost')

<link rel="stylesheet" href="{{ asset('css/user-css/pembayaran.css') }}">

@section('container')


    <div class="navbar fixed-top">
        <div class="container-fluid">
            <div class="exit">
                <a href="/user/index" class="back">
                    <i class="left" data-feather="chevron-left"></i>
                </a>
                <div class="info fw-medium">
                    Pembayaran Kost
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('bayarKost') }}" method="POST" enctype="multipart/form-data" x-data="{ bank: '', upload: '' }">
        @csrf
        <div class="container-fluid for-explained">
            <div class="container for-banner-kost">
                <div class="splide" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($kamarKost as $kamar)
                                @foreach ($kamar->gambarKamar as $gambar)
                                    <li class="splide__slide">
                                        <img src="{{ asset('uploads/' . $gambar->gambar) }}">
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container for-umum">
                <div class="left">
                    <div class="top">
                        Pembayaran Kost Bulan :
                    </div>
                    <div class="bottom" id="paynows">
                        @if ($pembayaran)
                            {{ $setCarbon->translatedFormat('F Y') }}
                        @else
                            {{ $tanggalMasuk->translatedFormat('F Y') }}
                        @endif
                    </div>
                </div>
                <div class="right">
                    <span>Rp.</span>
                    <div class="harga">
                        @foreach ($kamarKost as $kamar)
                            {{ $kamar->harga_kamar }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bayar">
            <div class="container backup">
                <div class="form-item">
                    <div class="left">
                        ID Transaksi
                    </div>
                    <div class="right" id="pembayaran">
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Nama User
                    </div>
                    <div class="right">{{ auth()->user()->name }}
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        No. Kamar
                    </div>
                    <div class="right">
                        Kamar No. {{ auth()->user()->no_kamar }}
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Bulan Tagihan
                    </div>
                    <div class="right">
                        @if ($pembayaran)
                            {{ $setCarbon->translatedFormat('F Y') }}
                        @else
                            {{ $tanggalMasuk->translatedFormat('F Y') }}
                        @endif
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Tanggal Masuk
                    </div>
                    <div class="right">
                        {{ $tanggalMasuk->translatedFormat('j F Y') }}
                    </div>
                </div>
                <div class="form-item">
                    <div class="left">
                        Durasi Ngekost
                    </div>
                    <div class="right">
                        {{ $hasil }}
                    </div>
                </div>
            </div>
            <div class="container-fluid backup-special">
                <div class="form-item special">
                    <div class="left">
                        Total Tagihan
                    </div>
                    <div class="right">
                        @foreach ($kamarKost as $kamar)
                            <input type="hidden" value="{{ $kamar->harga_kamar }}" name="total_tagihan">
                            <span>Rp.</span> {{ $kamar->harga_kamar }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid trans">
            <div class="command">
                Mohon Transfer ke No. Rekening Ini
            </div>
            <div class="salin">
                <div class="rekening">
                    <div class="no-rek" id="no-rek">065722313040</div>
                    <div class="copy" onclick="salinTeks()">
                        <img src="{{ asset('img-chategories/copy.png') }}" class="ico">
                    </div>
                </div>
            </div>
            <div class="atas-nama fw-medium d-flex">
                <div class="a fw-bold">
                    A/N
                </div>
                <div class="n">ADRIAN</div>
            </div>
        </div>

        <div class="alert">
            <div class="menyala">

            </div>
        </div>

        <div class="container-fluid gateway">
            <div class="for-top">
                <div class="judul">
                    <div class="name">
                        Metode Pembayaran
                    </div>
                    <div class="iconku">
                        <i class="fas fa-wallet"></i>
                    </div>
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

        <div class="container-fluid bukti">
            <div class="for-top">
                <div class="judul">
                    <div class="name">
                        Bukti Pembayaran
                    </div>
                    <div class="icon">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
            </div>
            <div class="for-input">
                <input type="file" name="bukti" id="bukti" class="d-none" onchange="loadFile(event)" x-model="upload">
                <label for="bukti" id="for-bukti">
                    <i id="icon-upload" class="bi bi-cloud-arrow-up"></i>
                    <div class="gambar-upload">
                        <div class="upload-real">
                            <img src="" id="showimg" class="d-none">
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <input type="hidden" name="no_kamar" value="{{ auth()->user()->no_kamar }}">
        <input type="hidden" name="nama_user" value="{{ auth()->user()->name }}">
        <input type="hidden" name="tanggal_masuk" value="{{ $tanggalMasuk->translatedFormat('j F Y') }}">
        <input type="hidden" name="id_pembayaran" value="" readonly id="id_pembayaran">
        <input type="hidden" name="durasi_ngekost" value="{{ $hasil }}" readonly>
        @if ($pembayaran)
            <input type="hidden" name="bulan_tagihan" value="{{ $setCarbon->translatedFormat('d-m-Y') }}">
        @else
            <input type="hidden" name="bulan_tagihan" value="{{ $tanggalMasuk->translatedFormat('d-m-Y') }}">
        @endif
        <input type="hidden" name="bank_name" id="bank_name" x-model="bank">
        @if ($pembayaran)
            <input type="hidden" name="tagihan_selanjutnya" value="{{ $next }}">
        @else
            <input type="hidden" name="tagihan_selanjutnya" value="{{ $sementara }}">
        @endif
        <div class="confirm">
            <div class="container-fluid">
                <button type="submit" class="btn" id="nextPage" :disabled="bank && upload">Bayar Sekarang</button>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function generateRandomString(length) {
            const characters = '1ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '#';

            for (let i = 1; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }

            return result;
        }

        const randomString = generateRandomString(12);
        var target = document.getElementById('id_pembayaran');
        var targets = document.getElementById('pembayaran');
        target.value = randomString;
        targets.innerHTML = randomString;
        console.log(randomString);
    </script>
    <script>
        function salinTeks() {
            var elem = document.getElementById("no-rek");
            var button = document.querySelector(".copy");
            var ico = document.querySelector('.ico');
            var alert = document.querySelector('.alert');
            var menyala = document.querySelector('.menyala');

            var range = document.createRange();
            range.selectNode(elem);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();

            // button.classList.add('copied');
            ico.src = "{{ asset('img-chategories/copied.png') }}";
            ico.classList.add('co');
            menyala.classList.add('cops');
            var isCopy = document.createElement('div');
            isCopy.classList.add('content');
            iscops = elem.innerHTML;
            menyala.innerHTML = ` <div class="valuer">${iscops}</div>
            <div class="teks"> berhasil disalin </div>`;

            setTimeout(function() {
                // button.classList.remove('copied');
                ico.src = "{{ asset('img-chategories/copy.png') }}";
                ico.classList.remove('co');
                menyala.classList.remove('cops');

            }, 1500);

        }


        // document.addEventListener("DOMContentLoaded", function() {
        //     const payItems = document.querySelectorAll('.payItems');
        //     const inputGambar = document.getElementById('img');
        //     const inputNama = document.getElementById('bank_name');

        //     payItems.forEach(function(item) {
        //         item.addEventListener('click', function(event) {
        //             const radioInput = this.querySelector('input[type="radio"]');
        //             const radioChecked = radioInput.checked;

        //             radioInput.checked = !radioChecked;

        //             payItems.forEach(function(itemLain) {
        //                 const radioLain = itemLain.querySelector('input[type="radio"]');
        //                 if (itemLain !== item) {
        //                     radioLain.checked = false;
        //                 }
        //             });

        //             const gambar = this.querySelector('.logos img').getAttribute('src');
        //             const nama = this.querySelector('.nama').innerHTML;

        //             // inputGambar.value = gambar;
        //             inputNama.value = nama;

        //             if (!document.querySelector('input[type="radio"]:checked')) {
        //                 console.log("Tidak ada input radio yang terpilih");
        //                 inputNama.value = '';
        //             }
        //         });

        //         const radioInput = item.querySelector('input[type="radio"]');
        //         radioInput.addEventListener('click', function(event) {
        //             const radioChecked = this.checked;
        //             const parentItem = this.closest('.payItems');

        //             this.checked = !radioChecked;

        //             payItems.forEach(function(itemLain) {
        //                 const radioLain = itemLain.querySelector('input[type="radio"]');
        //                 if (itemLain !== parentItem) {
        //                     radioLain.checked = false;
        //                 }
        //             });

        //             const gambar = parentItem.querySelector('.logos img').getAttribute('src');
        //             const nama = parentItem.querySelector('.nama').innerHTML;

        //             inputGambar.value = gambar;
        //             inputNama.value = nama;

        //             if (!document.querySelector('input[type="radio"]:checked')) {
        //                 disabled();
        //             }
        //         });
        //     });
        // });

        document.addEventListener("DOMContentLoaded", function() {
            const payItems = document.querySelectorAll('.payItems');
            const inputGambar = document.getElementById('img');
            const inputNama = document.getElementById('bank_name');
            const fileInput = document.getElementById('bukti');
            const submitButton = document.getElementById('nextPage');

            function noCheckedInput() {
                return !document.querySelector('input[type="radio"]:checked');
            }

            function isEmptyFileInput() {
                return fileInput.files.length === 0;
            }

            function disabledSubmitButton() {
                if (noCheckedInput() || isEmptyFileInput()) {
                    submitButton.disabled = true;
                } else {
                    submitButton.disabled = false;
                }
            }

            payItems.forEach(function(item) {
                item.addEventListener('click', function(event) {
                    const radioInput = this.querySelector('input[type="radio"]');
                    const radioChecked = radioInput.checked;

                    radioInput.checked = !radioChecked;

                    payItems.forEach(function(itemLain) {
                        const radioLain = itemLain.querySelector('input[type="radio"]');
                        if (itemLain !== item) {
                            radioLain.checked = false;
                        }
                    });

                    const gambar = this.querySelector('.logos img').getAttribute('src');
                    const nama = this.querySelector('.nama').innerHTML;

                    inputNama.value = nama;

                    disabledSubmitButton();
                });
            });

            fileInput.addEventListener('change', function(event) {
                disabledSubmitButton();
            });

            const radioInputs = document.querySelectorAll('input[type="radio"]');
            radioInputs.forEach(function(radioInput) {
                radioInput.addEventListener('click', function(event) {
                    const radioChecked = this.checked;
                    const parentItem = this.closest('.payItems');

                    this.checked = !radioChecked;

                    payItems.forEach(function(itemLain) {
                        const radioLain = itemLain.querySelector('input[type="radio"]');
                        if (itemLain !== parentItem) {
                            radioLain.checked = false;
                        }
                    });

                    const gambar = parentItem.querySelector('.logos img').getAttribute('src');
                    const nama = parentItem.querySelector('.nama').innerHTML;

                    inputGambar.value = gambar;
                    inputNama.value = nama;

                    disabledSubmitButton();
                });
            });

            disabledSubmitButton();
        });

        let previousFileList = {};
        array = [];

        $("input[type='file']").change(function(event) {
            let file_list = event.target.files;
            let key = event.target.id;

            if (file_list.length > 0) {
                persist_file(array, file_list, key);
                previousFileList[key] = file_list;
            } else {
                event.target.files = previousFileList[key];
            }
        });

        function persist_file(array, file_list, key) {
            if (file_list.length > 0) {
                if (member(array, key)) {

                } else {
                    array.push({
                        key: key,
                        file_list: file_list
                    });
                }
            }
        }

        function member(array, key) {
            return array.some((element, index) => {
                return element.key == key;
            });
        }

        function element_for(array, key) {
            return array.find((function(obj, index) {
                return obj.key === key;
            }));
        }



        // function persist_file(array, file_list, key) {
        //     if (file_list.length > 0) {
        //         if (member(array, key)) {
        //             element_for(array, key).file_list = file_list;
        //         } else {
        //             array.push({
        //                 key: key,
        //                 file_list: file_list
        //             })
        //         }
        //     }
        // }

        // function member(array, key) {
        //     return array.some((element, index) => {
        //         return element.key == key
        //     })
        // }

        // function element_for(array, key) {
        //     return array.find((function(obj, index) {
        //         return obj.key === key
        //     }))
        // }

        function loadFile(event) {
            var image = document.getElementById('showimg');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('d-none');
            var icon = document.getElementById('icon-upload');
            icon.classList.add('d-none');
        }
    </script>
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            arrows: false,
        });
        splide.mount();
    </script>
@endsection
