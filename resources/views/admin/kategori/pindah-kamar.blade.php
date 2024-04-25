@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Pindah Kamar')
<link rel="stylesheet" href="{{ asset('css/admin-css/pindah-kamar.css') }}">
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
                        <h4 class="fw-semibold mb-8"> Pengajuan Pindah Kamar</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Pengajuan Pinah Kamar
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Pindah Kamar Kost</h4>
                    </div>
                    <div class="card-body">
                        @if ($PengajuanPindah->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada user yang Mengajukan Pindah Kamar
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="zero_config" class="table">
                                    <thead>
                                        <tr>
                                            <th class="nama">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="kamar-old">
                                                <div class="th-item">
                                                    Kamar Lama
                                                </div>
                                            </th>
                                            <th class="kamar-new">
                                                <div class="th-item">
                                                    Kamar Baru
                                                </div>
                                            </th>
                                            <th class="t-pindah">
                                                <div class="th-item">
                                                    Tanggal Pindah
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
                                        @foreach ($PengajuanPindah as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('name', $item->nama)
                                                                        ->first();
                                                                @endphp
                                                                @if ($user)
                                                                    @if ($user->profil)
                                                                        <img src="{{ asset('uploads/' . $user->profil) }}">
                                                                    @else
                                                                        <img src="{{ asset('img/user.png') }}">
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="username">
                                                                {{ $item->nama }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item old-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->kamar_lama }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item new-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->kamar_baru }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item t-pindah">
                                                        <div class="item">
                                                            {{ $item->waktu_pindah->isoFormat('D MMMM Y') }}
                                                            {{-- {{ $item->created_at->isoFormat('D MMMM Y') }} --}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td x-data="{ check: false }">
                                                    <div class="td-item aksi">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#view{{ $item->id }}" x-on:click="check = true" x-bind:class="{ 'disabled': check === true }">
                                                            Lihat
                                                        </div>
                                                        <div class="for-tolak">
                                                            <button type="submit" class="no tolak" :disabled="check ? false : 'disabled'" data-id="{{ $item->nama }}">Tolak!</button>
                                                        </div>
                                                        <div class="for-setuju">
                                                            <form action="{{ route('setujuiPindah') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="hidden" name="kamar_baru" value="{{ $item->kamar_baru }}">
                                                                <button type="submit" class="yes setuju" :disabled="check ? false : 'disabled'">Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="penolakan{{ $item->nama }}" class="modal fade in penolakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Penolakan Pengajuan pindah Kamar {{ $item->nama }}
                                                                </div>
                                                                <form action="{{ route('tolakPindah') }}" x-data="{ alasan: '' }" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <label for="">Alasan Penolakan <span class="text-danger">*</span></label>
                                                                        <textarea name="respon" x-model="alasan" rows="10" placeholder="Sertakan alasan penolakan di sini . . ."></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn close" data-bs-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn submits" :disabled="alasan === ''">Kirim Penolakan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="view{{ $item->id }}" class="modal fade in lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="logo">
                                                                        <img src="{{ asset('img/two.png') }}">
                                                                    </div>
                                                                    <div class="pay">
                                                                        Data Pengajuan Pindah <span>{{ $item->nama }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            {{-- <div class="col-12">

                                                                            </div> --}}
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Nama User</label>
                                                                                <input type="text" readonly value="{{ $item->nama }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Kamar Lama</label>
                                                                                <input type="text" readonly value="Kamar No. {{ $item->kamar_lama }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Kamar Baru</label>
                                                                                <input type="text" readonly value="Kamar No. {{ $item->kamar_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Ukuran Kamar Baru</label>
                                                                                <input type="text" readonly value="{{ $item->ukuran_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Harga Kamar Baru</label>
                                                                                <input type="text" readonly value="{{ $item->harga_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Tanggal / Waktu Pindah</label>
                                                                                <input type="text" readonly value="{{ $item->waktu_pindah->isoFormat('D MMMM Y') }}" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                                                </div>
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
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom">
                        <h4 class="card-title mb-2 ps-2 pt-2">Riwayat Pengajuan Pindah Kamar</h4>
                    </div>
                    <div class="card-body">
                        @if ($riwayat->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Riwayat Pengajuan Pindah Kamar
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive riwayat">
                                <table id="zero_config" class="table">
                                    <thead>
                                        <tr>
                                            <th class="nama">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="kamar-old">
                                                <div class="th-item">
                                                    Kamar Lama
                                                </div>
                                            </th>
                                            <th class="kamar-new">
                                                <div class="th-item">
                                                    Kamar Baru
                                                </div>
                                            </th>
                                            <th class="t-pindah">
                                                <div class="th-item">
                                                    Tanggal Pindah
                                                </div>
                                            </th>
                                            <th class="t-pindah">
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
                                        @foreach ($riwayat as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('name', $item->nama)
                                                                        ->first();
                                                                @endphp
                                                                @if ($user)
                                                                    @if ($user->profil)
                                                                        <img src="{{ asset('uploads/' . $user->profil) }}">
                                                                    @else
                                                                        <img src="{{ asset('img/user.png') }}">
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="username">
                                                                {{ $item->nama }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item old-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->kamar_lama }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item new-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->kamar_baru }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item t-pindah">
                                                        <div class="item">
                                                            {{ $item->waktu_pindah->isoFormat('D MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item stat">
                                                        <div class="item @if ($item->status === 'Ditolak') ditolak  @elseif($item->status === 'Diterima') diterima @else dipindahkan @endif">
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td x-data="{ check: false }">
                                                    <div class="td-item aksi">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#view{{ $item->id }}" x-on:click="check = true" x-bind:class="{ 'disabled': check === true }">
                                                            Lihat
                                                        </div>
                                                    </div>
                                                    <div id="view{{ $item->id }}" class="modal fade in lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="logo">
                                                                        <img src="{{ asset('img/two.png') }}">
                                                                    </div>
                                                                    <div class="pay">
                                                                        Data Pengajuan Pindah <span>{{ $item->nama }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            {{-- <div class="col-12">

                                                                            </div> --}}
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Nama User</label>
                                                                                <input type="text" readonly value="{{ $item->nama }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Kamar Lama</label>
                                                                                <input type="text" readonly value="Kamar No. {{ $item->kamar_lama }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Kamar Baru</label>
                                                                                <input type="text" readonly value="Kamar No. {{ $item->kamar_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Ukuran Kamar Baru</label>
                                                                                <input type="text" readonly value="{{ $item->ukuran_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Harga Kamar Baru</label>
                                                                                <input type="text" readonly value="{{ $item->harga_baru }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="" class="px-1 pb-1 pt-3">Tanggal / Waktu Pindah</label>
                                                                                <input type="text" readonly value="{{ $item->waktu_pindah->translatedFormat('j F Y') }}" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                                                </div>
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
    <script src="{{ asset('package') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('package') }}/dist/js/datatable/datatable-basic.init.js"></script>


    @if ($PengajuanPindah->isNotEmpty())
        <script>
            document.querySelectorAll('.no.tolak').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    var itemName = button.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Tolak Pengajuan dari ' + itemName + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Tolak!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#penolakan' + itemName).modal('show');
                        }
                    });
                });
            });
        </script>

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
                var prev = document.querySelectorAll('.paginate_button.previous');
                var next = document.querySelectorAll('.paginate_button.next');

                next.forEach(function(item) {
                    item.innerHTML = '<i class="bi bi-chevron-right"></i>';
                });
                prev.forEach(function(item) {
                    item.innerHTML = '<i class="bi bi-chevron-left"></i>';
                });
            }
        </script>
    @endif

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
            var prev = document.querySelectorAll('.paginate_button.previous');
            var next = document.querySelectorAll('.paginate_button.next');

            next.forEach(function(item) {
                item.innerHTML = '<i class="bi bi-chevron-right"></i>';
            });
            prev.forEach(function(item) {
                item.innerHTML = '<i class="bi bi-chevron-left"></i>';
            });
        }
    </script>

    {{-- Sweet Alert --}}

    {{-- <script>
        document.querySelectorAll('.no.tolak').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Tolak Permintaan dari {{ $item->nama }} ?',
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
    </script> --}}
    <script>
        document.querySelectorAll('.yes.setuju').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var form = this.closest('form');
                // Display Sweet Alert for confirmation
                Swal.fire({
                    title: 'Setujui Permintaan?',
                    text: 'Baca data dengan teliti sebelum Menyetujui!',
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonColor: '#17A1FD',
                    confirmButtonText: 'Ya, Setujui!',
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
                timer: 3000
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
                timer: 3000
            });
        </script>
    @endif
@endsection
