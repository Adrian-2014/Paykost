@extends('layout.main')
@section('title', 'Riwayat Laundry')
<link rel="stylesheet" href="{{ asset('/css/user-css/kategori/cuci.css') }}">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Riwayat Laundry
            </div>
        </div>
    </div>


    @if ($done->isEmpty())
        <div class="emptyPage" id="emptyPage">
            <img src="{{ asset('img/people.png') }}">
            <div class="the-teks">
                Tidak Ada Riwayat yang Tersedia
            </div>
        </div>
    @else
        @foreach ($done as $item)
            <div class="super-khusus-riwayat">
                <div class="riwayat">
                    <div class="bungkus">
                        <div class="item">
                            <div class="header">
                                <div class="status">
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
                                    <div class="kanan">{{ $item->tgl_done }}</div>
                                </div>
                                <div class="main-item harga">
                                    <div class="kiri">Total Biaya</div>
                                    <div class="kanan">{{ $item->total_biaya }}</div>
                                </div>
                            </div>
                            <div id="accordionFlushExample{{ $loop->index }}" class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="body-item">
                                                <div class="kiri">Nama User</div>
                                                <div class="kanan">{{ auth()->user()->name }}</div>
                                            </div>
                                            <div class="body-item">
                                                <div class="kiri">No Kamar</div>
                                                <div class="kanan">Kamar No. {{ $item->no_kamar }}</div>
                                            </div>
                                            <div class="body-item">
                                                <div class="kiri">Jumlah Item</div>
                                                <div class="kanan">{{ $item->jumlah }} Potong</div>
                                            </div>
                                            <div class="body-item special">
                                                <div class="img">
                                                    <img src="{{ asset('img/' . $bank->gambar) }}">
                                                </div>
                                                <div class="bank-name">
                                                    {{ $bank->nama }}
                                                </div>
                                            </div>
                                            <div class="body-item bukti">
                                                <div class="bukti-text">
                                                    Bukti Bayar
                                                </div>
                                                <div class="img-bukti">
                                                    <img src="{{ asset('uploads/' . $item->bukti) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapseOne" onclick="changeVal()">
                                            <div class="showMore">
                                                Tampilkan Lebih Banyak
                                            </div>
                                            <i class="bi bi-chevron-down" id="upDown"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <nav class="navbar fixed-bottom">
        <div class="container-fluid d-flex my-1 px-3">
            <div class="nav-item">
                <a href="/cuci" class="nav-link">
                    <i class='bx bxs-home'></i>
                    <div class="isi fw-normal">Utama</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="/proses" class="nav-link">
                    <i class='bx bxs-washer'></i>
                    <div class="isi fw-normal">Laundry</div>
                </a>
            </div>
            <div class="nav-item active">
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
        function changeVal() {
            var text = document.querySelector('.showMore');
            var chevron = document.querySelector('#upDown');
            var button = document.querySelector('.accordion-button.collapsed');

            if (!button) {
                text.innerHTML = 'Tampilkan Lebih Sedikit';
                chevron.classList.add('up');
            } else {
                text.innerHTML = 'Tampilkan Lebih Banyak';
                chevron.classList.remove('up');
            }
        }
    </script>
    {{--
    <script>
        function changeVal() {
            var buttons = document.querySelectorAll('.accordion-button');

            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var text = button.querySelector('.showMore');
                    var chevron = button.querySelector('.bi');
                    var collapse = button.getAttribute('data-bs-target');
                    var isCollapsed = document.querySelector(collapse).classList.contains('collapsed');

                    if (!isCollapsed) {
                        text.innerHTML = 'Tampilkan Lebih Sedikit';
                        chevron.classList.add('up');
                    } else {
                        text.innerHTML = 'Tampilkan Lebih Banyak';
                        chevron.classList.remove('up');
                    }
                });
            });
        }

        // Panggil fungsi untuk mengatur event listener pada setiap tombol dropdown
        changeVal();
    </script> --}}

@endsection
