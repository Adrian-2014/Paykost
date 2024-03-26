@extends('layout.main')
@section('title', 'login page')
<link rel="stylesheet" href="css/style.css">

@section('container')

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible mx-auto">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="body">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6 col-11">
                    <form action="/" method="POST" id="log-form">
                        @csrf
                        <div class="image d-flex justify-content-center mt-2">
                            <img src="{{ asset('img/logo-old.png') }}" class="mb-lg-1 mb-4">
                        </div>

                        <div class="w-100 mt-5">
                            <input class="form-control form-control-sm" type="email" placeholder="Masukkan email anda..." name="email" value="{{ old('email') }}" autocomplete="off">

                        </div>
                        <div class="w-100 mt-3 position-relative">
                            <input class="form-control form-control-sm" type="password" placeholder="Masukkan kata sandi anda..." name="password" id="password" autocomplete="off">
                            <i class="bi bi-eye-slash" id="waduh" style="position: absolute; top: 32%; left: 91% !important;"></i>
                        </div>
                        <div class="link mt-2 text-white text-end" style="text-shadow: 0 0 1.2px black;">
                            Lupa password?
                            <a href="/pengajuan" class="text-white"> Klik disini</a>
                        </div>
                        <button type="submit" class="w-100 mt-4" id="tombol" disabled>Masuk</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="bot">
            Idea by Burning Room Technology
        </div>

    </div>



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


        function enableSubmit() {
            var requiredInputs = document.getElementById("log-form").querySelectorAll("input");
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
        var formInputs = document.getElementById("log-form").querySelectorAll("input");
        formInputs.forEach(function(input) {
            input.addEventListener("input", enableSubmit);
        });
    </script>

@endsection
