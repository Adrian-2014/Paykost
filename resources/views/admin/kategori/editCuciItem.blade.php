@extends('layout.dashboard')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/editCuciItem.css') }}">


@section('container')
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
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
    <div class="container-fluid">
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

                <div class="edit">
                    Edit Data Cuci Items
                </div>

                <form action="{{ url('editCuciItem' . $item->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <input type="text" name="nama_barang" placeholder="Nama Barang . . ." class="form-control target" value="{{ $item->nama_barang }}">
                        <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control target" value="{{ $item->harga_barang }}">
                        <div class="dropdown status" id="drop">
                            <input type="text" readonly class="form-control" id="isis" name="status" placeholder="Pilih Status . . ." required value="{{ $item->status }}">
                            </input>
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="is-real">
                                    <div class="item" onclick="its('Publish')">
                                        <div class="icons">
                                            <img src="{{ asset('img/view.png') }}">
                                        </div>
                                        <div class="value">
                                            Publish
                                        </div>
                                    </div>
                                </li>
                                <li class="is-real">
                                    <div class="item" onclick="its('Unpublish')">
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
                        <div class="dropdown layanan">
                            <input type="text" readonly class="form-control" id="isi" placeholder="Pilih Layanan . . ." name="jenis" required value="{{ $item->jenis_layanan }}">
                            </input>
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="modal()">
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="is-item">
                                    <div class="item" onclick="item('Dry Cleaning')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/towels.png') }}">
                                        </div>
                                        <div class="value">
                                            Dry Cleaning
                                        </div>
                                    </div>
                                </li>
                                <li class="is-item">
                                    <div class="item" onclick="item('Cuci Express')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Express
                                        </div>
                                    </div>
                                </li>
                                <li class="is-item">
                                    <div class="item" onclick="item('Cuci Basah')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/wet.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Basah
                                        </div>
                                    </div>
                                </li>
                                <li class="is-item">
                                    <div class="item" onclick="item('Cuci Kering')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/tshirt.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Kering
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item" onclick="item('Cuci Lipat')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/laundry.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Lipat
                                        </div>
                                    </div>
                                </li>
                                <li class="is-item">
                                    <div class="item" onclick="item('Cuci Setrika')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/setrika.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Setrika
                                        </div>
                                    </div>
                                </li>

                                <li class="is-item">
                                    <div class="item" onclick="item('Jasa Setrika')">
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
                        <input type="file" name="gambar_barang" class="form-control target" value="{{ $item->gambar_barang }}">
                        <img src="{{ asset('uploads/' . $item->gambar_barang) }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
