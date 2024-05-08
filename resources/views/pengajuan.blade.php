{{-- {{ dd($datas) }} --}}
@extends('layout.main')
@section('title', 'login page')
<link rel="stylesheet" href="{{ asset('css/pengajuan.css') }}">

@section('container')

    @php
        $datas = \App\Models\Banner::where('lokasi_banner', 'Halaman Login')->where('status', 'Publish')->get();
    @endphp

    <div class="navbar fixed-top">
        <a href="/">
            <i class="fas fa-chevron-left"></i>
        </a>
    </div>

    <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @if ($datas->isNotEmpty())
                    @foreach ($datas as $item)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                        </li>
                    @endforeach
                @else
                    <li class="splide__slide">
                        <img src="{{ asset('img/exterior.jpg') }}">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('img/kost.jpeg') }}">
                    </li>
                @endif
            </ul>
        </div>
    </section>

    <form action="{{ route('pengajuan.route') }}" method="POST" id="log-form" x-data="{ input1: '', input2: '' }">
        @csrf
        <div class="kumpulan-input container-fluid">
            <div class="row">
                <div class="col-12 judul">
                    Pemulihan Password
                </div>
                <div class="col-12 mt-3">
                    <label for="" class="ps-1">Email <span class="text-danger">*</span></label>
                    <input type="email" placeholder="Masukkan email kamu . . ." name="email" value="" autocomplete="off" x-model="input1">
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="ps-1">Nomor Kamar<span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukkan Nomor Kamar kamu . . ." name="no_kamar" autocomplete="off" x-model="input2">
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="ps-1">Keterangan Lanjutan <span class="opsi">(Opsional)</span></label>
                    <textarea name="keterangan_lanjutan" class="form-control" id="" rows="5" placeholder="Masukkan Keterangan tambahan . . ."></textarea>
                </div>
            </div>
            <div class="for-tombol">
                <button type="submit" id="tombol" :disabled="input1 && input2 ? null : 'disabled'">Kirim Pengajuan</button>
            </div>
        </div>
    </form>


    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ Session::get('error') }}',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <script>
        var splide = new Splide('.splide', {
            type: 'fade',
            rewind: true,
            arrows: false,
            autoplay: true,
            interval: 15000,
            speed: 8000,
            pagination: false,
        });

        splide.mount();
    </script>

@endsection
