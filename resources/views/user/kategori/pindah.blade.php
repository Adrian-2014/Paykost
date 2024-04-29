@extends('layout.main')
@section('title', 'pindah kamar')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pindah.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Pengajuan Pindah Kamar
            </div>
        </div>
    </div>

    <form action="{{ route('ajukan.pindah') }}" method="post" class="form" id="form" @if (isset($kamarNew)) x-data="{ new_kamar: 'Kamar No. {{ $kamarNew->nomor_kamar }}', real_new_kamar: '{{ $kamarNew->nomor_kamar }}', new_harga: 'Rp. {{ $kamarNew->harga_kamar }}', new_real_harga: '{{ $kamarNew->harga_kamar }}', new_ukuran_kamar: '{{ $kamarNew->ukuran_kamar }}', tanggal_pindah: '', jam_pindah: '' }" @else
    x-data="{ new_kamar: '', real_new_kamar: '', new_harga: '', new_real_harga: '', new_ukuran_kamar: '', tanggal_pindah: '', jam_pindah: '' }" @endif>
        @csrf
        <div class="formulir first" id="formulir">
            <div class="form-item">
                <label for="name" class="form-label fw-medium">Nama User</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="form-item">
                <label for="k-now" class="form-label fw-medium">No. Kamar saat ini</label>
                <input type="text" id="k-now" class="form-control" value="Kamar No. {{ auth()->user()->no_kamar }}" disabled>
                <input type="hidden" name="no_kamar" class="form-control" value="{{ auth()->user()->no_kamar }}">
                <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
            </div>
            <div class="form-item">
                <label for="h-now" class="form-label fw-medium">Harga Kamar saat ini</label>
                <input type="text" id="h-now" class="form-control" value="Rp. {{ $kamar->harga_kamar }}" disabled>
                <input type="hidden" name="harga_kamar" class="form-control" value="{{ $kamar->harga_kamar }}">
            </div>
        </div>

        <div class="formulir sec">
            <div class="form-item">
                <label for="k-new" class="form-label fw-medium">Kamar Baru</label>
                <div class="dropdown lokasi" id="drop">
                    <input type="text" readonly class="form-control add-input" id="add-lokasi" placeholder="Pilih Kamar . . ." required x-model= 'new_kamar'>
                    <input type="hidden"name="kamar_baru" required x-model='real_new_kamar'>
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($pindahKamar as $item)
                            <li class="is-real" x-on:click ="new_kamar = 'Kamar No. {{ $item->nomor_kamar }}',
                            real_new_kamar='{{ $item->nomor_kamar }}',
                            new_harga='Rp. {{ $item->harga_kamar }}',
                            new_real_harga='{{ $item->harga_kamar }}',
                            new_ukuran_kamar='{{ $item->ukuran_kamar }}'">
                                <div class="item">
                                    <div class="icons">
                                        @if ($item->gambarKamar->isNotEmpty())
                                            <img src="{{ asset('uploads/' . $item->gambarKamar->random()->gambar) }}">
                                        @endif
                                    </div>
                                    <div class="value">
                                        Kamar No. {{ $item->nomor_kamar }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-item">
                <label for="p" class="form-label fw-medium">Harga Kamar Baru</label>
                <input type="text" class="form-control" disabled placeholder="Mohon pilih kamar dahulu!" x-model ="new_harga">
                <input type="hidden" name="harga_kamar_baru" placeholder="Mohon pilih kamar dahulu!" x-model ="new_real_harga">
            </div>
            <div class="form-item">
                <label for="i" class="form-label fw-medium">Ukuran Kamar</label>
                <input type="text" name="ukuran_kamar_baru" class="form-control" readonly placeholder="Mohon pilih kamar dahulu!" x-model="new_ukuran_kamar">
            </div>
            <div class="form-item" x-bind:class="{ 'd-block': new_kamar, 'd-none': !new_kamar }">
                <label for="tanggal" class="form-label fw-medium">Tanggal Pindah</label>
                <input type="date" name="tanggal_pindah" id="tanggal" class="form-control" x-model="tanggal_pindah">
            </div>
            <div class="form-item" x-bind:class="{ 'd-block': new_kamar, 'd-none': !new_kamar }">
                <label for="jam" class="form-label fw-medium">Jam Pindah</label>
                <input type="time" name="jam_pindah" class="form-control" x-model="jam_pindah">
            </div>
            {{-- <input type="hidden" name="waktu_pindah" x-model="waktu_pindah"> --}}
        </div>

        <div class="formulir last">
            <div class="form-item">
                {{-- <label for="alasan" class="form-label fw-medium"></label> --}}
                <label for="exampleFormControlTextarea1" class="form-label fw-medium">Alasan Pindah (Opsional)</label>
                <textarea class="form-control" name="alasan" id="exampleFormControlTextarea1" rows="5" placeholder="Tambahkan alasan kamu pindah..."></textarea>
            </div>
        </div>

        <div class="navbar sticky-bottom">
            <div class="isi">
                <button type="submit" class="fw-medium rounded-pill" disabled id="tombol">Kirim Pengajuan</button>
            </div>
        </div>
    </form>
    <script>
        var hariIni = new Date();

        var besok = new Date(hariIni);
        besok.setDate(besok.getDate() + 1);
        var besok_real = besok.toISOString().split('T')[0];

        document.getElementById("tanggal").setAttribute("min", besok_real);
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

@endsection
