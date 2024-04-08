@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/profil.css') }}">

@section('title', 'Home')

@section('container')

    <section class="profil">
        <div class="profil-prof">
            <div class="myImage">
                @if (Auth::user()->profil)
                    <img src="{{ asset('uploads/' . Auth::user()->profil) }}">
                @else
                    <img src="{{ asset('img/person-1.jpg') }}">
                @endif
            </div>
            <div class="name">
                {{ auth()->user()->name }}
            </div>
            <div class="kamar">
                Kamar No. 5
            </div>
        </div>
    </section>

    <section class="detail-prof">
        <div class="beta">
            <div class="first-choice">
                <div class="item-choice first" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="details">
                        <i class="bi bi-person-fill"></i>
                        <div class="info">
                            Profil
                        </div>
                    </div>
                    <div class="chev">
                        {{-- <i class="bi bi-chevron-right"></i> --}}
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="last-choice">
                <div class="item-choice first">
                    <div class="details">
                        <i class="bi bi-person-fill"></i>
                        <div class="info">
                            Profil
                        </div>
                    </div>
                    <div class="chev">
                        {{-- <i class="bi bi-chevron-right"></i> --}}
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="item-choice">
                    <div class="details">
                        <i class="ti ti-at"></i>
                        <div class="info">
                            Akun
                        </div>
                    </div>
                    <div class="chev">
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Profil</h1>
                </div>
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="for-edit-profil">
                            <label class="pp" for="profils">
                                @if (Auth::user()->profil)
                                    <img src="{{ asset('uploads/' . auth()->user()->profil) }}" class="photo">
                                @else
                                    <img src="{{ asset('img/person-1.jpg') }}" class="photo">
                                @endif
                                <button type="button" class="my-btn">
                                    <input type="file" name="photo" id="profils" onchange="loadFile(event)">
                                    <label for="profils">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                    </label>
                                </button>
                            </label>
                            <div class="users">
                                <label>Nama User</label>
                                <input type="text" name="username" class="form-control" value="{{ Auth::user()->name }}">
                                <label class="mt-2">No Telephone</label>
                                <input type="text" name="no_telpon" class="form-control" value="{{ Auth::user()->no_telpon }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn save">Simpan</button>
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
                title: 'Sukses!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000, // Waktu penampilan Sweet Alert (dalam milidetik)
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
