@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
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
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Jenis Layanan</th>
                                            <th>Gambar Produk</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuciItems as $item)
                                            <tr>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->harga_barang }}</td>
                                                <td>{{ $item->jenis_layanan }}</td>
                                                <td> <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="imgs"></td>
                                                <td>
                                                    <div class="item stat @if ($item->status == 'Publish') published @else Unpublish @endif">
                                                        <div class="pengisi">
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="delete-form">
                                                        <form action="{{ route('item.destroy', $item->id) }}" method="POST" id="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn delete">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="toggle">
                                                        <form id="edit-form" name="edit-form" method="post">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" data-id={{ $item->id }} {{ $item->status == 'Publish' ? 'checked' : null }} />
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <button type="button" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#edit-data{{ $item->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <div id="edit-data{{ $item->id }}" class="modal fade in edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit Data Cuci
                                                                    </h4>
                                                                </div>
                                                                <form action="{{ route('cuciUmumEdit') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="items ps-2">
                                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                                            <div class="title pb-1">Nama Barang <span class="text-danger">*</span></div>
                                                                            <input type="text" name="nama_barang" placeholder="Nama Barang . . ." class="form-control target" value="{{ $item->nama_barang }}">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Harga Barang <span class="text-danger">*</span></div>
                                                                            <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control target" value="{{ $item->harga_barang }}">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Status Barang <span class="text-danger">*</span></div>
                                                                            <div class="dropdown status" id="drop">
                                                                                <input type="text" readonly class="form-control" id="edit-status" name="status" placeholder="Pilih Status . . ." required value="{{ $item->status }}">
                                                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-real" onclick="editStatus('Publish')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('img/view.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Publish
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-real" onclick="editStatus('Unpublish')">
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
                                                                                <input type="text" readonly class="form-control" id="edit-layanan" placeholder="Pilih Layanan . . ." name="jenis" required value="{{ $item->jenis_layanan }}">
                                                                                <button class="btn dropdown-toggle edi" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="modal()">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-item" onclick="editLayanan('Dry Cleaning')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/towels.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Dry Cleaning
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" onclick="editLayanan('Cuci Express')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Cuci Express
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" onclick="editLayanan('Cuci Basah')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/wet.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Cuci Basah
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" onclick="editLayanan('Cuci Kering')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Cuci Kering
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" onclick="editLayanan('Cuci Lipat')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Cuci Lipat
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" onclick="editLayanan('Cuci Setrika')">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/setrika.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Cuci Setrika
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>

                                                                                    <li class="is-item" onclick="editLayanan('Jasa Setrika')">
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
                                                                        <div class="items ps-2 for-img">
                                                                            <div class="gmb">
                                                                                <div class="title pb-1">Gambar Barang <span class="text-danger">*</span></div>
                                                                                <input type="file" name="gambar_barang" class="form-control pic-mine" value="{{ $item->gambar_barang }}">
                                                                            </div>
                                                                            <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="showimg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal">
                                                                            Simpan Perubahan
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                    <div class="modal-body body-tambah">
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
                                <input type="text" readonly class="form-control" id="add-status" name="status" placeholder="Pilih Status . . ." required>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" onclick="addStatus('Publish')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/view.png') }}">
                                            </div>
                                            <div class="value">
                                                Publish
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" onclick="addStatus('Unpublish')">
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
                                <input type="text" readonly class="form-control" id="add-layanan" placeholder="Pilih Layanan . . ." name="jenis" required>
                                <button class="btn dropdown-toggle add" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="modal()">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-item" onclick="addLayanan('Dry Cleaning')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/towels.png') }}">
                                            </div>
                                            <div class="value">
                                                Dry Cleaning
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="addLayanan('Cuci Express')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Express
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="addLayanan('Cuci Basah')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/wet.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Basah
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="addLayanan('Cuci Kering')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Kering
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="addLayanan('Cuci Lipat')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Lipat
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" onclick="addLayanan('Cuci Setrika')">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/setrika.png') }}">
                                            </div>
                                            <div class="value">
                                                Cuci Setrika
                                            </div>
                                        </div>
                                    </li>

                                    <li class="is-item" onclick="addLayanan('Jasa Setrika')">
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

@endsection

@section('internal-script')
    <script src="{{ asset('package') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('package') }}/dist/js/datatable/datatable-basic.init.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the file input element
            var fileInput = document.querySelector('.pic-mine');

            var imagePreview = document.querySelector('.showimg');

            // Add event listener to the file input
            fileInput.addEventListener('change', function() {
                // Check if any file is selected
                if (fileInput.files && fileInput.files[0]) {
                    // Create a FileReader object
                    var reader = new FileReader();

                    // Set up the FileReader onload function
                    reader.onload = function(e) {
                        // Update the src attribute of the image with the selected file's data URL
                        imagePreview.src = e.target.result;
                    }

                    // Read the selected file as a data URL
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });

        function addLayanan(item) {
            var x = document.getElementById('add-layanan');
            x.setAttribute('value', item);
            modal();
        }

        function addStatus(item) {
            var x = document.getElementById('add-status');
            x.setAttribute('value', item);
        }

        function editStatus(item) {
            var x = document.getElementById('edit-status');
            x.setAttribute('value', item);
        }

        function editLayanan(item) {
            var x = document.getElementById('edit-layanan');
            x.setAttribute('value', item);
        }

        document.querySelectorAll('.is-item').forEach(function(item) {
            item.addEventListener('click', close);
        });

        function close() {
            var modals = document.querySelector('.body-tambah');
            modals.classList.remove('active');
        }

        function modal() {
            var btnyala = document.querySelector('.dropdown-toggle.edi.show');
            var btnadd = document.querySelector('.dropdown-toggle.add.show');
            var modals = document.querySelector('.body-tambah');
            if (btnyala || btnadd) {
                modals.classList.add('active');
            } else {
                modals.classList.remove('active');
            }
        }

        var tekt = document.querySelector('.small.text-muted');
        tekt.style.display = 'none';
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

    <script>
        $(document).ready(function() {
            $('.form-check-input').click(function(event) {
                var switch_id = $(this).attr("switch_id");
                var myUrl = "/toggleStatus/" + $(this).attr('data-id').replace(/\W/g, '-');
                window.location.href = myUrl;

            });
        });
    </script>
@endsection
