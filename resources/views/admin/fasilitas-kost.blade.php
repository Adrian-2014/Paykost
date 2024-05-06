@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Admin Fasilitas')
<link rel="stylesheet" href="{{ asset('css/admin-css/fasilitas.css') }}">
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
                        <h4 class="fw-semibold mb-8">Fasilitas Kost</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Fasilitas Kost
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Fasilitas Kost</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2 text-light tambah" data-bs-toggle="modal" data-bs-target="#add-item">
                                <i class="fa-solid fa-plus"></i>
                                <div class="te">Tambahkan Fasilitas</div>
                            </button>
                        </div>
                        @if ($fasilitas->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Faslitas kost tidak di Temukan, Silahkan tambahkan Fasiliitas
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="gambar">
                                                <div class="th-item">
                                                    Gambar Fasilitas
                                                </div>
                                            </th>
                                            <th class="nama">
                                                <div class="th-item">
                                                    Nama Fasilitas
                                                </div>
                                            </th>
                                            <th class="jenis">
                                                <div class="th-item">
                                                    Jenis Fasilitas
                                                </div>
                                            </th>
                                            <th class="deskripsi">
                                                <div class="th-item">
                                                    Deskripsi Fasilitas
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
                                        @foreach ($fasilitas as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item img-banner">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                <img src="{{ asset('uploads/' . $item->gambar) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item nama">
                                                        <div class="item">
                                                            {{ $item->nama }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item jenis">
                                                        <div class="item">
                                                            {{ $item->tipe }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item deskripsi">
                                                        <div class="item">
                                                            <div class="des-item">
                                                                {{ $item->deskripsi }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action">
                                                        <div class="delete-form">
                                                            <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" id="delete-form">
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
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{ nama: '{{ $item->nama }}', jenis_fasilitas: '{{ $item->tipe }}', Deskripsi: '{{ $item->deskripsi }}' }">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit Data Fasilitas
                                                                    </h4>
                                                                </div>
                                                                <form action="{{ route('editFasilitas') }}" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <div class="preview">
                                                                            <img src="{{ asset('uploads/' . $item->gambar) }}" id="showimg-{{ $item->id }}">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                                            <div class="title pb-1">Gambar Fasilitas<span class="text-danger">*</span></div>
                                                                            <input type="file" name="gambar_fasilitas" class="form-control add-input" id="gambar_barang-{{ $item->id }}" onchange="loading(event, {{ $item->id }})">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Nama Fasilitas<span class="text-danger">*</span></div>
                                                                            <input type="text" name="nama_fasilitas" placeholder="Nama Fasilitas . . ." class="form-control add-input" x-model="nama">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Jenis Fasilitas<span class="text-danger">*</span></div>
                                                                            <div class="dropdown lokasi" id="drop">
                                                                                <input type="text" readonly class="form-control add-input" id="add-lokasi" name="jenis_fasilitas" placeholder="Jenis Fasilitas . . ." required x-model= 'jenis_fasilitas'>
                                                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-real" x-on:click = "jenis_fasilitas = 'Fasilitas Kamar'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/house.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Fasilitas Kamar
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-real" x-on:click = "jenis_fasilitas = 'Fasilitas Umum'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('gambar-kategori/washing-machine.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Fasilitas Umum
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Deskripsi<span class="text-danger">*</span></div>
                                                                            <input type="hidden" readonly id="specialDesk" name="deskripsi_fasilitas" placeholder="Jenis Fasilitas . . ." required x-model="Deskripsi">
                                                                            <textarea class="form-control add-input" rows="8" x-model="Deskripsi" onkeyup="move()" id="textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="nama && Deskripsi && jenis_fasilitas && gambar_fasilitas ? '\' : '
                                                                        disabled '">
                                                                            Simpan
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
            <div class="modal-content" x-data= "{gambar_fasilitas: '', jenis_fasilitas: '', Deskripsi: '', nama: ''}">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Fasilitas Kost
                    </h4>
                </div>
                <form action="{{ route('storeFasilitas') }}" method="POST" enctype="multipart/form-data" class="fors">
                    <div class="modal-body body-tambah">
                        @csrf
                        <div class="preview">
                            <img src="" id="showimg" class="d-none">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Gambar Fasilitas<span class="text-danger">*</span></div>
                            <input type="file" name="gambar_fasilitas" class="form-control add-input" id="gambar_add" onchange="loadFile(event)" x-model="gambar_fasilitas">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Nama Fasilitas<span class="text-danger">*</span></div>
                            <input type="text" name="nama_fasilitas" placeholder="Nama Fasilitas . . ." class="form-control add-input" x-model="nama">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Jenis Fasilitas<span class="text-danger">*</span></div>
                            <div class="dropdown lokasi" id="drop">
                                <input type="text" readonly class="form-control add-input" id="add-lokasi" name="jenis_fasilitas" placeholder="Jenis Fasilitas . . ." required x-model= 'jenis_fasilitas'>
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" x-on:click = "jenis_fasilitas = 'Fasilitas Kamar'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/house.png') }}">
                                            </div>
                                            <div class="value">
                                                Fasilitas Kamar
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" x-on:click = "jenis_fasilitas = 'Fasilitas Umum'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('gambar-kategori/washing-machine.png') }}">
                                            </div>
                                            <div class="value">
                                                Fasilitas Umum
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Deskripsi<span class="text-danger">*</span></div>
                            {{-- <input type="hidden" readonly id="specialDesk" name="deskripsi_fasilitas" placeholder="Jenis Fasilitas . . ." required x-model= 'jenis_fasilitas'> --}}
                            <textarea class="form-control add-input" name="deskripsi_fasilitas" rows="8" x-model="Deskripsi" onkeyup="move()" id="textarea"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="nama && Deskripsi && jenis_fasilitas && gambar_fasilitas ? null : 'disabled'">
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
        function move() {
            var target = document.querySelector('#specialDesk');
            var data = document.querySelector('#textarea');
            target.value = data.value

        }

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
    </script>

    <script>
        $(document).ready(function() {
            $('.form-check-input').click(function(event) {
                var switch_id = $(this).attr("switch_id");
                var myUrl = "/toggleFasilitas Kost/" + $(this).attr('data-id').replace(/\W/g, '-');
                window.location.href = myUrl;
            });
        });

        function loading(event, itemId) {
            var image = document.getElementById('showimg-' + itemId);
            image.src = URL.createObjectURL(event.target.files[0]);
            var modal = document.querySelector('.modal-body.body-tambah');
            modal.classList.add('active');
        }

        function loadFile(event) {
            var image = document.getElementById('showimg');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('d-none');
        }
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
