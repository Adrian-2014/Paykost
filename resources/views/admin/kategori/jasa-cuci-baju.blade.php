@extends('layout.dashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
@section('title', 'Tambah Cuci Item')
<link rel="stylesheet" href="{{ asset('css/admin-css/kategori/cuci.css') }}">
{{--
@section('styles')
    <style>
        option {
            padding: 100px;
        }
    </style>
@endsection --}}

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
                <div class="card">
                    <div class="border-bottom">
                        <h4 class="card-title mb-2">Data Item Jasa Cuci</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-rounded m-t-10 mb-2  text-light tambah" data-bs-toggle="modal" data-bs-target="#add-item">
                                Tambahkan Item
                            </button>
                        </div>
                        <!-- Add Contact Popup Model -->
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
                                            <div class="item"> Status</div>
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
                                                <div class="itemku">
                                                    {{ $item->nama_barang }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="itemku">
                                                    {{ $item->harga_barang }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="itemku">
                                                    {{ $item->jenis_layanan }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="itemku">
                                                    <img src="{{ asset('uploads/' . $item->gambar_barang) }}" class="imgs">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="istat">
                                                    {{ $item->status }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ist-last">
                                                    <button type="button" class="btn edit" data-bs-toggle="modal" data-bs-target="#edit-item">Edit</button>
                                                    <div class="delete-form">
                                                        <form action="{{ route('item.destroy', $item->id) }}" method="POST" id="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn delete">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination d-flex justify-content-center">
                            {{ $cuciItems->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-item" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan Item Cuci
                    </h4>
                </div>
                <form action="{{ route('storeCuciItem') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="text" name="nama_barang" placeholder="Nama Barang . . ." class="form-control">
                        <input type="text" name="harga_barang" placeholder="Harga Barang . . ." id="numberInput" oninput="formatNumber()" class="form-control">
                        <input type="file" name="gambar_barang" class="form-control">

                        <div class="dropdown status">
                            <input type="text" readonly class="form-control" id="isis" placeholder="pilih Layanan . . ." name="jenis" required>
                            </input>
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="is-real">
                                    <div class="item" onclick="item('Dry Cleaning')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/towels.png') }}">
                                        </div>
                                        <div class="value">
                                            Dry Cleaning
                                        </div>
                                    </div>
                                </li>
                                <li class="is-real">
                                    <div class="item" onclick="item('Cuci Express')">
                                        <div class="icons">
                                            <img src="{{ asset('gambar-kategori/express-delivery.png') }}">
                                        </div>
                                        <div class="value">
                                            Cuci Express
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown layanan">
                            <input type="text" readonly class="form-control" id="isi" placeholder="pilih Layanan . . ." name="jenis" required>
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect cancel" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn waves-effect simpan" data-bs-dismiss="modal">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>

    <script>
        function item(itemName) {
            var inputElement = document.getElementById('isi');
            inputElement.setAttribute('value', itemName);
            modal();
        }

        document.querySelectorAll('.is-item').forEach(function(item) {
            item.addEventListener('click', close);
        });

        function close() {
            var modals = document.querySelector('.modal-body');
            modals.classList.remove('active');
        }

        function modal() {
            var btnyala = document.querySelector('.dropdown-toggle.show');
            var modals = document.querySelector('.modal-body');
            if (btnyala) {
                modals.classList.add('active');
            } else {
                modals.classList.remove('active');
            }
        }
    </script>
    <script>
        function its(nims) {
            var ins = document.getElementById('status');
            ins.setAttribute('value', nims);
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
                timer: 3500 // Waktu penampilan Sweet Alert (dalam milidetik)
            });
        </script>
    @endif

    @if (Session::has('berhasil'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ Session::get('berhasil') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3500
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
@endsection
