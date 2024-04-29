@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Laporan Kehilangan')
<link rel="stylesheet" href="{{ asset('css/admin-css/laporan-kehilangan.css') }}">
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
                        <h4 class="fw-semibold mb-8">Laporan Kehilangan</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Laporan Kehilangan
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Laporan Kehilangan</h4>
                    </div>
                    <div class="card-body">
                        @if ($lk->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada laporan Saat ini
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="user">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="no-kamar">
                                                <div class="th-item">
                                                    No. Kamar
                                                </div>
                                            </th>
                                            <th class="barang">
                                                <div class="th-item">
                                                    Barang Hilang
                                                </div>
                                            </th>
                                            <th class="waktu">
                                                <div class="th-item">
                                                    Waktu Kehilangan
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
                                        @foreach ($lk as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('id', $item->user_id)
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
                                                    <div class="td-item n-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->no_kamar }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item n-kamar">
                                                        <div class="item">
                                                            {{ $item->barang_hilang }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item waktu">
                                                        <div class="item">
                                                            {{ $item->waktu_kehilangan->translatedFormat('j F Y H:i') }} <span class="fs-2">WIB</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action" x-data="{ show: false }">
                                                        <button type="button" class="btn item" data-bs-toggle="modal" data-bs-target="#view{{ $item->id }}" x-on:click="show = true">
                                                            Lihat
                                                        </button>
                                                        <div class="respon">
                                                            <button type="button" class="btn response" data-bs-toggle="modal" data-bs-target="#respon{{ $item->id }}" :disabled="show === false">
                                                                Respon
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <div id="view{{ $item->id }}" class="modal fade in view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="logo">
                                                                    <img src="{{ asset('img/two.png') }}">
                                                                </div>
                                                                <div class="pay">
                                                                    Laporan Kehilangan dari {{ $item->nama }}
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="for-profil">
                                                                    @php
                                                                        $user = \App\Models\User::where('id', $item->user_id)->first();
                                                                    @endphp
                                                                    @if ($user)
                                                                        @if ($user->profil)
                                                                            <img src="{{ asset('uploads/' . $user->profil) }}">
                                                                        @else
                                                                            <img src="{{ asset('img/user.png') }}">
                                                                        @endif
                                                                    @endif
                                                                    <div class="name">
                                                                        <div class="n">
                                                                            {{ $item->nama }}
                                                                        </div>
                                                                        <i class="bi bi-dot"></i>
                                                                        <div class="k">
                                                                            Kamar No. {{ $item->no_kamar }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 pt-2">
                                                                        <label for="">Barang yang hilang</label>
                                                                        <input type="text" readonly value="{{ $item->barang_hilang }}" class="form-control">
                                                                    </div>
                                                                    <div class="col-6 pt-2">
                                                                        <label for="">Waktu Kehilangan</label>
                                                                        <input type="text" readonly value="{{ $item->waktu_kehilangan->translatedFormat('j F Y H:i') }} WIB" class="form-control">
                                                                    </div>
                                                                    <div class="col-12 pt-2">
                                                                        <label for="">keterangan</label>
                                                                        <textarea readonly value="" class="form-control" rows="5">{{ $item->keterangan }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="respon{{ $item->id }}" class="modal fade in respon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="logo">
                                                                    <img src="{{ asset('img/two.png') }}">
                                                                </div>
                                                                <div class="pay">
                                                                    Feedback Laporan {{ $item->nama }}
                                                                </div>
                                                            </div>
                                                            <form action="{{ route('respon.kehilangan') }}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                                                    {{-- <input type="hidden" name="user_id" value="{{ $item->id }}"> --}}
                                                                    <label for="">Berikan Respon untuk {{ $item->nama }} <span class="text-danger">*</span></label>
                                                                    <textarea name="respon" id="respons" rows="5"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" id="kirim" class="btn submit" disabled>Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Riwayat Laporan Kehilangan</h4>
                    </div>
                    <div class="card-body">
                        @if ($rk->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Riwayat laporan Saat ini
                                </div>
                            </div>
                        @else
                            <div class="riwayat table-responsive">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="user">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="no-kamar">
                                                <div class="th-item">
                                                    No. Kamar
                                                </div>
                                            </th>
                                            <th class="barang">
                                                <div class="th-item">
                                                    Barang Hilang
                                                </div>
                                            </th>
                                            <th class="waktu">
                                                <div class="th-item">
                                                    Waktu Kehilangan
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
                                        @foreach ($rk as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('id', $item->user_id)
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
                                                    <div class="td-item n-kamar">
                                                        <div class="item">
                                                            Kamar No. {{ $item->no_kamar }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item n-kamar">
                                                        <div class="item">
                                                            {{ $item->barang_hilang }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item waktu">
                                                        <div class="item">
                                                            {{ $item->waktu_kehilangan->translatedFormat('j F Y H:i') }} <span class="fs-2">WIB</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action" x-data="{ show: false }">
                                                        <button type="button" class="btn item" data-bs-toggle="modal" data-bs-target="#riwayat{{ $item->id }}" x-on:click="show = true">
                                                            Lihat
                                                        </button>
                                                    </div>
                                                </td>
                                                <div id="riwayat{{ $item->id }}" class="modal fade in view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="logo">
                                                                    <img src="{{ asset('img/two.png') }}">
                                                                </div>
                                                                <div class="pay">
                                                                    Laporan Kehilangan dari {{ $item->nama }}
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="for-profil">
                                                                    @php
                                                                        $user = \App\Models\User::where('id', $item->user_id)->first();
                                                                    @endphp
                                                                    @if ($user)
                                                                        @if ($user->profil)
                                                                            <img src="{{ asset('uploads/' . $user->profil) }}">
                                                                        @else
                                                                            <img src="{{ asset('img/user.png') }}">
                                                                        @endif
                                                                    @endif
                                                                    <div class="name">
                                                                        <div class="n">
                                                                            {{ $item->nama }}
                                                                        </div>
                                                                        <i class="bi bi-dot"></i>
                                                                        <div class="k">
                                                                            Kamar No. {{ $item->no_kamar }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 pt-2">
                                                                        <label for="">Barang yang hilang</label>
                                                                        <input type="text" readonly value="{{ $item->barang_hilang }}" class="form-control">
                                                                    </div>
                                                                    <div class="col-6 pt-2">
                                                                        <label for="">Waktu Kehilangan</label>
                                                                        <input type="text" readonly value="{{ $item->waktu_kehilangan->translatedFormat('j F Y H:i') }}" class="form-control">
                                                                    </div>
                                                                    <div class="col-12 pt-2">
                                                                        <label for="">keterangan</label>
                                                                        <textarea readonly value="" class="form-control" rows="5">{{ $item->keterangan }}</textarea>
                                                                    </div>
                                                                    <div class="col-12 pt-2 respon">
                                                                        <label for="">Respon</label>
                                                                        <textarea readonly value="" class="form-control" rows="5">{{ $item->respon }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

        document.addEventListener('keyup', function() {
            var text = document.getElementById('respons');
            var get = document.getElementById('kirim');

            if (text.value !== '') {
                get.removeAttribute('disabled');
            } else {
                get.setAttribute('disabled', 'disabled');
            }
        });
    </script>

    {{-- Sweet Alert --}}
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
