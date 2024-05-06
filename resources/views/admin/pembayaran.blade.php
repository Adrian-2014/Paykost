@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="{{ asset('package') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@section('title', 'Pembayaran User')
<link rel="stylesheet" href="{{ asset('css/admin-css/pembayaran.css') }}">
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
                        <h4 class="fw-semibold mb-8">Pembayaran Kost</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Pembayaran Kost
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Pembayaran Kost</h4>
                    </div>
                    <div class="card-body">
                        @if ($pembayaran->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada user yang melakukan Pembayaran
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
                                            <th class="no-kamar">
                                                <div class="th-item">
                                                    No. Kamar
                                                </div>
                                            </th>
                                            <th class="b-tag">
                                                <div class="th-item">
                                                    Bulan tagihan
                                                </div>
                                            </th>
                                            <th class="t-bayar">
                                                <div class="th-item">
                                                    Tanggal Bayar
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
                                        @foreach ($pembayaran as $item)
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
                                                                {{ $item->name }}
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
                                                    <div class="td-item b-tag">
                                                        <div class="item">
                                                            {{ $item->bulan_tagihan->isoFormat('MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item t-bayar">
                                                        <div class="item">
                                                            {{ $item->created_at->isoFormat('D MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td x-data="{ check: false }">
                                                    <div class="td-item aksi">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#persetujuan{{ $item->id }}" x-on:click="check = true" x-bind:class="{ 'disabled': check === true }">
                                                            Lihat
                                                        </div>
                                                        <div class="for-tolak">
                                                            <button type="submit" class="no tolak" :disabled="check ? false : 'disabled'" data-name="{{ $item->name }}" data-id="{{ $item->id }}">Tolak!</button>
                                                        </div>
                                                        <div class="for-setuju">
                                                            <form action="{{ route('SETUJU') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <button type="submit" class="yes setuju" :disabled="check ? false : 'disabled'">Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="penolakan{{ $item->id }}" class="modal fade in penolakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Penolakan Pembayaran {{ $item->name }}
                                                                </div>
                                                                <form action="{{ route('tolak.pay') }}" x-data="{ alasan: '' }" method="POST">
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

                                                    <div id="persetujuan{{ $item->id }}" class="modal fade in lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="logo">
                                                                        <img src="{{ asset('img/two.png') }}">
                                                                    </div>
                                                                    <div class="pay">
                                                                        Data Pembayaran <span>{{ $item->name }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="first-content">
                                                                        <div class="fc">
                                                                            <div class="top">
                                                                                Pembayaran Pada:
                                                                            </div>
                                                                            <div class="bot">
                                                                                {{ $item->created_at->isoFormat('D MMMM Y') }} <span>{{ $item->created_at->translatedFormat('H:i:s') }} WIB</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fl">
                                                                            <div class="the-content">
                                                                                Rp. <span>{{ $item->total_tagihan }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="main-content">
                                                                        <div class="kumpulan-data">
                                                                            <div class="data">
                                                                                <div class="kiri">ID Transaksi</div>
                                                                                <div class="kanan transksi-special">{{ $item->id_pembayaran }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Tagihan Bulan</div>
                                                                                <div class="kanan special">
                                                                                    {{ $item->bulan_tagihan->isoFormat('MMMM Y') }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Nama User</div>
                                                                                <div class="kanan">{{ $item->name }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">No.Kamar</div>
                                                                                <div class="kanan">Kamar No. {{ $item->no_kamar }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Metode Bayar</div>
                                                                                @php
                                                                                    $bank = DB::table('banks')
                                                                                        ->where('id', $item->bank_id)
                                                                                        ->first();
                                                                                @endphp
                                                                                <div class="kanan">Transfer {{ $bank->nama }}</div>
                                                                            </div>
                                                                            <div class="data-bukti">
                                                                                <div class="kiri">Bukti Bayar:</div>
                                                                                <div class="kanan bukti img-bukti" data-id="{{ $item->id }}">
                                                                                    <img src="{{ asset('uploads/' . $item->bukti) }}">
                                                                                </div>
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
                                                    <div class="modal fade proof" id="bukti{{ $item->id }}" tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('uploads/' . $item->bukti) }}">
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Riwayat Pembayaran Kost</h4>
                    </div>
                    <div class="card-body">
                        @if ($riwayat->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Tidak ada Riwayat Pembayaran
                                </div>
                            </div>
                        @else
                            <div class="tableku table-responsive riwayat">
                                <table id="default_order" class="table">
                                    <thead>
                                        <tr>
                                            <th class="nama">
                                                <div class="th-item">
                                                    User
                                                </div>
                                            </th>
                                            <th class="no-kamar">
                                                <div class="th-item">
                                                    No. Kamar
                                                </div>
                                            </th>
                                            <th class="b-tag">
                                                <div class="th-item">
                                                    Bulan tagihan
                                                </div>
                                            </th>
                                            <th class="t-bayar">
                                                <div class="th-item">
                                                    Tanggal bayar
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
                                        @foreach ($riwayat as $item)
                                            <tr>
                                                <td>
                                                    <div class="td-item user">
                                                        <div class="item">
                                                            <div class="imgs">
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('name', $item->name)
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
                                                                {{ $item->name }}
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
                                                    <div class="td-item b-tag">
                                                        <div class="item">
                                                            {{ $item->bulan_tagihan->isoFormat('MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item bayar">
                                                        <div class="item">
                                                            {{ $item->created_at->isoFormat('D MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-item stat">
                                                        <div class="item @if ($item->status === 'Diterima') diterima @else ditolak @endif">
                                                            {{ $item->status }}
                                                        </div>

                                                    </div>
                                                </td>
                                                <td x-data="{ check: false }">
                                                    <div class="td-item aksi">
                                                        <div class="item" data-bs-toggle="modal" data-bs-target="#riwayat{{ $item->id }}" x-on:click="check = true">
                                                            Lihat
                                                        </div>
                                                    </div>

                                                    <div id="riwayat{{ $item->id }}" class="modal fade in lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="logo">
                                                                        <img src="{{ asset('img/two.png') }}">
                                                                    </div>
                                                                    <div class="pay">
                                                                        Riwayat Pembayaran <span>{{ $item->name }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="first-content">
                                                                        <div class="fc">
                                                                            <div class="top">
                                                                                Pembayaran Pada:
                                                                            </div>
                                                                            <div class="bot">
                                                                                {{ $item->created_at->isoFormat('D MMMM Y') }} <span>WIB</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fl">
                                                                            <div class="the-content">
                                                                                Rp. <span>{{ $item->total_tagihan }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="main-content">
                                                                        <div class="kumpulan-data">
                                                                            <div class="data">
                                                                                <div class="kiri">ID Transaksi</div>
                                                                                <div class="kanan transksi-special">{{ $item->id_pembayaran }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Tagihan Bulan</div>
                                                                                <div class="kanan special">
                                                                                    {{ $item->bulan_tagihan->isoFormat('D MMMM Y') }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Nama User</div>
                                                                                <div class="kanan">{{ $item->name }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">No.Kamar</div>
                                                                                <div class="kanan">Kamar No. {{ $item->no_kamar }}</div>
                                                                            </div>
                                                                            <div class="data">
                                                                                <div class="kiri">Metode Bayar</div>
                                                                                @php
                                                                                    $bank = DB::table('banks')
                                                                                        ->where('id', $item->bank_id)
                                                                                        ->first();
                                                                                @endphp
                                                                                <div class="kanan">Transfer {{ $bank->nama }}</div>
                                                                            </div>
                                                                            <div class="data-bukti">
                                                                                <div class="kiri">Bukti Bayar:</div>
                                                                                <div class="kanan bukti">
                                                                                    <img src="{{ asset('uploads/' . $item->bukti) }}">
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="data-bukti">
                                                                                <div class="text-atas">
                                                                                    Bukti Bayar
                                                                                </div>
                                                                                <div class="for-img">
                                                                                    <div class="imgs">
                                                                                        <img src="{{ asset('uploads/' . $item->bukti) }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade proof" id="bukti{{ $item->id }}" tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('uploads/' . $item->bukti) }}">
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


    @if ($pembayaran->isNotEmpty())
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

    <script>
        document.querySelectorAll('.img-bukti').forEach(function(button) {
            button.addEventListener('click', function(e) {
                var itemId = button.getAttribute('data-id');
                var imageUrl = button.querySelector('img').getAttribute('src');
                Swal.fire({
                    imageUrl: imageUrl,
                    color: "#716add",
                    showConfirmButton: false,
                    customClass: {
                        container: "bukti-swal",
                    },
                });
            });
        });
    </script>
@endsection
