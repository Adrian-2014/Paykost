@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Jasa Cuci Sepatu')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/cuci-umum.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Cuci Sepatu</h4>
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
                            <div class="tableku table-responsive">
                                <table id="default_order" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="nama">
                                                <div class="th-item">
                                                    Nama
                                                </div>
                                            </th>
                                            <th class="harga">
                                                <div class="th-item">
                                                    Harga
                                                </div>
                                            </th>
                                            <th class="layanan">
                                                <div class="th-item">
                                                    Jenis Layanan
                                                </div>
                                            </th>
                                            <th class="img">
                                                <div class="th-item">
                                                    Gambar Produk
                                                </div>
                                            </th>
                                            <th class="status">
                                                <div class="th-item">
                                                    Status
                                                </div>
                                            </th>
                                            <th class="action">
                                                <div class="th-item">
                                                    Aksi
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuciItems as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item name">{{ $item->nama }}</div>
                                                </td>
                                                <td>
                                                    <div class="td-item">
                                                        <div class="item">
                                                            {{ $item->harga_barang }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item layanan">
                                                        <div class="item">
                                                            {{ $item->jenis_layanan }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item img">
                                                        <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="item img">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item status">
                                                        <div class="item stat @if ($item->status == 'Publish') published @else unpublish @endif">
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action">
                                                        <div class="toggle">
                                                            <form id="edit-form" name="edit-form" method="post">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" data-id={{ $item->id }} {{ $item->status == 'Publish' ? 'checked' : null }} />
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="delete-form">
                                                            <form action="{{ route('sepatu.destroy', $item->id) }}" method="POST" id="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn delete">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <button type="button" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#edit-data{{ $item->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </div>
                                                    <div id="edit-data{{ $item->id }}" class="modal fade in edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{ nama: '{{ $item->nama }}', status: '{{ $item->status }}', harga_barang: '{{ $item->harga_barang }}' }">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit Data Cuci
                                                                    </h4>
                                                                </div>
                                                                <form action="{{ route('cuciSepatuEdit') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                                        <input type="hidden" name="jenis" class="form-control target" value="{{ $item->jenis_layanan }}">
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Nama Layanan <span class="text-danger">*</span></div>
                                                                            <div class="dropdown layanan">
                                                                                <input type="text" readonly class="form-control edit-input" id="edit-layanan" placeholder="Pilih Layanan . . ." name="nama" required value="" x-model="nama">
                                                                                <button class="btn dropdown-toggle edi" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-item" x-on:click = "nama = 'Whitening'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/whitening.jpg') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Whitening
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" x-on:click = "nama = 'Fast Cleaning'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/fast-cleaning.jpeg') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Fast Cleaning
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" x-on:click = "nama = 'Deep Cleaning'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/deep-cleaning.jpeg') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Deep Cleaning
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-item" x-on:click = "nama = 'Repaint'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/repaint.jpg') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Repaint
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Harga Barang <span class="text-danger">*</span></div>
                                                                            <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="num" class="form-control target edit-input" value="" x-model="harga_barang">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Status Barang <span class="text-danger">*</span></div>
                                                                            <div class="dropdown status" id="drop">
                                                                                <input type="text" readonly class="form-control edit-input" id="edit-status" name="status" placeholder="Pilih Status . . ." required value="" x-model='status'>
                                                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-real" x-on:click ="status = 'Publish'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('img/view.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Publish
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-real" x-on:click ="status = 'Unpublish'">
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
                                                                        <div class="items ps-2 for-img">
                                                                            <div class="gmb">
                                                                                <div class="title pb-1">Gambar Barang <span class="text-danger">*</span></div>
                                                                                <input type="file" name="gambar_barang" id="gambar_barang" class="form-control editimg" value="{{ $item->gambar_barang }}" onchange="loadFile(event)">
                                                                            </div>
                                                                            <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="showimg" id="showimg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" id="edit-save" data-bs-dismiss="modal" :disabled="nama && harga_barang && status ? null : 'disabled'">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-item" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content" x-data= "{nama:'', status: '', harga_barang: '', gambar_barang: ''}">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Item Cuci
                    </h4>
                </div>
                <form action="{{ route('storeCuciSepatu') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body body-tambah">
                        @csrf
                        <input type="hidden" name="jenis" placeholder="Nama Barang . . ." class="form-control" value="Cuci Sepatu">
                        <div class="items ps-2">
                            <div class="title pb-1">Nama Layanan<span class="text-danger">*</span></div>
                            <div class="dropdown layanan">
                                <input type="text" readonly class="form-control add-input" id="add-layanan" placeholder="Nama Layanan . . ." name="nama" required x-model="nama">
                                <button class="btn dropdown-toggle add" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-item" x-on:click = "nama = 'Whitening'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/whitening.jpg') }}">
                                            </div>
                                            <div class="value">
                                                Whitening
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" x-on:click = "nama = 'Fast Cleaning'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/fast-cleaning.jpeg') }}">
                                            </div>
                                            <div class="value">
                                                Fast Cleaning
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" x-on:click = "nama = 'Deep Cleaning'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/deep-cleaning.jpeg') }}">
                                            </div>
                                            <div class="value">
                                                Deep Cleaning
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-item" x-on:click = "nama = 'Repaint'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/repaint.jpg') }}">
                                            </div>
                                            <div class="value">
                                                Repaint
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Harga Barang <span class="text-danger">*</span></div>
                            <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control add-input" x-model='harga_barang'>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Status Barang <span class="text-danger">*</span></div>
                            <div class="dropdown status" id="drop">
                                <input type="text" readonly class="form-control add-input" id="add-status" name="status" placeholder="Pilih Status . . ." required x-model='status'>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" x-on:click = "status = 'Publish'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/view.png') }}">
                                            </div>
                                            <div class="value">
                                                Publish
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" x-on:click = "status = 'Unpublish'">
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
                            <div class="title pb-1">Gambar Barang <span class="text-danger">*</span></div>
                            <input type="file" name="gambar_barang" class="form-control add-input" x-model="gambar_barang">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="nama && harga_barang && status && gambar_barang ? null : 'disabled'">
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
            curs();
        });

        document.addEventListener('click', function() {
            curs();
        });
        document.addEventListener('input', function() {
            curs();
        });

        function curs() {
            var prev = document.querySelector('.paginate_button.previous');
            var next = document.querySelector('.paginate_button.next');
            var length = document.querySelector('.dataTables_length label').innerHTML;
            prev.innerHTML = '<i class="bi bi-chevron-left"></i>';
            next.innerHTML = '<i class="bi bi-chevron-right"></i>';
            length.replace('Show', 'Menampilkan').replace('entries', 'Data');
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
    @if (Session::has('fail'))
        <script>
            Swal.fire({
                title: 'Gagal',
                text: '{{ Session::get('fail') }}',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000 // Waktu penampilan Sweet Alert (dalam milidetik)
            });
        </script>
    @endif
@endsection
