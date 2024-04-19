@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
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
                        <h4 class="fw-semibold mb-8">Pembayaran</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Pembayaran
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
                        <h4 class="card-title mb-2 ps-2 pt-2">Data Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        @if ($pembayaran->isEmpty())
                            <div class="illustration d-flex flex-column">
                                <div class="image">
                                    <img src="{{ asset('img/people.png') }}">
                                </div>
                                <div class="text">
                                    Data tidak di Temukan, Silahkan tambahkan Data
                                </div>
                            </div>
                        @else
                            <div class="container-fluid head">
                                <div class="pembungkus">
                                    <div class="item">
                                        User
                                    </div>
                                    <div class="item">
                                        Tanggal Bayar
                                    </div>
                                    <div class="item">
                                        View
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid payment-request">
                                @foreach ($pembayaran as $item)
                                    <div class="request">
                                        <div class="text">
                                            <span>{{ $item->name }}</span>
                                        </div>
                                        <div class="view">
                                            <div class="lihat" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                Lihat
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade in" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pebayaran dari {{ $item->name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6 pt-2">
                                                            <label for="">Nama User</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->name }}" name="name">
                                                        </div>
                                                        <div class="col-6 pt-2">
                                                            <label for="">No. Kamar</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->no_kamar }}" name="no_kamar">
                                                        </div>
                                                        <div class="col-6 pt-2">
                                                            <label for="">Bulan Tagihan</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->bulan_tagihan }}" name="bulan_tagihan">
                                                        </div>
                                                        <div class="col-6 pt-2">
                                                            <label for="">Total Tagihan</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->total_tagihan }}" name="total_tagihan">
                                                        </div>
                                                        <input type="hidden" readonly class="form-control" value="{{ $item->bukti }}" name="bukti">
                                                        <div class="col-6 pt-2">
                                                            <label for="">Tanggal Masuk</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->tanggal_masuk }}" name="tanggal_masuk">
                                                        </div>
                                                        <div class="col-6 pt-2">
                                                            <label for="">Durasi Ngekost</label>
                                                            <input type="text" readonly class="form-control" value="{{ $item->durasi_ngekost }}" name="tanggal_masuk">
                                                        </div>
                                                    </div>
                                                    <div class="for-img">
                                                        <label class="buk">Bukti Pembayaran</label>
                                                        <div class="bukti">
                                                            <img src="{{ asset('uploads/' . $item->bukti) }}">
                                                            <input type="hidden" value="{{ $item->status }}" name="status">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn cancel" data-bs-dismiss="modal">tutup</button>
                                                    <div class="choice">
                                                        <form action="">
                                                            <button type="submit" class="btn tolak">Tolak Pengajuan</button>
                                                        </form>
                                                        <button type="submit" class="btn accept">Terima Pengajuan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
