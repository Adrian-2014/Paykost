@extends('layout.main')
@section('title', 'pemesanan')
<link rel="stylesheet" href="{{ asset('css/user-css/kategori/pemesanan.css') }}">

@section('container')

    <div class="navbar sticky-top">
        <div class="container-fluid">
            <a href="/user/index" class="back">
                <i class="left" data-feather="chevron-left"></i>
            </a>
            <div class="info fw-medium">
                Layanan Cuci Basah
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row pesanan">
            <div class="col-12 pesanan-items">
                <div class="item item1">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/shirt.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Kaos
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 2000
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item1')">+</button>
                            <button onclick="kurang('item1')">-</button>
                        </div>
                    </div>
                </div>
                <div class="item item2">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/kemeja.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Kemeja
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 4000
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item2')">+</button>
                            <button onclick="kurang('item2')">-</button>
                        </div>
                    </div>
                </div>
                <div class="item item3">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/socks.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Kaos Kaki
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 1000
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item3')">+</button>
                            <button onclick="kurang('item3')">-</button>
                        </div>
                    </div>
                </div>
                <div class="item item4">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/pants.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Celana Panjang
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 2500
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item4')">+</button>
                            <button onclick="kurang('item4')">-</button>
                        </div>
                    </div>
                </div>
                <div class="item item5">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/shorts.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Celana Pendek
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 1000
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item5')">+</button>
                            <button onclick="kurang('item5')">-</button>
                        </div>
                    </div>
                </div>
                <div class="item item6">
                    <div class="image-item">
                        <img src="{{ asset('gambar-kategori/blanket.png') }}">
                    </div>
                    <div class="rincian-item">
                        <div class="nama-item fw-medium">
                            Sprei
                        </div>
                        <div class="detail-item">
                            <div class="harga fw-semibold">
                                Rp. 3500
                            </div>
                            <div class="per">
                                /pcs
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="nilai">
                            0
                        </div>
                        <div class="pm">
                            <button onclick="tambah('item6')">+</button>
                            <button onclick="kurang('item6')">-</button>
                        </div>
                    </div>
                </div>

                <div class="subtotal">
                </div>
                <div class="total">Total: Rp <span id="totalHarga">0</span></div>
            </div>
        </div>


        {{-- <script>
            // Function untuk memperbarui subtotal
            function updateSubtotal(item, nilai) {
                var itemDiv = document.querySelector('.' + item);
                if (nilai > 0) {
                    var imageSrc = itemDiv.querySelector('.image-item img').src;
                    var namaBarang = itemDiv.querySelector('.nama-item').textContent.trim();
                    var hargaBarang = itemDiv.querySelector('.harga').textContent.trim();
                    var perBarang = itemDiv.querySelector('.per').textContent.trim();

                    var subtotalDiv = document.querySelector('.subtotal');

                    // Cek apakah item sudah ada di subtotal
                    var existingItemDiv = subtotalDiv.querySelector('.' + item);
                    if (!existingItemDiv) {
                        // Buat elemen baru jika item belum ada di subtotal
                        var subtotalItemDiv = document.createElement('div');
                        subtotalItemDiv.classList.add('item', item);
                        subtotalItemDiv.innerHTML = `
                <div class="image-barang">
                    <img src="${imageSrc}">
                </div>
                <div class="rincian-barang">
                    <div class="nama-barang fw-medium">
                        ${namaBarang}
                    </div>
                    <div class="detail-barang">
                        <div class="harga fw-semibold">
                            ${hargaBarang}
                        </div>
                        <div class="per">
                            ${perBarang}
                        </div>
                    </div>
                </div>
                <div class="nilai">${nilai}</div>
            `;
                        subtotalDiv.appendChild(subtotalItemDiv);
                    } else {
                        // Perbarui nilai jika item sudah ada di subtotal
                        existingItemDiv.querySelector('.nilai').textContent = nilai;
                    }
                } else {
                    var subtotalItemDiv = document.querySelector('.subtotal .' + item);
                    if (subtotalItemDiv) {
                        subtotalItemDiv.remove();
                    }
                }

                // Update total harga setelah memperbarui subtotal
                hitungTotalHarga();
            }
        </script> --}}

        <script>
            function tambah(item) {
                var nilaiDiv = document.querySelector('.' + item + ' .nilai');
                var nilai = parseInt(nilaiDiv.textContent);
                nilaiDiv.textContent = nilai + 1;
                hitungTotalHarga();
            }

            function kurang(item) {
                var nilaiDiv = document.querySelector('.' + item + ' .nilai');
                var nilai = parseInt(nilaiDiv.textContent);
                if (nilai > 0) {
                    nilaiDiv.textContent = nilai - 1;
                    hitungTotalHarga();
                }
            }

            function hitungTotalHarga() {
                var totalHarga = 0;
                var items = document.querySelectorAll('.item');
                items.forEach(function(item) {
                    var hargaPerItem = parseInt(item.querySelector('.harga').textContent.split('. ')[1]); // Mengambil harga dari text dan mengubahnya menjadi angka
                    var nilai = parseInt(item.querySelector('.nilai').textContent);
                    totalHarga += hargaPerItem * nilai;
                });
                document.getElementById('totalHarga').textContent = totalHarga;
            }
        </script>

    @endsection
