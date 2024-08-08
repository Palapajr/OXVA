<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SKIIPS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/impact/assets/img/madani.png" rel="icon">
    <link href="/impact/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/impact/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/impact/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/impact/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/impact/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/impact/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/impact/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header fixed-top">

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="/impact/assets/img/logo.png" alt=""> -->
                    <h1 class="sitename">SKIIPS</h1>
                    <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        {{-- <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li> --}}
                        {{-- <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li> --}}

                        {{-- <li><a href="#contact">Contact</a></li> --}}
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section accent-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2><span>Welcome to </span><span class="accent">SKIIPS</span></h2>
                        <p>Aplikasi Sederhana untuk pelaporan Komplain</p>

                        <div class="d-flex">
                            <button class="btn-get-started" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">Ajukan Komplain <i class="bi bi-send"></i></button>
                        </div>

                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="/impact/assets/img/undraw.svg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel2">Form Komplain</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('komplain.storeuser') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama_pelapor"
                                            placeholder="Nama Pelapor" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" name="bidang" placeholder="Bidang"
                                            required="">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" rows="8" placeholder="Deskrips" required=""></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="foto_bukti"
                                            placeholder="Foto" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <select class="form-control" name="typeKomplain">
                                            <option>Pilih Laporan Ke</option>
                                            <option value="SAR">Sarpras</option>
                                            <option value="IT">IT</option>
                                            <option value="ATM">ATEM</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal UNIT IT-->
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel2">Komplain Ke IT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" class="php-email-form" data-aos="fade"
                                data-aos-delay="100">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama Pelapor" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" name="bidang"
                                            placeholder="Bidang" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" rows="8" placeholder="Deskrips" required=""></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="subject" placeholder="Foto"
                                            required="">
                                    </div>


                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal Sarpras-->
            <div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel2">Komplaint Ke Sarpras
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade"
                                data-aos-delay="100">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama Pelapor" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" name="bidang"
                                            placeholder="Bidang" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" rows="8" placeholder="Deskrips" required=""></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="subject" placeholder="Foto"
                                            required="">
                                    </div>


                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal ATEM-->
            <div class="modal fade" id="exampleModalToggle4" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel2">Komplain Ke ATEM</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade"
                                data-aos-delay="100">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama Pelapor" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" name="bidang"
                                            placeholder="Bidang" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" rows="8" placeholder="Deskrips" required=""></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="subject" placeholder="Foto"
                                            required="">
                                    </div>


                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end Modal -->


            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <div class="col-xl-4 col-md-6">
                            <div class="icon-box bg-primary">
                                <div class="icon"><i class="bi bi-wifi"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Unit IT</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                        <div class="col-xl-4 col-md-6">
                            <div class="icon-box bg-warning">
                                <div class="icon"><i class="bi bi-hammer"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Teknisi Sarpras</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                        <div class="col-xl-4 col-md-6">
                            <div class="icon-box bg-danger">
                                <div class="icon"><i class="bi bi-thermometer-snow"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">ATEM</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

    </main>

    <footer id="footer" class="footer accent-background">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">SIPRAS</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by : <strong class="px-1 sitename">Bg Naga Madani</strong>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/impact/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/impact/assets/vendor/php-email-form/validate.js"></script>
    <script src="/impact/assets/vendor/aos/aos.js"></script>
    <script src="/impact/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/impact/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/impact/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/impact/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/impact/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/modules/izitoast/js/iziToast.min.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            iziToast.info({
                title: '{{ session('success') }}',
                position: 'topRight'
            });

            // iziToast.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            iziToast.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

    <!-- Main JS File -->
    <script src="/impact/assets/js/main.js"></script>

</body>

</html>
