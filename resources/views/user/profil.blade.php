@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/profil.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css">

@section('title', 'Home')

@section('container')

    <section class="profil">
        <div class="profil-prof">
            <div class="myImage">
                @if (Auth::user()->profil)
                    <img src="{{ asset('uploads/' . Auth::user()->profil) }}">
                @else
                    <img src="{{ asset('img/user.png') }}">
                @endif
            </div>
            <div class="name">
                {{ auth()->user()->name }}
            </div>
            <div class="kamar">
                Kamar No. {{ auth()->user()->no_kamar }}
            </div>
        </div>
    </section>

    <section class="detail-prof">
        <div class="beta">
            <div class="first-choice">
                <div class="item-choice first" data-bs-toggle="modal" data-bs-target="#profil">
                    <div class="details">
                        <i class="bi bi-person-fill"></i>
                        <div class="info">
                            Profil
                        </div>
                    </div>
                    <div class="chev">
                        ubah
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice" data-bs-toggle="modal" data-bs-target="#account">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
                        ubah
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="last-choice">
                <div class="item-choice first">
                    <div class="details">
                        <div class="icon">
                            <i class="ti ti-door"></i>
                        </div>
                        <div class="info">
                            <div class="heads">No Kamar</div>
                            <div class="values">Kamar No. {{ auth()->user()->no_kamar }}</div>
                        </div>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <div class="icon">
                            <i class="ti ti-calendar-stats"></i>
                        </div>
                        <div class="info">
                            <div class="heads">Tanggal Masuk</div>
                            <div class="values">{{ $tanggalMasuk->translatedFormat('j F Y') }}</div>
                        </div>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <div class="icon">
                            <i class="ti ti-clock-hour-2"></i>
                        </div>
                        <div class="info">
                            <div class="heads">Durasi Ngekost</div>
                            <div class="values">{{ $hasil }}</div>
                        </div>
                    </div>
                </div>

                <div class="item-edit" data-bs-toggle="modal" data-bs-target="#no_telpon">
                    <div class="deskripsi-singkat">
                        <div class="icons">
                            <i class="ti ti-phone"></i>
                        </div>
                        <div class="value-change">
                            {{ auth()->user()->no_telpon }}
                        </div>
                    </div>
                    <div class="icon-change">
                        ubah
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-edit" data-bs-toggle="modal" data-bs-target="#kelamin">
                    <div class="deskripsi-singkat">
                        <div class="icons">
                            @if (Auth::user()->jenis_kelamin === 'Laki Laki')
                                <i class="ti ti-gender-male"></i>
                            @else
                                <i class="ti ti-gender-female"></i>
                            @endif
                        </div>
                        <div class="value-change">
                            {{ auth()->user()->jenis_kelamin }}
                        </div>
                    </div>
                    <div class="icon-change">
                        ubah
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-edit" data-bs-toggle="modal" data-bs-target="#pekerjaan">
                    <div class="deskripsi-singkat">
                        <div class="icons">
                            <i class="ti ti-world"></i>
                        </div>
                        <div class="value-change">
                            {{ auth()->user()->pekerjaan }}
                        </div>
                    </div>
                    <div class="icon-change">
                        ubah
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>

                <div class="item-choice" id="logoutBtn">
                    <div class="details">
                        <i class="ti ti-logout"></i>
                        <div class="info logout">
                            Logout
                        </div>
                    </div>
                    <div class="chev">
                        <i class="fa-solid fa-chevron-right log"></i>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal -->

    <div class="modal fade" id="account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('akun.update') }}" method="POST" x-data="{ emails: '', password: '' }">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-account">
                            <label>Email Lama</label>
                            <input type="email" name="old_email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                            <input type="hidden" value="{{ auth()->user()->password }}" name="password_old">
                        </div>
                        <div class="for-edit-account pt-2">
                            <label>Email Baru</label>
                            <input type="text" name="new_email" class="form-control" value="" x-model="emails">
                        </div>
                        <div class="for-edit-account">
                            <label>Password Baru</label>
                            <input type="text" name="new_password" class="form-control" value="" x-model="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save" :disabled="(password || emails) === ''">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" x-data="{ name: '{{ auth()->user()->name }}' }">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-profil">
                            <label class="pp" for="profils">
                                @if (Auth::user()->profil)
                                    <img src="{{ asset('uploads/' . auth()->user()->profil) }}" class="photo">
                                @else
                                    <img src="{{ asset('img/user.png') }}" class="photo">
                                @endif
                                <button type="button" class="my-btn">
                                    <input type="file" name="photo" id="profils" x-on:change="loadFile(event);">
                                    <label for="profils">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                    </label>
                                </button>
                            </label>
                            <div class="users">
                                <label>Nama User</label>
                                <input type="text" name="username" class="form-control" value="" x-model="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save" :disabled="name ? null : 'disabled'">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="no_telpon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('noTelp.update') }}" method="POST" enctype="multipart/form-data" x-data="{ noTelp: '{{ Auth::user()->no_telpon }}' }">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-profil">
                            <label>No Telpon</label>
                            <input type="text" name="no_telpon" class="form-control" value="" x-model="noTelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save" :disabled="noTelp === '{{ Auth::user()->no_telpon }}' || noTelp.length < 10">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kelamin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('kelamin.update') }}" method="POST" enctype="multipart/form-data" x-data="{ kelamin: '{{ Auth::user()->jenis_kelamin }}' }">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-profil">
                            <label>Jenis Kelamin</label>
                            {{-- <input type="text" name="jenis_kelamin" class="form-control" value="" x-model="kelamin"> --}}
                            <div class="dropdown jenis" id="drop">
                                <input type="text" readonly class="form-control" id="add-lokasi" name="jenis_kelamin" placeholder="Ubah Jenis Kelamin . . ." required x-model= 'kelamin'>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" x-on:click = "kelamin = 'Laki Laki'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/male.png') }}">
                                            </div>
                                            <div class="value">
                                                Laki Laki
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" x-on:click = "kelamin = 'Perempuan'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/female.png') }}">
                                            </div>
                                            <div class="value">
                                                Perempuan
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save" :disabled="kelamin === '{{ Auth::user()->jenis_kelamin }}' || kelamin === ''">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pekerjaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pekerjaan.update') }}" method="POST" enctype="multipart/form-data" x-data="{ pekerjaan: '{{ Auth::user()->pekerjaan }}' }">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-profil">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="" x-model="pekerjaan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save" :disabled="pekerjaan === '{{ Auth::user()->pekerjaan }}' || pekerjaan == ''">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/user/index" class="nav-link">
                    <i class='fas fa-home'></i>
                    <div class="isi fw-normal">Beranda</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/kamarku" class="nav-link">
                    <i class='fas fa-door-open'></i>
                    <div class="isi fw-normal">Kamarku</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/user/riwayat" class="nav-link">
                    <i class="fa fa-history"></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
            <div class="nav-item active">
                <a href="/user/profil" class="nav-link">
                    <i class='fas fa-user-alt'></i>
                    <div class="isi fw-normal">Profil</div>
                </a>
            </div>

        </div>
    </nav>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                timer: 3000,
                showConfirmButton: false,
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('logoutBtn');
            button.addEventListener('click', function(e) {
                e.preventDefault();

                // Display Sweet Alert for confirmation
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda akan keluar dari akun ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Keluar!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform logout action here, for example redirect to logout page
                        window.location.href = "/logout";
                    }
                });
            });
        });

        function loadFile(event) {
            var image = document.querySelector('.photo');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
