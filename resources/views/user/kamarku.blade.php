@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/kamarku.css') }}">

@section('title', 'Kamarku')

@section('container')

    <div class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($kamar_kost as $kamar)
                    @foreach ($kamar->gambarKamar as $gambar)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $gambar->gambar) }}">
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container umum">
        <div class="wrap">
            <div class="status">
                <div class="kamar-info">
                    Kamar No. {{ auth()->user()->no_kamar }}
                </div>
                <div class="sparate">
                    <i class="ti ti-point-filled"></i>
                </div>
                @php
                    $pay = App\Models\pembayaranKost::where('user_id', auth()->user()->id)
                        ->latest()
                        ->first();
                @endphp
                @if ($pay)
                    @if ($pay->status === 'Diterima')
                        <div class="stat lunas">
                            Kost Sudah Terbayar
                        </div>
                    @else
                        <div class="stat tolak">
                            Kost belum Terbayar
                        </div>
                    @endif
                @else
                    <div class="stat tolak">
                        Kost belum Terbayar
                    </div>
                @endif
            </div>
            <div class="tanggal">
                <div class="item kiri">
                    <div class="desk-tgl">
                        Tanggal Masuk Kost
                    </div>
                    <div class="real-tgl" id="tgl-masuk">

                    </div>
                </div>
                <div class="item kanan">
                    <input type="hidden" name="tm" id="tm" value="{{ auth()->user()->tanggal_masuk }}">
                    <div class="desk-tgl">
                        Durasi Ngekost
                    </div>
                    <div class="real-tgl" id="durasi">

                    </div>
                </div>
            </div>
            <div class="for-detail">
                <div class="item">
                    <div class="above">
                        Ukuran Kamar
                    </div>
                    <div class="bottom">
                        @foreach ($kamar_kost as $kamar)
                            {{ $kamar->ukuran_kamar }}
                        @endforeach
                    </div>
                </div>
                <div class="bayar">
                    <div class="above">
                        Harga / Bulan
                    </div>
                    <div class="bottom">
                        <span>Rp. </span>
                        @foreach ($kamar_kost as $kamar)
                            {{ $kamar->harga_kamar }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container rules">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Peraturan Kost
            </button>
            <ul class="dropdown-menu">
                <li class="first">1. Buang Sampah pada tempatnya</li>
                <li>2. Dilarang Membawa Miras / Narkoba</li>
                <li>3. Dilarang Membuat Suara Kencang di malam hari</li>
                <li>4. Di larang Berkunjung di atas jam 21:00</li>
                <li>5. Pagar wajib di kunci kembali setelah di buka</li>
                <li>6. Wajib mengganti Properti kost yang di rusak</li>
                <li>7. Boleh Membawa bayi</li>
                <li>8. Tidak boleh Membawa hewan peliharaan</li>
                <li>9. Bayar sewa tepat waktu</li>
            </ul>
        </div>
    </div>

    <div class="container fasilitas">
        <div class="mycontent">
            @foreach ($kamar_kost as $item)
                <div class="jud-kamar">
                    Fasilitas Kamar
                </div>
                <div class="fasilitas kamar">
                    @foreach ($fasKamar as $facilite)
                        @php
                            $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $item->id)
                                ->where('fasilitas_id', $facilite->id)
                                ->first();
                        @endphp
                        @if ($kamar_kost)
                            <div class="item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $facilite->id }}">
                                <div class="for-img">
                                    <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                </div>
                            </div>
                        @endif
                        <div class="modal fade" id="exampleModal{{ $facilite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                        <div class="desk">
                                            <div class="top">
                                                {{ $facilite->nama }}
                                            </div>
                                            <div class="bottom">
                                                {{ $facilite->deskripsi }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="jud-umum">
                    Fasilitas Umum
                </div>
                <div class="fasilitas umum">
                    @foreach ($fasUmum as $facilite)
                        @php
                            $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $item->id)
                                ->where('fasilitas_id', $facilite->id)
                                ->first();
                        @endphp
                        @if ($kamar_kost)
                            <div class="item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $facilite->id }}">
                                <div class="for-img">
                                    <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                </div>
                            </div>
                        @endif
                        <div class="modal fade" id="exampleModal{{ $facilite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{ asset('uploads/' . $facilite->gambar) }}">
                                        <div class="desk">
                                            <div class="top">
                                                {{ $facilite->nama }}
                                            </div>
                                            <div class="bottom">
                                                {{ $facilite->deskripsi }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <div class="container pic">
        <div class="head pb-1">
            Kamar Kost Kamu
        </div>

        <div class="for-foto">

            @foreach ($fotoku as $foto)
                <div class="data-foto" data-bs-toggle="modal" data-bs-target="#foto{{ $foto->id }}">
                    <div class="item">
                        <img src="{{ asset('uploads/' . $foto->gambar) }}">
                    </div>
                </div>

                {{-- modal --}}
                <div class="modal fade fotoku" id="foto{{ $foto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="{{ asset('uploads/' . $foto->gambar) }}">
                            </div>
                            <div class="modal-footer">
                                <div class="for-edit">
                                    <form action="{{ route('edit.pic') }}" method="post" class="edit-form" id="formEdit{{ $foto->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="btns">
                                            <input type="hidden" name="id" value="{{ $foto->id }}">
                                            <input type="file" name="gambar" id="edit-{{ $foto->id }}" class="edit-pics" onchange="submitForm('formEdit{{ $foto->id }}')">
                                            <label for="edit-{{ $foto->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="for-delete">
                                    <form action="{{ route('delete.pic') }}" method="post" class="delete-form" id="formDelete{{ $foto->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="btns">
                                            <input type="hidden" name="id" value="{{ $foto->id }}">
                                            <input type="hidden" value="{{ $item->gambar }}">
                                            <button type="submit" class="deletes">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form action="{{ route('kamarUpload') }}" method="post" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <div class="upload-foto">
                    <input type="file" id="file" name="gambar" onchange="uploadss('uploadForm')">
                    <label for="file">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </label>
                </div>
            </form>
        </div>
    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/user/index" class="nav-link">
                    {{-- <i class="bi bi-house-fill"></i> --}}
                    <i class='fas fa-home'></i>
                    <div class="isi fw-normal">Beranda</div>
                </a>
            </div>
            <div class="nav-item active">
                <a href="/user/kamarku" class="nav-link">
                    <i class='fas fa-door-open'></i>
                    <div class="isi fw-normal">Kamarku</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/riwayat/" class="nav-link">
                    <i class="fa fa-history"></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/profil" class="nav-link">
                    <i class='fas fa-user-alt'></i>
                    <div class="isi fw-normal">Profil</div>
                </a>
            </div>

        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('tanggal.js') }}"></script>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 1,
            autoplay: true,
            interval: 4000,
            arrows: false,
        });

        splide.mount();
    </script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            });

            document.addEventListener('DOMContentLoaded', function() {
                var element = document.querySelector('.container.pic');
                element.scrollIntoView();
            });
        </script>
    @endif

    <script>
        function submitForm(formId) {
            document.getElementById(formId).submit();
            console.log(formId);
        }

        function uploadss(id) {
            document.getElementById(id).submit();
            console.log(id);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let count = 0;
            count = document.querySelectorAll('.data-foto').length;
            if (count < 7) {
                console.log(count);
            } else {
                var formulir = document.querySelector('#uploadForm');
                formulir.classList.add('d-none');
            }

        });

        document.querySelectorAll('.deletes').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Kamu yakin?',
                    text: 'Item ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

@endsection
