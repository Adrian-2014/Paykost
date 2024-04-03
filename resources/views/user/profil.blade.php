@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/profil.css') }}">

@section('title', 'Home')

@section('container')

    <section class="profil">
        <div class="profil-prof">
            <div class="myImage">
                <img src="{{ asset('img/person-1.jpg') }}">
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
                <div class="item-choice" id="logoutBtn">
                    <div class="details">
                        <i class="ti ti-logout"></i>
                        <div class="info">
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

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform logout action here, for example redirect to logout page
                    window.location.href = "/logout";
                }
            });
        });
    });
</script>
