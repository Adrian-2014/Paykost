@extends('layout.main')
@section('title', 'rincian-pembyaran')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan/konfirmasi-pesan.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@trimbleinc/modus-bootstrap@1.6.3/dist/modus.min.css">
@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            {{-- <a href="/basah " class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a> --}}
            <div class="info fw-medium">
                Pembayaran
            </div>
        </div>
    </div>

    <div class="form">
        <form action="{{ route('proses') }}" method="POST" enctype="multipart/form-data" x-data = "{img: ''}">
            @csrf
            <div class="inform-umum">
                <div class="umum-item">
                    <div class="kiri">No. Transaksi</div>
                    <div class="kanan">{{ $pemesanan->id_pembelian }}</div>
                </div>
                <div class="umum-item">
                    <div class="kiri">Nama User</div>
                    <div class="kanan">{{ auth()->user()->name }}</div>
                </div>
                <div class="umum-item">
                    <div class="kiri">No. Kamar</div>
                    <div class="kanan">Kamar No. 5</div>
                </div>
                <div class="umum-item">
                    <div class="kiri">Layanan</div>
                    <div class="kanan">{{ $pemesanan->jenis_layanan }}</div>
                </div>
                <div class="umum-item">
                    <div class="kiri">Tanggal Laundry</div>
                    <div class="kanan" id="start">{{ $pemesanan->tgl_start }}</div>
                </div>
                <div class="umum-item special">
                    <div class="kiri">Tanggal Pengambilan</div>
                    <div class="kanan">{{ $pemesanan->tgl_done }}</div>
                </div>
                <div class="umum-item">
                    <div class="kiri">Jumlah Barang</div>
                    <div class="kanan">{{ $pemesanan->jumlah }} potong</div>
                </div>
            </div>
            <div class="inform-total">
                <div class="info">Total Biaya</div>
                <div class="value fw-medium">{{ $pemesanan->total_biaya }}</div>
            </div>
            <div class="inform-pay">
                <div class="media">
                    <div class="logo">
                        <img src="{{ asset('img/' . $bank->gambar) }}">
                    </div>
                    <div class="nama-bank">
                        {{ $bank->nama }}
                    </div>
                </div>
                <div class="message">Mohon transfer ke No. Rekening ini</div>
                <div class="rekening">
                    <div class="no-rek" id="no-rek">065722313040</div>
                    <div class="copy" onclick="salinTeks()">
                        <img src="{{ asset('img-chategories/copy.png') }}" class="ico">
                    </div>
                </div>
                <div class="atas-nama fw-medium d-flex">
                    <div class="a fw-bold">
                        A/N
                    </div>
                    <div class="n">ADRIAN</div>
                </div>
                <div class="bukti">
                    <div class="tekt-input">Sertakan Bukti <span class="text-danger">*</span></div>
                    <input type="file" id="inp" name="bukti_bayar" class="form-control" x-model="img">
                    {{-- <label for="inp"><i class="bi bi-folder2-open"></i></label> --}}
                </div>
            </div>


            <div class="kumpulan-button">
                <a href="/cuci" class="back">Halaman Utama</a>
                <input type="hidden" name="id" value="{{ $pemesanan->id_pembelian }}">
                <input type="hidden" name="nama" value="{{ $pemesanan->nama_user }}">
                <input type="hidden" name="no_kamar" value="{{ $pemesanan->no_kamar }}">
                <input type="hidden" name="layanan" value="{{ $pemesanan->jenis_layanan }}">
                <input type="hidden" name="tgl_start" value="{{ $pemesanan->tgl_start }}">
                <input type="hidden" name="tgl_done" value="{{ $pemesanan->tgl_done }}">
                <input type="hidden" name="jumlah" value="{{ $pemesanan->jumlah }}">
                <input type="hidden" name="status" value="Proses Pengambilan">
                <input type="hidden" name="total_biaya" value="{{ $pemesanan->total_biaya }}">
                <button type="submit" class="submit" :disabled="img ? null : 'disabled'">Konfirmasi Pembayaran</button>
            </div>
        </form>
    </div>
    <div class="alert">
        <div class="menyala">

        </div>
    </div>

    <div class="splide banner" role="group" aria-label="Splide Basic HTML Example" id="label">
        <div class="splide__track">
            <ul class="splide__list">
                @if ($bannerPro->isEmpty())
                    <li class="splide__slide">
                        <div class="empty-pro">
                            <div class="one">
                                <img src="{{ asset('img/page.png') }}">
                            </div>
                            <div class="two">
                                Banner Belum Ditambahkan !
                            </div>
                        </div>
                    </li>
                @else
                    @foreach ($bannerPro as $item)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/' . $item->gambar_banner) }}">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="container cuci-sepatu overflow-hidden text-center">
        <div class="heading">
            Jasa Cuci Sepatu
        </div>
        <div class="row">
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/fast-cleaning.jpeg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Fast Cleaning
                        </div>
                        <div class="desk">
                            Layanan pembersihan sepatu cepat
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">15.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/deep-cleaning.jpeg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Deep Cleaning
                        </div>
                        <div class="desk">
                            Pembersihan detail dan menyeluruh
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">22.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/repaint.jpg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Repaint
                        </div>
                        <div class="desk">
                            Perawatan restorasi warna sepatu
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">30.000</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="items">
                    <div class="s-gambar">
                        <img src="{{ asset('gambar-kategori/whitening.jpg') }}">
                    </div>
                    <div class="d-l">
                        <div class="nama-layanan fw-medium">
                            Whitening
                        </div>
                        <div class="desk">
                            Perawatan sepatu yang menguning
                        </div>
                    </div>
                    <div class="tombol-lihat">
                        <div class="rp">Rp.</div>
                        <div class="real-cost">25.000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var splide = new Splide('.splide', {
            perPage: 1,
            type: 'loop',
            pagination: false,
            // drag: false,
            autoplay: true,
            arrows: false,
            interval: 5000,
        });

        splide.mount();
    </script>

    <script>
        function salinTeks() {
            var elem = document.getElementById("no-rek");
            var button = document.querySelector(".copy");
            var ico = document.querySelector('.ico');
            var alert = document.querySelector('.alert');
            var menyala = document.querySelector('.menyala');

            var range = document.createRange();
            range.selectNode(elem);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();

            // button.classList.add('copied');
            ico.src = "{{ asset('img-chategories/copied.png') }}";
            ico.classList.add('co');
            menyala.classList.add('cops');
            var isCopy = document.createElement('div');
            isCopy.classList.add('content');
            iscops = elem.innerHTML;
            menyala.innerHTML = ` <div class="valuer">${iscops}</div>
            <div class="teks"> berhasil disalin </div>`;

            setTimeout(function() {
                // button.classList.remove('copied');
                ico.src = "{{ asset('img-chategories/copy.png') }}";
                ico.classList.remove('co');
                menyala.classList.remove('cops');

            }, 1500);

        }
    </script>

@endsection
