@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Admin User')
<link rel="stylesheet" href="{{ asset('css/admin-css/user.css') }}">
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
                        <h4 class="fw-semibold mb-8">User</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    User
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data User</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2 text-light tambah" data-bs-toggle="modal" data-bs-target="#add-item">
                                <i class="fa-solid fa-plus"></i>
                                <div class="te">Tambahkan User</div>
                            </button>
                        </div>
                        @if ($user->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    User tidak di Temukan, Silahkan tambahkan User
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive">
                                <table id="default_order" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="user">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="lokasi">
                                                <div class="th-item">
                                                    Email
                                                </div>
                                            </th>
                                            <th class="jenis">
                                                <div class="th-item">
                                                    No Kamar
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
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="profil">
                                                            @if (is_null($item->profil) || empty($item->profil))
                                                                <img src="{{ asset('img/user.png') }}">
                                                            @else
                                                                <img src="{{ asset('uploads/' . $item->profil) }}">
                                                            @endif
                                                        </div>
                                                        <div class="nama">
                                                            {{ $item->name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item lokasi">
                                                        <div class="item">
                                                            {{ $item->email }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item jenis">
                                                        <div class="item">
                                                            Kamar No. {{ $item->no_kamar }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item status">
                                                        <div class="item stat @if ($item->status == 'Aktif') aktif @else nonaktif @endif">
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action">
                                                        <div class="toggle">
                                                            <form id="edit-form" name="edit-form" method="post">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" data-id={{ $item->id }} {{ $item->status == 'Aktif' ? 'checked' : null }} />
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="target-modal detail-btn" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </div>
                                                        <button type="button" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#edit-data{{ $item->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </div>
                                                    <div id="detail{{ $item->id }}" class="modal fade in det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Detail User
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="item for-profil-img">
                                                                        <div class="myImg">
                                                                            @if (is_null($item->profil) || empty($item->profil))
                                                                                <img src="{{ asset('img/user.png') }}">
                                                                            @else
                                                                                <img src="{{ asset('uploads/' . $item->profil) }}">
                                                                            @endif
                                                                        </div>
                                                                        <div class="name">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row for-common">
                                                                        <div class="col-6 mt-2">
                                                                            <label class="px-1">Nama User</label>
                                                                            <input type="text" disabled value="{{ $item->name }}" class="form-control">
                                                                        </div>
                                                                        <div class="col-6 mt-2">
                                                                            <label class="px-1">No. Kamar</label>
                                                                            <input type="text" disabled value="Kamar No. {{ $item->no_kamar }}" class="form-control">
                                                                        </div>
                                                                        <div class="col-6 mt-2">
                                                                            <label class="px-1">Tanggal Masuk</label>
                                                                            <input type="text" disabled value="{{ $item->tanggalMasukFormatted }}" class="form-control">
                                                                        </div>
                                                                        <div class="col-6 mt-2">
                                                                            <label class="px-1">Durasi Ngekost</label>
                                                                            <input type="text" disabled value="{{ $item->durasiNgekostFormatted }}" class="form-control">
                                                                        </div>
                                                                        <div class="col-6 mt-2">
                                                                            <label class="px-1">Jenis Kelamin</label>
                                                                            <input type="text" disabled value="{{ $item->jenis_kelamin }}" class="form-control">
                                                                        </div>
                                                                        <div class="col-6 mt-2 status">
                                                                            <label class="px-1">Status Bayar</label>
                                                                            <input type="text" disabled value="{{ $item->status_bayar }}" class="form-control @if ($item->status_bayar === 'Sudah Lunas') lunas @elseif($item->status_bayar === 'Proses Validasi') proses @else not-lun @endif">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                        Tutup
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="edit-data{{ $item->id }}" class="modal-edit modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{
                                                            nama: '{{ $item->name }}',
                                                            email: '{{ $item->email }}',
                                                            {{-- password: '', --}}
                                                            tanggal_masuk: '{{ $item->tanggal_masuk }}',
                                                            no_kamar: '{{ $item->no_kamar }}',
                                                            jenis_kelamin: '{{ $item->jenis_kelamin }}',
                                                            pekerjaan: '{{ $item->pekerjaan }}',
                                                            no_telpon: '{{ $item->no_telpon }}'
                                                        }">
                                                            <div class="modal-content">
                                                                <div class="modal-header d-flex align-items-center">
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Edit User
                                                                    </h4>
                                                                </div>
                                                                <form action="{{ route('update.user') }}" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body body-tambah">
                                                                        @csrf
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Nama User<span class="text-danger">*</span></div>
                                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                                            <input type="text" name="nama" placeholder="Nama user . . ." class="form-control target" x-model="nama">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Email<span class="text-danger">*</span></div>
                                                                            <input type="email" name="email" placeholder="Email . . ." class="form-control target" x-model="email">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Tanggal Masuk<span class="text-danger">*</span></div>
                                                                            <input type="date" name="tanggal_masuk" placeholder="tanggal_masuk . . ." class="form-control target" x-model="tanggal_masuk">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">No Kamar<span class="text-danger">*</span></div>
                                                                            <div class="dropdown status" id="drop">
                                                                                <input type="text" readonly class="form-control" id="add-status" name="no_kamar" placeholder="No Kamar . . ." required x-model="no_kamar">
                                                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    @foreach ($kamars as $item)
                                                                                        <li class="is-real" x-on:click="no_kamar = '{{ $item->nomor_kamar }}'">
                                                                                            <div class="item">
                                                                                                <div class="icons">
                                                                                                    @if ($item->gambarKamar->isNotEmpty())
                                                                                                        <img src="{{ asset('uploads/' . $item->gambarKamar->first()->gambar) }}">
                                                                                                    @endif
                                                                                                </div>
                                                                                                <div class="value">
                                                                                                    Kamar No. {{ $item->nomor_kamar }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Jenis Kelamin<span class="text-danger">*</span></div>
                                                                            <div class="dropdown jeniskelamin" id="drop">
                                                                                <input type="text" readonly class="form-control" id="add-jenis-kelamin" name="jenis_kelamin" placeholder="Pilih jenis kelamin . . ." required x-model="jenis_kelamin">
                                                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="fa-solid fa-caret-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li class="is-real" x-on:click="jenis_kelamin = 'Laki Laki'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('img/male.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Laki Laki
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="is-real" x-on:click="jenis_kelamin = 'Perempuan'">
                                                                                        <div class="item">
                                                                                            <div class="icons">
                                                                                                <img src="{{ asset('img/female.png') }}">
                                                                                            </div>
                                                                                            <div class="value">
                                                                                                Perempuan
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">No Telephone<span class="text-danger">*</span></div>
                                                                            <input type="text" name="no_telpon" placeholder="No Telepone . . ." class="form-control target" x-model="no_telpon">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <div class="title pb-1">Pekerjaan<span class="text-danger">*</span></div>
                                                                            <input type="text" name="pekerjaan" placeholder="Pekerjaan . . ." class="form-control target" x-model="pekerjaan">
                                                                        </div>
                                                                        <div class="items ps-2">
                                                                            <input type="hidden" name="status" class="form-control target" value="Aktif">
                                                                            <input type="hidden" name="role_id" class="form-control target" value="2">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="nama && email && tanggal_masuk && no_kamar && jenis_kelamin && pekerjaan && no_telpon ? null : 'disabled'">
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

            <div class="col-12">
                <div class="card">
                    <div class="border-bottom">
                        <h4 class="card-title mb-2 ps-2 pt-2">Pengajuan Ganti Akun</h4>
                    </div>
                    <div class="card-body">
                        @if ($request->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Permintaan saat ini
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive pengajuan">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="user">
                                                <div class="th-item">
                                                    User
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
                                        @foreach ($request as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="for-first">
                                                            <div class="profil">
                                                                @if (is_null($item->profil) || empty($item->profil))
                                                                    <img src="{{ asset('img/user.png') }}">
                                                                @else
                                                                    <img src="{{ asset('uploads/' . $item->profil) }}">
                                                                @endif
                                                            </div>
                                                            <div class="nama">
                                                                {{ $item->nama }}
                                                            </div>
                                                        </div>
                                                        <div class="for-sec">
                                                            <div class="email">
                                                                {{ $item->email_old }}
                                                            </div>
                                                        </div>
                                                        <div class="for-third">
                                                            <div class="kamar">
                                                                Kamar No. {{ $item->no_kamar }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action" x-data="{ check: false }">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#pengajuan{{ $item->id }}" x-on:click="check = true" x-bind:class="{ 'disabled': check === true }">
                                                            Lihat
                                                        </div>
                                                        <div class="for-tolak">
                                                            <button type="submit" class="no tolak" :disabled="check ? false : 'disabled'" data-id="{{ $item->id }}" data-name="{{ $item->nama }}">Tolak!</button>
                                                        </div>
                                                        <div class="for-setuju">
                                                            <form action="{{ route('setuju.account') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="hidden" name="new_email" value="{{ $item->email_new }}">
                                                                <button type="submit" class="yes setuju" :disabled="check ? false : 'disabled'">Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div id="penolakan{{ $item->id }}" class="modal fade in penolakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Penolakan Pengajuan {{ $item->nama }}
                                                                </div>
                                                                <form action="{{ route('tolak.account') }}" x-data="{ alasan: '' }" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <label for="">Alasan Penolakan <span class="text-danger">*</span></label>
                                                                        <textarea name="alasan" x-model="alasan" rows="10" placeholder="Sertakan alasan penolakan di sini . . ."></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn close" data-bs-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn submits" :disabled="alasan === ''">Kirim Penolakan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="pengajuan{{ $item->id }}" class="modal fade in pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="item for-profil-img">
                                                                        <div class="myImg">
                                                                            @if (is_null($item->profil) || empty($item->profil))
                                                                                <img src="{{ asset('img/user.png') }}">
                                                                            @else
                                                                                <img src="{{ asset('uploads/' . $item->profil) }}">
                                                                            @endif
                                                                        </div>
                                                                        <div class="name">
                                                                            {{ $item->nama }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        @if ($item->email_new)
                                                                            <div class="col-12">
                                                                                <label for="">Email Baru</label>
                                                                                <input type="text" readonly value="{{ $item->email_new }}" class="form-control">
                                                                            </div>
                                                                        @endif
                                                                        @if ($item->password_new)
                                                                            <div class="col-12">
                                                                                <label for="">Password Baru</label>
                                                                                <input type="text" readonly value="{{ $item->password_new }}" class="form-control">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                        Tutup
                                                                    </button>
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Riwayat Pengajuan</h4>
                    </div>
                    <div class="card-body">
                        @if ($riwayat->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Riwayat saat ini
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive pengajuan">
                                <table id="zero_config" class="table border table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="user">
                                                <div class="th-item">
                                                    User
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
                                                        <div class="for-first">
                                                            <div class="profil">
                                                                @if (is_null($item->profil) || empty($item->profil))
                                                                    <img src="{{ asset('img/user.png') }}">
                                                                @else
                                                                    <img src="{{ asset('uploads/' . $item->profil) }}">
                                                                @endif
                                                            </div>
                                                            <div class="nama">
                                                                {{ $item->nama }}
                                                            </div>
                                                        </div>
                                                        <div class="for-sec">
                                                            <div class="email">
                                                                {{ $item->email_old }}
                                                            </div>
                                                        </div>
                                                        <div class="for-third">
                                                            <div class="kamar">
                                                                Kamar No. {{ $item->no_kamar }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item action" x-data="{ check: false }">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#pengajuan{{ $item->id }}" x-on:click="check = true" x-bind:class="{ 'disabled': check === true }">
                                                            Lihat
                                                        </div>
                                                        <div class="for-tolak">
                                                            <button type="submit" class="no tolak" :disabled="check ? false : 'disabled'" data-id="{{ $item->id }}" data-name="{{ $item->nama }}">Tolak!</button>
                                                        </div>
                                                        <div class="for-setuju">
                                                            <form action="{{ route('SETUJU') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="hidden" name="new_email" value="{{ $item->email_new }}">
                                                                <button type="submit" class="yes setuju" :disabled="check ? false : 'disabled'">Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div id="penolakan{{ $item->id }}" class="modal fade in penolakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Penolakan Pengajuan {{ $item->nama }}
                                                                </div>
                                                                <form action="{{ route('tolak.account') }}" x-data="{ alasan: '' }" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <label for="">Alasan Penolakan <span class="text-danger">*</span></label>
                                                                        <textarea name="alasan" x-model="alasan" rows="10" placeholder="Sertakan alasan penolakan di sini . . ."></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn close" data-bs-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn submits" :disabled="alasan === ''">Kirim Penolakan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="pengajuan{{ $item->id }}" class="modal fade in pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="item for-profil-img">
                                                                        <div class="myImg">
                                                                            @if (is_null($item->profil) || empty($item->profil))
                                                                                <img src="{{ asset('img/user.png') }}">
                                                                            @else
                                                                                <img src="{{ asset('uploads/' . $item->profil) }}">
                                                                            @endif
                                                                        </div>
                                                                        <div class="name">
                                                                            {{ $item->nama }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        @if ($item->email_new)
                                                                            <div class="col-12">
                                                                                <label for="">Email Baru</label>
                                                                                <input type="text" readonly value="{{ $item->email_new }}" class="form-control">
                                                                            </div>
                                                                        @endif
                                                                        @if ($item->password_new)
                                                                            <div class="col-12">
                                                                                <label for="">Password Baru</label>
                                                                                <input type="text" readonly value="{{ $item->password_new }}" class="form-control">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                                                                        Tutup
                                                                    </button>
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

    <div id="add-item" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" x-data="{
            nama: '',
            email: '',
            password: '',
            tanggal_masuk: '',
            no_kamar: '',
            jenis_kelamin: '',
            pekerjaan: '',
            no_telpon: ''
        }">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan User
                    </h4>
                </div>
                <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body body-tambah">
                        @csrf
                        <div class="items ps-2">
                            <div class="title pb-1">Nama User<span class="text-danger">*</span></div>
                            <input type="text" name="nama" placeholder="Nama user . . ." class="form-control target" x-model="nama" maxlength="20">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Email<span class="text-danger">*</span></div>
                            <input type="email" name="email" placeholder="Email . . ." class="form-control target" x-model="email">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Password<span class="text-danger">*</span></div>
                            <input type="text" name="password" placeholder="Password . . ." class="form-control target" x-model="password" min="4">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Tanggal Masuk<span class="text-danger">*</span></div>
                            <input type="date" name="tanggal_masuk" placeholder="tanggal_masuk . . ." class="form-control target" x-model="tanggal_masuk">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">No Kamar<span class="text-danger">*</span></div>
                            <div class="dropdown status" id="drop">
                                <input type="text" readonly class="form-control" id="add-status" name="no_kamar" placeholder="No Kamar . . ." required x-model="no_kamar">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($kamars as $item)
                                        <li class="is-real" x-on:click="no_kamar = '{{ $item->nomor_kamar }}'">
                                            <div class="item">
                                                <div class="icons">
                                                    @if ($item->gambarKamar->isNotEmpty())
                                                        <img src="{{ asset('uploads/' . $item->gambarKamar->first()->gambar) }}">
                                                    @endif
                                                </div>
                                                <div class="value">
                                                    Kamar No. {{ $item->nomor_kamar }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Jenis Kelamin<span class="text-danger">*</span></div>
                            <div class="dropdown jeniskelamin" id="drop">
                                <input type="text" readonly class="form-control" id="add-jenis-kelamin" name="jenis_kelamin" placeholder="Pilih jenis kelamin . . ." required x-model="jenis_kelamin">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="is-real" x-on:click="jenis_kelamin = 'Laki Laki'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/male.png') }}">
                                            </div>
                                            <div class="value">
                                                Laki Laki
                                            </div>
                                        </div>
                                    </li>
                                    <li class="is-real" x-on:click="jenis_kelamin = 'Perempuan'">
                                        <div class="item">
                                            <div class="icons">
                                                <img src="{{ asset('img/female.png') }}">
                                            </div>
                                            <div class="value">
                                                Perempuan
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">No Telephone<span class="text-danger">*</span></div>
                            <input type="text" name="no_telpon" placeholder="No Telepone . . ." inputmode="numeric" class="form-control target" x-model="no_telpon">
                        </div>
                        <div class="items ps-2">
                            <div class="title pb-1">Pekerjaan<span class="text-danger">*</span></div>
                            <input type="text" name="pekerjaan" placeholder="Pekerjaan . . ." class="form-control target" x-model="pekerjaan">
                        </div>
                        <div class="items ps-2">
                            <input type="hidden" name="status" class="form-control target" value="Aktif">
                            <input type="hidden" name="role_id" class="form-control target" value="2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" id="add-save" data-bs-dismiss="modal" :disabled="nama && email && tanggal_masuk && no_kamar && jenis_kelamin && pekerjaan && no_telpon && (password.length < 4)">
                            Tambahkan
                        </button>
                    </div>
                </form>
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
    </script>

    @if ($request->isNotEmpty())
        <script>
            document.querySelectorAll('.no.tolak').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    var itemId = button.getAttribute('data-id');
                    var itemName = button.getAttribute('data-name');
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
                            $('#penolakan' + itemId).modal('show');
                        }
                    });
                });
            });
        </script>
    @endif

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

    <script>
        $(document).ready(function() {
            $('.form-check-input').click(function(event) {
                var switch_id = $(this).attr("switch_id");
                var myUrl = "/toggleUser/" + $(this).attr('data-id').replace(/\W/g, '-');
                window.location.href = myUrl;
            });
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('showimg');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
