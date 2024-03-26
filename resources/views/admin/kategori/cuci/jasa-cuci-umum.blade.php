@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
@section('title', 'Tambah Cuci Item')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/cuci.css') }}">

@section('container')
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
            <div class="d-block d-lg-none">
                <img src="{{ asset('package') }}/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
                <img src="{{ asset('package') }}/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
            </div>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="{{ asset('package') }}/dist/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" />
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid main">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Layanan Cuci</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Layanan Cuci
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('package') }}/dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom">
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Item Jasa Cuci Umum</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2 text-light tambah" data-bs-toggle="modal" data-bs-target="#add-item">
                                <i class="fa-solid fa-plus"></i>
                                <div class="te">Tambahkan Item</div>
                            </button>
                        </div>
                        @if ($cuciItems->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Data tidak di Temukan, Silahkan tambahkan Data
                                </div>
                            </div>
                        @else
                            <div class="mytable">
                                <div class="table-head">
                                    <div class="head-item">Nama Produk</div>
                                    <div class="head-item">Harga Produk</div>
                                    <div class="head-item">Jenis Layanan</div>
                                    <div class="head-item">Gambar Produk</div>
                                    <div class="head-item stat">Status</div>
                                    <div class="head-item last">Aksi</div>
                                </div>
                                <div class="table-body">
                                    @foreach ($cuciItems as $item)
                                        <div class="body-item" data-item-id="{{ $item->id }}">
                                            <div class="item name">
                                                {{ $item->nama_barang }}
                                            </div>
                                            <div class="item">
                                                {{ $item->harga_barang }}
                                            </div>
                                            <div class="item">
                                                {{ $item->jenis_layanan }}
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="imgs">
                                            </div>
                                            <div class="item stat @if ($item->status == 'Publish') published @else Unpublish @endif">
                                                <div class="pengisi">
                                                    {{ $item->status }}
                                                </div>
                                            </div>
                                            <div class="item last">
                                                <div class="delete-form">
                                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST" id="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn delete">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="toggle-see btn">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                                <button class="btn edit-btn" data-id="{{ $item->id }}" type="button" data-bs-toggle="modal" data-bs-target="#edit-data">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="pagination d-flex justify-content-center mt-3">
                            {{ $cuciItems->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-item" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Item Cuci
                    </h4>
                </div>
                <form action="{{ route('storeCuciUmum') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="items ps-2">
                            <div class="title pb-1">Nama Barang <span class="text-danger">*</span></div>
                            <input type="text" name="nama_barang" placeholder="Nama Barang . . ." class="form-control target">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Harga Barang <span class="text-danger">*</span></div>
                            <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control target">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Status Barang <span class="text-danger">*</span></div>
                            <div class="dropdown status" id="drop">
                                <input type="text" readonly class="form-control" id="isis" name="status" placeholder="Pilih Status . . ." required>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" onclick="its('Publish')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/view.png') }}">
                                            </div>
                                            <div class="value">
                                                Publish
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" onclick="its('Unpublish')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/hide.png') }}">
                                            </div>
                                            <div class="value">
                                                Unpublish
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Jenis Layanan <span class="text-danger">*</span></div>
                            <div class="dropdown layanan">
                                <input type="text" readonly class="form-control" id="isi" placeholder="Pilih Layanan . . ." name="jenis" required>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="modal()">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-item" onclick="item('Dry Cleaning')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/towels.png') }}">
                                            </div>
                                            <div class="value">
                                                Dry Cleaning
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Express')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Express
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Basah')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/wet.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Basah
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Kering')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Kering
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Lipat')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Lipat
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Setrika')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/setrika.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Setrika
                                            </div>
                                        </div>
                                    </li>

                                    <li class="is-item" onclick="item('Jasa Setrika')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/ironing.png') }}">
                                            </div>
                                            <div class="value">
                                                Jasa Setrika
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Gambar Barang <span class="text-danger">*</span></div>
                            <input type="file" name="gambar_barang" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div id="edit-data" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Item Cuci
                    </h4>
                </div>
                <form action="x" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="items ps-2">
                            <div class="title pb-1">Nama Barang <span class="text-danger">*</span></div>
                            <input type="text" name="nama_barang" placeholder="Nama Barang . . ." class="form-control target">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Harga Barang <span class="text-danger">*</span></div>
                            <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control target">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Status Barang <span class="text-danger">*</span></div>
                            <div class="dropdown status" id="drop">
                                <input type="text" readonly class="form-control" id="isis" name="status" placeholder="Pilih Status . . ." required>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" onclick="its('Publish')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/view.png') }}">
                                            </div>
                                            <div class="value">
                                                Publish
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" onclick="its('Unpublish')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/hide.png') }}">
                                            </div>
                                            <div class="value">
                                                Unpublish
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Jenis Layanan <span class="text-danger">*</span></div>
                            <div class="dropdown layanan">
                                <input type="text" readonly class="form-control" id="isi" placeholder="Pilih Layanan . . ." name="jenis" required>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="modal()">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-item" onclick="item('Dry Cleaning')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/towels.png') }}">
                                            </div>
                                            <div class="value">
                                                Dry Cleaning
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Express')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Express
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Basah')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/wet.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Basah
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Kering')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Kering
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Lipat')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Lipat
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="item('Cuci Setrika')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/setrika.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Setrika
                                            </div>
                                        </div>
                                    </li>

                                    <li class="is-item" onclick="item('Jasa Setrika')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/ironing.png') }}">
                                            </div>
                                            <div class="value">
                                                Jasa Setrika
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Gambar Barang <span class="text-danger">*</span></div>
                            <input type="file" name="gambar_barang" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var itemId = $(this).data('id');
                $.get('/items/' + itemId, function(data) {
                    $('#editItemId').val(data.id);
                    $('#editNamaBarang').val(data.nama_barang);
                    $('#editHargaBarang').val(data.harga_barang);
                    $('#editStatusBarang').val(data.status_barang);
                    // Tambahkan kode untuk menampilkan gambar barang jika perlu
                    $('#editModal').modal('show');
                });
            });

            // Submit form untuk menyimpan perubahan
            $('#editForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '/items/' + $('#editItemId').val(),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#editModal').modal('hide');
                        // Tambahkan kode untuk menampilkan notifikasi atau melakukan sesuatu setelah edit berhasil
                    },
                    error: function(xhr, status, error) {
                        // Tambahkan kode untuk menampilkan pesan error jika perlu
                    }
                });
            });
        });
    </script>

    <script>
        function item(itemName) {
            var inputElement = document.getElementById('isi');
            inputElement.setAttribute('value', itemName);
            modal();
        }

        function its(nims) {
            var ins = document.getElementById('isis');
            ins.setAttribute('value', nims);
        }

        document.querySelectorAll('.is-item').forEach(function(item) {
            item.addEventListener('click', close);
        });

        function close() {
            var modals = document.querySelector('.modal-body');
            modals.classList.remove('active');
        }

        function modal() {
            var btnyala = document.querySelector('.dropdown-toggle.show');
            var modals = document.querySelector('.modal-body');
            if (btnyala) {
                modals.classList.add('active');
            } else {
                modals.classList.remove('active');
            }
        }

        var tekt = document.querySelector('.small.text-muted');
        tekt.style.display = 'none';
    </script>
    <script>
        status = document.querySelectorAll('.stat').forEach(function(stat) {
            stat.addEventListener('DOMContentLoaded', function() {
                if (stat.innerText === "Unpublish") {
                    stat.classList.add('un');
                } else {
                    stat.classList.remove('un');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {

        });
    </script>
    <script>
        // Select all delete buttons and attach event listener to each of them
        document.querySelectorAll('.btn.delete').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var form = this.closest('form');

                // Display Sweet Alert for confirmation
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Item ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000 // Waktu penampilan Sweet Alert (dalam milidetik)
            });
        </script>
    @endif

    @if (Session::has('berhasil'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ Session::get('berhasil') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <script>
        function formatNumber() {
            // Get the input element
            var inputElement = document.getElementById("numberInput");

            // Get the current value of the input
            var value = inputElement.value;

            // Remove any existing dots
            value = value.replace(/\./g, '');

            // Add dots every three digits
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input value with the formatted number
            inputElement.value = value;
        }
    </script>

@endsection
