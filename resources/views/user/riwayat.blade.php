@extends('layout.main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="{{ asset('css/user-css/riwayat.css') }}">


@section('title', 'Home')

@section('container')

    <div class="filter">
        <button class="btns active">
            <div class="item pembayaran-btn">
                Pembayaran
            </div>
        </button>
        <button class="btns">
            <div class="item pindah-kamar">
                Pindah Kamar
            </div>
        </button>
        <button class="btns">
            <div class="item laporan-kehilangan">
                Laporan Kehilangan
            </div>
        </button>
        <button class="btns">
            <div class="item laporan-kerusakan">
                Laporan Kerusakan
            </div>
        </button>
    </div>

    {{-- onclick="getHistory('{{ $item->id }}')" --}}

    <div class="container-fluid riwayat">
        <div class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        @if ($riwayatPembayaran->isNotEmpty())
                            <div class="container for-pay">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPembayaran as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history-payment{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pembayaran Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->name }}, Pembayaran kamu telah Di Terima oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->name }}, Pembayaran kamu telah Di Tolak oleh Admin, Klik untuk info Selengkpanya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    {{ $item->id_pembayaran }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pembayaran Saat ini.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#riwayat-pindah{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Dipindahkan') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    @if ($item->status === 'Dipindahkan')
                                                        Permintaan Pindah Kost Disetujui!
                                                    @else
                                                        Permintaan Pindah Kost Ditolak
                                                    @endif
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Dipindahkan')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }},Permintaan pindah Kamu ke Kamar No. <span class="fw-bold">{{ $item->kamar_baru }} </span> Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->created_at->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Pindah Kamar.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pindah Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Laporan Kehilangan.
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="splide__slide">
                        @if ($riwayatPindah->isNotEmpty())
                            <div class="container for-pindah">
                                {{-- FOR RIWAYAT PEMBAYARAN --}}
                                @foreach ($riwayatPindah as $item)
                                    <div class="riwayat-item kost" data-bs-toggle="modal" data-bs-target="#history{{ $item->id }}">
                                        <div class="items">
                                            <div class="heading">
                                                <div class="logo">
                                                    <img src="{{ asset('img/logo.png') }}">
                                                </div>
                                                <div class="status @if ($item->status === 'Diterima') accept @else dismiss @endif">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-head">
                                                    Permintaan Pindah Kost {{ $item->status }}!
                                                </div>
                                                <div class="info-data">
                                                    @if ($item->status === 'Diterima')
                                                        Selamat {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Setujui oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @else
                                                        Mohon Maaf {{ $item->nama }}, Permintaan pindah Kamu ke Kamar No. {{ $item->kamar_baru }} telah Di Tolak oleh Admin. Klik Untuk Selengkapnya . . .
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date">
                                                <div class="id-pembayaran">
                                                    Kamar No. {{ $item->kamar_lama }}
                                                </div>
                                                <div class="center">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="tanggal-pembayaran">
                                                    {{ $item->notif->translatedFormat('j F Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- FOR RIWAYAT PWMBAYARAN END --}}
                        @else
                            <div class="container empties">
                                <div class="logo">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Yah,, kamu Tidak Memiliki Riwayat Laporan Kerusakan.
                                </div>
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade in" id="history" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div id="itemYear"></div>
                    <div id="itemTitle"></div>
                    <img id="itemImage" src="" alt="Item Image" style="max-width: 100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}

    @if ($riwayatPembayaran->isNotEmpty())
        @foreach ($riwayatPembayaran as $item)
            <div class="modal fade in riwayat-pembayaran" id="history-payment{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel">
                                <img src="{{ asset('img/two.png') }}">
                            </div>
                            <div class="id">
                                {{ $item->id_pembayaran }}
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="first">
                                <div class="suc">
                                    @if ($item->status === 'Diterima')
                                        <div class="mess">
                                            Pembayaran Berhasil!
                                        </div>
                                    @else
                                        <div class="merr">
                                            Pembayaran Gagal!
                                        </div>
                                    @endif
                                    <div class="tgl">
                                        {{ $item->created_at->translatedFormat('j F Y H:i:s') }}
                                    </div>
                                    <div class="pay">
                                        Rp. {{ $item->total_tagihan }}
                                    </div>
                                    <div class="stat">
                                        <div class="stat-item">
                                            <div class="head">
                                                Tanggal Masuk
                                            </div>
                                            <div class="value">
                                                {{ $item->tanggal_masuk }}
                                            </div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="head">
                                                Durasi Ngekost
                                            </div>
                                            <div class="value">
                                                {{ $item->durasi_ngekost }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sec">
                                <div class="info-list">
                                    <div class="info-item">
                                        <div class="inf">
                                            Nama User
                                        </div>
                                        <div class="value">
                                            {{ $item->nama }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            No. Kamar
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->no_kamar }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Bulan Tagihan
                                        </div>
                                        <div class="value">
                                            {{ $item->bulan_tagihan->translatedFormat('F Y') }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Total Tagihan
                                        </div>
                                        <div class="value">
                                            Rp. {{ $item->total_tagihan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="info-l">
                                    <div class="info-item">
                                        <div class="inf">
                                            Metode Bayar
                                        </div>
                                        <div class="value">
                                            @php
                                                $bank = \App\Models\Bank::where('id', $item->bank_id)->first();
                                            @endphp
                                            Transfer {{ $bank->nama }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Atas Nama
                                        </div>
                                        <div class="value">
                                            {{ $item->name }}
                                        </div>
                                    </div>
                                    <div class="bukti">
                                        <div class="inf">
                                            Bukti Pembayaran
                                        </div>
                                        <div class="value">
                                            <img src="{{ asset('uploads/' . $item->bukti) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if ($item->status === 'Ditolak')
                                <div class="third">
                                    <div class="message">
                                        Alasan Penolakan <span class="text-danger">*</span>
                                    </div>
                                    <div class="pesan">
                                        {{ $item->pesan }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="modal-footer">
                            <a href="javascript:void(0)" target="popup" onclick="window.open('/pdf','popup','width=600,height=600'); return false;" class="btn">Download</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    @if ($riwayatPindah->isNotEmpty())
        @foreach ($riwayatPindah as $item)
            <div class="modal fade in riwayat-pindah" id="riwayat-pindah{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel">
                                <img src="{{ asset('img/two.png') }}">
                            </div>
                            <div class="id">

                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="first">
                                <div class="suc">
                                    @if ($item->status === 'Dipindahkan')
                                        <div class="mess">
                                            Permintaan Disetujui!
                                        </div>
                                    @else
                                        <div class="merr">
                                            Permintaan Ditolak!
                                        </div>
                                    @endif
                                    <div class="tgl">
                                        {{ $item->created_at->translatedFormat('j F Y H:i:s') }}
                                    </div>
                                    <div class="pay">
                                        Kamar No. {{ $item->kamar_lama }}
                                    </div>
                                </div>
                            </div>
                            <div class="sec">
                                <div class="info-list">
                                    <div class="info-item">
                                        <div class="inf">
                                            Nama User
                                        </div>
                                        <div class="value">
                                            {{ $item->nama }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Kamar Lama
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->kamar_lama }}
                                        </div>
                                    </div>
                                </div>
                                <div class="info-l">
                                    <div class="info-item">
                                        <div class="inf">
                                            Kamar Baru
                                        </div>
                                        <div class="value">
                                            Kamar No. {{ $item->kamar_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Luas Kamar Baru
                                        </div>
                                        <div class="value">
                                            {{ $item->ukuran_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Harga Kamar Baru
                                        </div>
                                        <div class="value">
                                            Rp. {{ $item->harga_baru }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="inf">
                                            Waktu Pindah
                                        </div>
                                        <div class="value">
                                            {{ $item->waktu_pindah->translatedFormat('j F Y H:i') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if ($item->alasan)
                                <div class="alasan">
                                    <div class="heading">
                                        Alasan Pindah
                                    </div>
                                    <div class="item">
                                        {{ $item->alasan }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->status === 'Ditolak')
                                <div class="third">
                                    <div class="message">
                                        Alasan Penolakan <span class="text-danger">*</span>
                                    </div>
                                    <div class="pesan">
                                        {{ $item->respon }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="modal-footer">
                            <a href="javascript:void(0)" target="popup" onclick="window.open('/pdf','popup','width=600,height=600'); return false;" class="btn">Download</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/user/index" class="nav-link">
                    {{-- <i class="bi bi-house-fill"></i> --}}
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
            <div class="nav-item active">
                <a href="/user/riwayat" class="nav-link">
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

    <script>
        var splide = new Splide('.splide', {
            type: 'fade',
            // padding: '5rem',
            pagination: false,
            drag: false,
            arrows: false,
            perpage: 1,
        });

        splide.mount();


        const buttons = document.querySelectorAll('.btns');
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                splide.go(index);
            });
        });

        splide.on('moved', (newIndex) => {
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            buttons[newIndex].classList.add('active');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{--
    <script>
        function getHistory(transactionId) {
            $.ajax({
                url: '/transaction/getModal/' + transactionId,
                type: 'GET',
                success: function(response) {
                    // Handle success
                    console.log(response);
                    // $('#itemYear').text(item.year);
                    // $('#itemTitle').text(item.title);
                    // $('#itemImage').attr('src', 'upload/' + item.gambar);
                    $('#history').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log('test');
                    // Handle error
                }
            });
        }

        function closeModal() {
            $('#itemYear').text('');
            $('#itemTitle').text('');
            $('#history').modal('hide');
        }
    </script> --}}
@endsection


@push('scripts')
@endpush
