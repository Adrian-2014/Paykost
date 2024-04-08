@extends('layout.main')
@section('title', 'Proses Laundry')
<link rel="stylesheet" href="{{ asset('/css/user-css/kategori/cuci.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Proses Laundry
            </div>
        </div>
    </div>

    @if ($pemesanans->isEmpty())
        <div class="emptyPage" id="emptyPage">
            <img src="{{ asset('img/people.png') }}">
            <div class="the-teks">
                Tidak Ada Proses yang Sedang Berlangsung!
            </div>
        </div>
    @else
        @foreach ($pemesanans as $item)
            <div class="super-khusus-proses">
                <div class="proses">
                    <div class="bungkus">
                        <div class="item">
                            <div class="header">
                                <div class="status @if ($item->status == 'Proses Cuci') processing @endif">
                                    {{ $item->status }}
                                </div>
                                <div class="layanan">
                                    {{ $item->jenis_layanan }}
                                </div>
                            </div>
                            <div class="main-content">
                                <div class="main-item id">
                                    <div class="kiri">ID Transaksi</div>
                                    <div class="kanan">{{ $item->id_pembelian }}</div>
                                </div>
                                <div class="main-item">
                                    <div class="kiri">Tgl Laundry</div>
                                    <div class="kanan">{{ $item->tgl_start }}</div>
                                </div>
                                <div class="main-item done">
                                    <div class="kiri">Tgl Selesai</div>
                                    <div class="kanan tgl-done">{{ $item->tgl_done }}
                                        <form class="status-form d-none" action="{{ route('updateStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="update-status-btn">Update Status</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-item harga">
                                    <div class="kiri">Total Biaya</div>
                                    <div class="kanan">{{ $item->total_biaya }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="pembungkus">

    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/cuci" class="nav-link">
                    <i class='bx bxs-home'></i>
                    <div class="isi fw-normal">Utama</div>
                </a>
            </div>
            <div class="nav-item active">
                <a href="/proses" class="nav-link">
                    <i class='bx bxs-washer'></i>
                    <div class="isi fw-normal">Laundry</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/riwayatCuci" class="nav-link">
                    <i class='bx bx-history'></i>
                    <div class="isi fw-normal">
                        Riwayat
                    </div>
                </a>
            </div>
        </div>
    </nav>


    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('service-worker.js')
                .then(function(registration) {
                    console.log('Service worker registered:', registration);
                })
                .catch(function(error) {
                    console.log('Service worker registration failed:', error);
                });
        }
    </script>
    <script src="{{ asset('tanggal.js') }}"></script>
@endsection
