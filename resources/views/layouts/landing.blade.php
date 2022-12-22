<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>e-naikpangkat | JKR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="e-naikpangkat" />
        <meta name="keywords" content="e-naikpangkat, e-naikpangkat, enaikpangkat, enaikpangkat, naik pangkat" />
        <meta name="author" content="e-naikpangkat JKR" />
        <meta name="website" content="http://mywebapp/" />
        <meta name="Version" content="v1.0.0" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('asset_landing/images/jkrlogo.png') }}" type="image/png" />
        <link rel="icon" href="{{ asset('asset_landing/images/jkrlogo.png') }}" type="image/png" />

        <!-- Bootstrap -->
        <link href="{{ asset('asset_landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset_landing/css/tiny-slider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset_landing/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset_landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" rel="stylesheet">
        <!-- Main Css -->
        <link href="{{ asset('asset_landing/css/style.min.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>
        <!-- TAGLINE START -->
        <div class="tagline bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-muted fw-normal">
                                    <i data-feather="folder" class="fea icon-sm text-warning"></i> Jabatan Kerja Raya Malaysia</a></li>
                                <li class="list-inline-item mb-0 ms-3"><a href="javascript:void(0)" class="text-muted fw-normal">
                                    <i data-feather="folder" class="fea icon-sm text-warning"></i> e-naikpangkat</a>
                                </li>
                            </ul>

                            <ul class="list-unstyled social-icon tagline-social mb-0">
                                <li class="list-inline-item mb-0">
                                    <a href="https://www.jkr.gov.my"><i class="uil uil-house-user h6 mb-0"></i></a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="http://mywebapp/login"><i class="uil uil-keyhole-square h6 mb-0"></i></a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="http://mywebapp"><i class="uil uil-folder h6 mb-0"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TAGLINE END -->

        <!-- Navbar Start -->
        <header id="topnav" class="defaultscroll sticky tagline-height">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="http://mywebapp/">
                    <span class="logo-light-mode">
                        <img src="{{ asset('asset_landing/images/logo-dark.png') }}" class="l-dark" alt="">
                        <img src="{{ asset('asset_landing/images/logo-light.png') }}" class="l-light" alt="">
                    </span>
                    <img src="{{ asset('asset_landing/images/logo-light.png') }}" class="logo-dark-mode" alt="">
                </a>

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-right nav-light">
                        <li><a href="https://www.jkr.gov.my" class="sub-menu-item">Jabatan Kerja Raya Malaysia</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->

        <!-- Start Hero -->
        <div class="bg-home zoom-image d-flex align-items-center">
            <div class="bg-overlay image-wrap" style="background: url('{{ asset("asset_landing/images/jobpromotion.jpg") }}') center center;"></div>
            <div class="bg-overlay bg-linear-gradient"></div>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h4 class="display-2 fw-bold text-white title-dark">e-naikpangkat</h4>
                            <p class="para-desc mx-auto text-white-50">
                                URUSAN PEMANGKUAN DAN KENAIKAN PANGKAT<br />ATAS TALIAN UNTUK WARGA JKR
                            </p>
                            <div class="mt-4 pt-2">
                                <a href="http://mywebapp/login" class="btn btn-primary m-1">Log Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Start feature -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('asset_landing/images/about.png') }}" class="img-fluid" alt="">
                    </div><!--end col-->

                    <div class="col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="section-title ms-lg-5">
                            <span class="badge bg-soft-primary rounded-pill">Jabatan Kerja Raya Malaysia</span>
                            <h4 class="title fw-semibold mb-3 mt-2">e-naikpangkat</h4>
                            <p class="text-muted para-desc mb-0">
                                Dasar dan peraturan pemangkuan dan kenaikan pangkat dalam perkhidmatan awam adalah berasaskan Peraturan-Peraturan Pegawai Awam (Pelantikan, Kenaikan Pangkat dan Penamatan Perkhidmatan) 2005 [P.U.(A) 176/2005], Peraturan-Peraturan Lembaga Kenaikan Pangkat Perkhidmatan Awam, 2010 [P.U.(A) 75/2010] dan Peraturan-Peraturan Lembaga Kenaikan Pangkat Perkhidmatan Pelajaran, 2010 [P.U.(A) 24/2010].
                            </p>

                            <div class="d-flex mt-4">
                                <i class="uil uil-forward h4 text-primary"></i>
                                <div class="flex-1 ms-2">
                                    <h5>PEMANGKUAN</h5>
                                    <p class="text-muted para-desc mb-0">
                                        Pelaksanaan tugas secara sepenuh masa, suatu jawatan lain yang lebih tinggi grednya daripada gred hakiki dalam skim perkhidmatan yang sama dengan kelulusan Lembaga Kenaikan Pangkat.
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex mt-4">
                                <i class="uil uil-forward h4 text-primary"></i>
                                <div class="flex-1 ms-2">
                                    <h5>NAIK PANGKAT</h5>
                                    <p class="text-muted para-desc mb-0">
                                        Peningkatan secara hakiki dari satu gred ke suatu gred yang lebih tinggi dalam skim perkhidmatan yang sama dengan kelulusan Lembaga Kenaikan Pangkat.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="http://mywebapp/login" class="btn btn-primary">Log Masuk <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- End feature -->

        <!-- Footer Start -->
        <footer class="footer bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60">
                            <div class="row">
                                <div class="col-lg-12 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <a href="#" class="logo-footer">
                                        <img src="{{ asset('asset_landing/images/logo-light.png') }}" height="28" alt="">
                                    </a>
                                    <p class="mt-4">
                                        URUS SETIA KENAIKAN PANGKAT, BAHAGIAN PENGURUSAN SUMBER MANUSIA, CAWANGAN DASAR DAN PENGURUSAN KORPORAT<br />
                                        IBU PEJABAT JKR MALAYSIA, TINGKAT 29, MENARA KERJA RAYA (BLOK G), JALAN SULTAN SALAHUDDIN, 50580 KUALA LUMPUR
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Awam</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li>03-2618 8622</li>
                                        <li>03-2618 8413</li>
                                        <li>03-2618 8624</li>
                                    </ul>
                                </div>

								<div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Mekanikal &<br />Elektrik</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li>03-2618 8623</li>
                                        <li>03-2618 8477</li>
                                        <li>03-2618 8624</li>
                                    </ul>
                                </div>

								<div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Arkitek,<br />Ukur Bahan &<br />Ukur Bangunan</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li>03-2618 8631</li>
                                        <li>03-2618 8477</li>
                                        <li>03-2618 8624</li>
                                    </ul>
                                </div>

								<div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">JUSA</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li>03-2618 8639</li>
                                        <li>03-2618 8629</li>
                                        <li>03-2618 8626</li>
                                        <li>03-2618 8624</li>
                                    </ul>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-py-30 footer-bar bg-footer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-center">
                                <p class="mb-0 text-muted"><script>document.write(new Date().getFullYear())</script> © e-naikpangkat. Jabatan Kerja Raya Malaysia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End -->

        <!-- Back to top -->
        <ul class="text-center list-unstyled switcher-button mb-0 position-fixed" style="top: 20%; left: 10px; z-index: 2;">
            {{-- <li class="d-grid"><a href="javascript:void(0)" class="btn btn-icon rounded-circle btn-dark dark-version t-dark" onclick="setTheme('style-dark')"> <i class="uil uil-moon fs-5"></i> </a></li> --}}
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-icon rounded-circle btn-dark light-version t-light" onclick="setTheme('style')"> <i class="uil uil-sun fs-5"></i> </a></li>
        </ul>
        <a href="javascript:void(0)" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill"><i class="mdi mdi-arrow-up"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="{{ asset('asset_landing/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('asset_landing/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('asset_landing/js/tobii.min.js') }}"></script>
        <script src="{{ asset('asset_landing/js/parallax.js') }}"></script>
        <script src="{{ asset('asset_landing/js/feather.min.js') }}"></script>

        <!-- Main Js -->
        <script src="{{ asset('asset_landing/js/plugins.init.js') }}"></script>
        <script src="{{ asset('asset_landing/js/app.js') }}"></script>
    </body>
</html>
