@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Admin Kamar')
<link rel="stylesheet" href="{{ asset('css/admin-css/kamar.css') }}">
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
                        <h4 class="fw-semibold mb-8">Kamar Kost</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Kamar Kost
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Kamar Kost</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2 text-light tambah" data-bs-toggle="modal" data-bs-target="#add-item">
                                <i class="fa-solid fa-plus"></i>
                                <div class="te">Tambahkan Kamar</div>
                            </button>
                        </div>
                        @if ($kosts->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Kamar Kost tidak di Temukan, Silahkan tambahkan Kamar
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="default_order" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="gambar">
                                                <div class="th-item">
                                                    Kamar
                                                </div>
                                            </th>
                                            <th class="nomor">
                                                <div class="th-item">
                                                    Nomor Kamar
                                                </div>
                                            </th>
                                            <th class="harga">
                                                <div class="th-item">
                                                    Harga Kamar
                                                </div>
                                            </th>
                                            <th class="status">
                                                <div class="th-item">
                                                    Status
                                                </div>
                                            </th>
                                            <th class="aksi">
                                                <div class="th-item">
                                                    Aksi
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kosts as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item img-Kamar">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                <img src="{{ asset('uploads/' . $item->gambar_kamar) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item nomor">
                                                        <div class="item">
                                                            Kamar No.
                                                            <span class="fw-bold"> {{ $item->nomor_kamar }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="td-item fasilitas">
                                                        @foreach ($item->kamarKostFasilitas as $kamar_kost_fasilitas)
                                                            <ul>
                                                                <li>{{ $loop->iteration }}. {{ $kamar_kost_fasilitas->fasilitas->nama }}</li>
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="td-item fasilitas">
                                                        <div class="item">
                                                            Rp. {{ $item->harga_kamar }}
                                                        </div>
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
                                                        <div class="target-modal" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </div>
                                                        <div class="delete-form">
                                                            {{-- action="{{ route('Kamar.destroy', $item->id) }}" --}}
                                                            <form method="POST" id="delete-form">
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

                                                    {{-- Detail Item --}}
                                                    <div id="detail{{ $item->id }}" class="modal fade in det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content" x-data= "{nomor_kamar: '', ukuran_kamar: '', gambar_kamar: '', harga_kamar: ''}">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Detail Kamar Kost
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container foto-kost">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <img src="{{ asset('uploads/' . $item->gambar_kamar) }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="container">
                                                                        <div class="row row-cols-2 row-cols-lg-2 g-1 g-lg-3">
                                                                            <div class="col">
                                                                                <div class="p-2">
                                                                                    <label class="px-1 py-1">No. Kamar</label>
                                                                                    <input type="text" disabled value="Kamar No. {{ $item->nomor_kamar }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="p-2">
                                                                                    <label class="px-1 py-1">Harga Kamar</label>
                                                                                    <input type="text" disabled value="Rp. {{ $item->harga_kamar }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="p-2">
                                                                                    <label class="px-1 py-1">Status Kamar</label>
                                                                                    <input type="text" disabled value= "{{ $item->status }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="col">
                                                                                <div class="p-2">
                                                                                    <label class="px-1 py-1">Kondisi Kamar</label>
                                                                                    <input type="text" disabled value="{{ $item->kondisi }}" class="form-control">
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="col">
                                                                                <div class="p-2">
                                                                                    <label class="px-1 py-1">Ukuran Kamar</label>
                                                                                    <input type="text" disabled value="{{ $item->ukuran_kamar }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="container fasilitas">
                                                                        <label>Fasilitas Kamar</label>
                                                                        <div class="for-fas">
                                                                            @foreach ($facilites as $facilite)
                                                                                @php
                                                                                    $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $item->id)
                                                                                        ->where('fasilitas_id', $facilite->id)
                                                                                        ->first();
                                                                                @endphp
                                                                                @if ($kamar_kost)
                                                                                    <div class="fas-item">
                                                                                        <div class="for-img">
                                                                                            <img src="{{ asset('img/' . $facilite->gambar) }}">
                                                                                        </div>
                                                                                        <div class="name">
                                                                                            {{ $facilite->nama }}
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                        Tutup
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                    </div>
                                                    {{-- Detail Item --}}

                                                    {{-- Edit Item --}}
                                                    <div id="edit-data{{ $item->id }}" class="modal fade in edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{ ukuran: '{{ $item->ukuran_kamar }}', nomor: '{{ $item->nomor_kamar }}', harga: '{{ number_format($item->harga_kamar) }}' }">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit Data Kamar Kost
                                                                    </h4>
                                                                </div>
                                                                <form method="POST" action="{{ route('editKamar') }}" enctype="multipart/form-data" class="fors">
                                                                    <div class="modal-body body-tambah">
                                                                        @csrf
                                                                        <div class="preview">
                                                                            <img src="{{ asset('uploads/' . $item->gambar_kamar) }}" id="showimg-{{ $item->id }}">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                                            <div class="title pb-1">Gambar Kamar<span class="text-danger">*</span></div>
                                                                            <input type="file" name="gambar_kamar" class="form-control add-input" id="gambar_barang-{{ $item->id }}" onchange="loading(event, {{ $item->id }})">
                                                                        </div>
                                                                        <div class="items ps-2 fasilitas">
                                                                            <div class="title pb-1">Ukuran Kamar<span class="text-danger">*</span></div>
                                                                            <input type="text" name="ukuran_kamar" class="form-control add-input" x-model="ukuran">
                                                                        </div>
                                                                        <div class="items ps-2 fasilitas">
                                                                            <div class="title pb-1">Nomor Kamar<span class="text-danger">*</span></div>
                                                                            <input type="text" name="nomor_kamar" class="form-control add-input" x-model="nomor">
                                                                        </div>
                                                                        <div class="items ps-2 fasilitas">
                                                                            <div class="title pb-1">Harga Kamar<span class="text-danger">*</span></div>
                                                                            <input type="text" name="harga_kamar" class="form-control add-input" x-model="harga">
                                                                        </div>
                                                                        <div class="items ps-2 fasilitas">
                                                                            <div class="title pb-1">Fasilitas Kamar<span class="text-danger">*</span></div>
                                                                            <input type="hidden" name="status" class="form-control add-input" x-model="status" value="kosong">
                                                                        </div>
                                                                        <div class="items ps-2 fasilitas">
                                                                            <div class="row">
                                                                                @foreach ($facilites as $facilite)
                                                                                    @php
                                                                                        $kamar_kost = \App\Models\KamarKostFasilitas::where('kamar_kost_id', $item->id)
                                                                                            ->where('fasilitas_id', $facilite->id)
                                                                                            ->first();
                                                                                    @endphp
                                                                                    <div class="col-4">
                                                                                        <div class="form-check mt-2">
                                                                                            <input class="form-check-input" type="checkbox" name="fasilitas[]" {{ $kamar_kost ? ($facilite->id == $kamar_kost->fasilitas_id ? 'checked' : null) : null }} value="{{ $facilite->id }}" id="fasilits-{{ $facilite->id }}" />
                                                                                            <label class="form-check-label" for="fasilits-{{ $facilite->id }}">
                                                                                                {{ $facilite->nama }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="ukuran && nomor && harga ? null : 'disabled'">
                                                                            Simpan Perubahn
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Edit Item --}}

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
            <div class="modal-content" x-data= "{nomor_kamar: '', ukuran_kamar: '', gambar_kamar: '', harga_kamar: ''}">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Kamar Kost
                    </h4>
                </div>
                <form action="{{ route('storeKamar') }}" method="POST" enctype="multipart/form-data" class="fors" style="overflow: auto; max-height: 500px;">
                    <div class="modal-body body-tambah">
                        @csrf
                        <div class="preview">
                            <img src="" id="showimg" class="d-none">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Gambar Kamar<span class="text-danger">*</span></div>
                            <input type="file" name="gambar_kamar" class="form-control add-input" id="gambar_add" onchange="loadFile(event)" x-model="gambar_kamar">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Ukuran Kamar<span class="text-danger">*</span></div>
                            <input type="text" name="ukuran_kamar" placeholder="Ukuran kamar . . ." class="form-control add-input" x-model="ukuran_kamar">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Nomor Kamar<span class="text-danger">*</span></div>
                            <input type="text" name="nomor_kamar" placeholder="No    kamar . . ." class="form-control add-input" x-model="nomor_kamar">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Harga Kamar<span class="text-danger">*</span></div>
                            <input type="text" name="harga_kamar" placeholder="Ukuran kamar . . ." class="form-control add-input" x-model="harga_kamar">
                        </div>
                        <div class="items ps-2 fasilitas">
                            <div class="title pb-1">Fasilitas Kamar</div>
                            <input type="hidden" name=" kondisi" class="form-control add-input" value="kosong">
                            <input type="hidden" name="" class="form-control add-input" value="Publish">
                        </div>
                        <div class="items ps-2 fasilitas">
                            <div class="row">
                                @foreach ($facilites as $facilite)
                                    <div class="col-4">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="fasilitas[]" x-model="fasilitas[]" value="{{ $facilite->id }}" id="fasilits-{{ $facilite->id }}" />
                                            <label class="form-check-label" for="fasilits-{{ $facilite->id }}">
                                                {{ $facilite->nama }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="gambar_kamar && ukuran_kamar && nomor_kamar && harga_kamar ? null : 'disabled'">
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
            modal();
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
