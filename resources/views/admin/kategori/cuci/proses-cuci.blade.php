@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Admin Proses')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/proses.css') }}">
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
                        <h4 class="fw-semibold mb-8">Proses Laundry</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Proses Laundry
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Proses Laundry</h4>
                    </div>
                    <div class="card-body">

                        @if ($proses->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Layanan Cuci Yang sedang Di Proses
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="default_order" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="nama">
                                                <div class="th-item">
                                                    Nama User
                                                </div>
                                            </th>
                                            <th class="lokasi">
                                                <div class="th-item">
                                                    Jenis Layanan
                                                </div>
                                            </th>
                                            <th class="s">
                                                <div class="th-item">
                                                    Tanggal Laundry
                                                </div>
                                            </th>
                                            <th class="tgl">
                                                <div class="th-item">
                                                    Tanggal Selesai
                                                </div>
                                            </th>
                                            <th class="tgl">
                                                <div class="th-item">
                                                    Status
                                                </div>
                                            </th>
                                            <th class="tgl">
                                                <div class="th-item">
                                                    Aksi
                                                </div>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proses as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item">
                                                        <div class="item">
                                                            {{ $item->nama_user }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item">
                                                        <div class="item">
                                                            {{ $item->jenis_layanan }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item">
                                                        <div class="item">
                                                            {{ $item->tgl_start }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item">
                                                        <div class="item tgl-done">
                                                            {{ $item->tgl_done }}
                                                            <form class="status-form d-none" action="{{ route('updateStat') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="status" value="Selesai">
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <button type="submit" class="update-status-btn">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item status">
                                                        <div class="item stat @if ($item->status == 'Proses Pengambilan') pengambilan @else proses @endif">
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action">
                                                        <button type="button" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#edit-data{{ $item->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </div>
                                                    <div id="edit-data{{ $item->id }}" class="modal fade in edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{ tanggal_selesai: '{{ $item->tgl_done }}' }">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit Data Cuci
                                                                    </h4>
                                                                </div>
                                                                <form action="{{ route('editTanggal') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="items ps-2">
                                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                                            <div class="title pb-1">Tanggal Selesai <span class="text-danger">*</span></div>
                                                                            <input type="text" id="tgl_done" name="tanggal_selesai" placeholder="DD/MM/YYYY, SS:SS:SS" class="form-control target" value="" x-model="tanggal_selesai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal" :disabled="tanggal_selesai ? null : 'disabled'">
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

@endsection

@section('internal-script')

    <script>
        var targetElements = document.querySelectorAll('.tgl-done');

        function getWIBDateTime() {
            var now = new Date();
            var utcOffset = 7; // UTC offset untuk WIB adalah +7
            var localOffset = now.getTimezoneOffset() / 60; // Menghitung offset zona waktu lokal
            var wibOffset = utcOffset + localOffset; // Menghitung offset WIB
            var wibTime = new Date(now.getTime() + (wibOffset * 60 * 60 * 1000)); // Menambahkan offset untuk mendapatkan waktu WIB
            return wibTime;
        }

        targetElements.forEach(function(targetElement) {
            // Mendapatkan innerHTML dari elemen tersebut
            var tglDone = targetElement.innerHTML.trim();
            var addForm = targetElement.querySelector('.status-form');

            var parts = tglDone.split(/[\/, :]/);

            // Membuat objek tanggal JavaScript
            var tglDones = new Date(parts[2], parts[1] - 1, parts[0], parts[3], parts[4], parts[5]);

            console.log("Tanggal yang diambil dari elemen HTML:");
            console.log(tglDone); // Menampilkan tanggal dari elemen HTML

            console.log("Tanggal dan waktu saat ini di Waktu Indonesia Barat (WIB):");
            console.log(getWIBDateTime());

            // Fungsi yang ingin dijalankan jika tanggal dari elemen HTML melewati atau sama dengan WIB
            function myFunction() {
                if (addForm) {
                    addForm.submit();
                } else {
                    console.error("Form element not found!");
                }
            }

            // Memanggil fungsi untuk mengecek apakah tanggal dari elemen HTML telah melewati atau sama dengan WIB, dan menjalankan fungsi `myFunction` jika ya.
            if (tglDones <= getWIBDateTime()) {
                myFunction();
            }
        });
    </script>
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
            // var length = document.querySelector('.dataTables_length label').innerHTML;
            prev.innerHTML = '<i class="bi bi-chevron-left"></i>';
            next.innerHTML = '<i class="bi bi-chevron-right"></i>';
            // length.replace('Show', 'Menampilkan').replace('entries', 'Data');
        }
        document.querySelectorAll('.is-item').forEach(function(item) {
            item.addEventListener('click', close);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.form-check-input').click(function(event) {
                var switch_id = $(this).attr("switch_id");
                var myUrl = "/toggleKamar/" + $(this).attr('data-id').replace(/\W/g, '-');
                window.location.href = myUrl;
            });
        });

        function loading(event, itemId) {
            var image = document.getElementById('showimg-' + itemId);
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function loadFile(event) {
            var image = document.getElementById('showimg');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('d-none');
        }
    </script>
    <script>
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
