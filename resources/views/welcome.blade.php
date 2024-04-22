@extends('layout.main')
@section('title', 'login page')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('container')

    <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                {{-- @if ($background->isNotEmpty())
                    @foreach ($background as $item)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                        </li>
                    @endforeach
                @else --}}
                    <li class="splide__slide">
                        <img src="{{ asset('img/exterior.jpg') }}">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('img/kost.jpeg') }}">
                    </li>
                {{-- @endif --}}
            </ul>
        </div>
    </section>

    <form action="/masuk" method="POST" id="log-form" x-data="{ input1: '', input2: '' }">
        @csrf
        <div class="image">
            <img src="{{ asset('img/logo-old.png') }}">
        </div>

        <div class="kumpulan-input container-fluid">
            <div class="row">
                <div class="col-12">
                    <label for="" class="ps-1">Email</label>
                    <input type="email" placeholder="Masukkan email anda . . ." name="email" value="{{ old('email') }}" autocomplete="off" x-model="input1">
                </div>
                <div class="col-12 password">
                    <label for="" class="ps-1">Password </label>
                    <div class="input-password">
                        <input type="password" placeholder="Masukkan kata sandi anda . . ." name="password" id="password" autocomplete="off" x-model="input2">
                        <div class="icon">
                            <i class="bi-eye-slash" id="waduh"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="link">
                <div class="fs">
                    Lupa password?
                </div>
                <a href="/pengajuan" class="text-white"> Klik disini</a>
            </div>
        </div>
        <div class="for-tombol">
            <button type="submit" id="tombol" :disabled="input1 && input2 ? null : 'disabled'">Masuk</button>
        </div>
        <div class="bot">
            Idea by Burning Room Technology
        </div>
    </form>


    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ Session::get('error') }}',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000 // Waktu penampilan Sweet Alert (dalam milidetik)
            });
        </script>
    @endif

    <script>
        let waduh = document.getElementById("waduh");
        let password = document.getElementById("password");
        waduh.onclick = function() {
            if (password.type == 'password') {
                password.type = "text";
                waduh.classList.remove("bi-eye-slash");
                waduh.classList.add("bi-eye");
            } else {
                password.type = "password";
                waduh.classList.add("bi-eye-slash");
                waduh.classList.remove("bi-eye");
            }
        }

        var splide = new Splide('.splide', {
            type: 'fade',
            rewind: true,
            arrows: false,
            autoplay: true,
            interval: 15000,
            speed: 10000,
            pagination: false,
        });

        splide.mount();
    </script>

@endsection
