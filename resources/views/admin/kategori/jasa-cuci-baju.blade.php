@extends('layout.dashboard')

@section('title', 'Tambah Cuci Item')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/cuci.css') }}">

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
                        <h4 class="fw-semibold mb-8">Table-Footable</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="./index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Table-Footable
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
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Contact Emplyee list</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2  text-light tambah" data-bs-toggle="modal" data-bs-target="#add-contact">
                                Tambahkan Item
                            </button>
                        </div>
                        <!-- Add Contact Popup Model -->
                        <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Tambahkan Item Cuci
                                        </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storeCuciItem') }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <input type="text" name="nama_barang" placeholder="Nama Barang">
                                            <input type="text" name="harga_barang" placeholder="Harga Barang" id="numberInput" oninput="formatNumber()">
                                            <input type="file" name="gambar_barang">
                                            <select name="jenis" required>
                                                <option value="">-- Jenis Jasa --</option>
                                                <option value="Cuci Basah"> Cuci Basah</option>
                                                <option value="Cuci Kering">Cuci Kering</option>
                                                <option value="Cuci Lipat">Cuci lipat</option>
                                                <option value="Cuci Setrika">Cuci Setrika</option>
                                                <option value="Jasa Setrika">Jasa Setrika</option>
                                                <option value="Cuci Express">Cuci Express</option>
                                                <option value="Dry Cleaning">Dry Cleaning</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-info waves-effect" data-bs-dismiss="modal">
                                                Tambahkan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="item"> Nama Produk</div>
                                        </th>
                                        <th>
                                            <div class="item"> Harga Produk</div>
                                        </th>
                                        <th>
                                            <div class="item"> Jenis Layanan</div>
                                        </th>
                                        <th>
                                            <div class="item"> Gambar Produk</div>
                                        </th>
                                        <th>
                                            <div class="item"> Aksi</div>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuciItems as $item)
                                        <tr>
                                            <td>
                                                <div class="is-item">
                                                    {{ $item->nama_barang }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="is-item">
                                                    {{ $item->harga_barang }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="is-item">
                                                    {{ $item->jenis_layanan }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="is-item">
                                                    <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="imgs">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="is-last">
                                                    <div class="btn edit">Edit</div>
                                                    <div class="btn delte">
                                                        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@if (Session::has('success'))
    <script>
        swal({
            title: "Sukses!",
            text: "{{ Session::get('success') }}",
            icon: "success",
        });
    </script>
@endif

<script>
    function formatNumber() {
        // Get the input element
        var inputElement = document.getElementById("numberInput");

        // Get the current value of the input
        var value = inputElement.value;

        // Remove any existing dots
        value = value.replace(/\./g, '');

        // Add dots every three digits
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Update the input value with the formatted number
        inputElement.value = value;
    }
</script>
