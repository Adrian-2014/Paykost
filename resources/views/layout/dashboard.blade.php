<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>@yield('title')</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package') }}/dist/images/logos/favicon.ico" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('package') }}/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('package') }}/dist/css/style.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('styles')

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('img/logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('img/logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('package') }}/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
                        <img src="{{ asset('package') }}/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">

                        <li class="nav-small-cap">
                            <span class="hide-menu">Main</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/index" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/user" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/banner" aria-expanded="false">
                                <span>
                                    <i class="ti ti-app-window"></i>
                                </span>
                                <span class="hide-menu">Banner</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <span class="hide-menu">Kategori</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-wash-dry-1"></i>
                                </span>
                                <span class="hide-menu">Jasa Cuci Baju</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/admin/jasaCuciUmum" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Jasa Cuci Umum</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/admin/jasaCuciKhusus" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Jasa Cuci Khusus </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/admin/jasaCuciSepatu" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Jasa Cuci Sepatu </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="body-wrapper">
            <!--  Header Start -->
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
            @yield('container')
        </div>
    </div>
    <!--  Import Js Files -->
    <script src="{{ asset('package') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('package') }}/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('package') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="{{ asset('package') }}/dist/js/app.min.js"></script>
    <script src="{{ asset('package') }}/dist/js/app.init.js"></script>
    <script src="{{ asset('package') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('package') }}/dist/js/sidebarmenu.js"></script>
    <script src="{{ asset('package') }}/dist/js/custom.js"></script>
    <!--  current page js files -->
    <script src="{{ asset('package') }}/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('package') }}/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('package') }}/dist/js/dashboard.js"></script>

    @yield('internal-script')
</body>

</html>
