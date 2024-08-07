<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    @yield('csslibrary')


    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            {{-- <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/dist/index">Stisla</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/dist/index">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Utama</li>
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ url('/dashboard') }}"><i class="far fa fa-fire"></i><span>Dashboard</span></a>
                        </li>

                        <li class="menu-header">Data Kegiatan</li>

                        <li
                            class="{{ Request::is('pegawai') ? 'active' : '' }} || {{ Request::is('pegawai/create') ? 'active' : '' }} || {{ Request::is('pegawai/*/edit') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/pegawai') }}"><i class="fas fa-user"></i>
                                <span>Data Pegawai</span></a>
                        </li>

                        <li
                            class="{{ Request::is('barang') ? 'active' : '' }} || {{ Request::is('barang/create') ? 'active' : '' }} || {{ Request::is('barang/*/edit') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/barang') }}"><i class="fas fa-layer-group"></i>
                                <span>Data Barang</span></a>
                        </li>

                        <li
                            class="{{ Request::is('pemeliharaan') ? 'active' : '' }} || {{ Request::is('pemeliharaan/create') ? 'active' : '' }} || {{ Request::is('pemeliharaan/*/edit') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/pemeliharaan') }}"><i class="fas fa-wrench"></i>
                                <span>Data Pemeliharaan</span></a>
                        </li>

                        <!-- Komplain -->
                        <li
                            class="dropdown {{ Request::is('komplain') ? 'active' : '' }} || {{ Request::is('satuan') ? 'active' : '' }} || {{ Request::is('lokasi') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-comments"></i></i><span>Data
                                    Komplain</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('jabatan') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/jabatan') }}"><span>Proses</span></a></li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('satuan') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/satuan') }}"><span>Sedang Proses</span></a></li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('lokasi') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/lokasi') }}"><span>Selesai</span></a></li>
                            </ul>
                        </li>
                        <!-- Komplain -->
                        <li class="menu-header">Master Data</li>
                        <li
                            class="dropdown {{ Request::is('jabatan') ? 'active' : '' }} || {{ Request::is('satuan') ? 'active' : '' }} || {{ Request::is('lokasi') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master
                                    Data</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('jabatan') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/jabatan') }}"><span>Master Jabatan</span></a></li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('satuan') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/satuan') }}"><span>Master Satuan</span></a></li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('lokasi') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('/lokasi') }}"><span>Master Lokasi</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-header">Laporan</li>
                        {{-- <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ url('/dashboard') }}"><i class="far fa fa-fire"></i><span>Dashboard</span></a>
                        </li> --}}

                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">


                    <!-- Content -->
                    @yield('content')
                    <!-- End Content -->


                </section>
                @yield('modal')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <strong>Bg Naga
                        Madani</strong>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    @yield('jslibrary')


    <!-- Page Specific JS File -->
    @yield('datatable')


    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

</body>

</html>
