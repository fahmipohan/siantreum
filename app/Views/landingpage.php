<!DOCTYPE html>
<html class="no-js"
    lang="en">

<head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title><?php echo $title; ?></title>

    <meta name="description"
        content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/css/animate.css" />
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/css/glightbox.min.css" />
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/css/lineIcons.css" />
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/css/style.css" />

    <link rel="stylesheet"
        href="<?= base_url() ?>/template/modules/@fortawesome/fontawesome-free/css/all.css">
</head>

<body>
    <!--[if IE]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!--====== PRELOADER PART START ======-->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand"
                                href="<?= site_url('/') ?>">
                                <img src="<?= base_url() ?>/assets/images/logos.svg"
                                    alt="Logo"
                                    style="width: 32px; height: 32px" />
                            </a>
                            <button class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar"
                                id="navbarSupportedContent">
                                <ul id="nav"
                                    class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll active"
                                            href="#home">Beranda</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn"
                                    data-scroll-nav="0"
                                    href="<?= site_url('login') ?>"
                                    rel="nofollow">
                                    Masuk
                                </a>
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->

        <div id="home"
            class="header-hero bg_cover"
            style="background-image: url(assets/images/header/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp"
                                data-wow-duration="1.3s"
                                data-wow-delay="0.2s">
                                Welcome to SIANTREUM
                            </h3>
                            <h2 class="header-title wow fadeInUp"
                                data-wow-duration="1.3s"
                                data-wow-delay="0.5s">
                                Sistem Informasi Antrean Yudisium
                            </h2>
                            <p class="text wow fadeInUp"
                                data-wow-duration="1.3s"
                                data-wow-delay="0.8s">
                                SIANTREUM adalah website yang menyediakan pelayanan antrian yudisium
                                khusus untuk mahasiswa Vokasi Universitas Brawijaya yang akan segera menjadi calon
                                penerus bangsa!
                            </p>
                            <a href="#jadwal"
                                class="main-btn page-scroll active wow fadeInUp"
                                data-wow-duration="1.3s"
                                data-wow-delay="1.1s">
                                Lihat Antrian
                            </a>
                        </div>
                    </div>
                </div>
                <!-- header hero content -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn"
                            data-wow-duration="1.3s"
                            data-wow-delay="1.4s">
                            <img src="<?= base_url() ?>/assets/images/graduate1.png"
                                alt="hero" />
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- Start bubble area atas -->
            <div id="particles-1"
                class="particles"></div>
            <!-- End bubble area atas -->
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    <section id="jadwal"
        class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <!-- section title -->
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">
                            <span>Jadwal</span>
                            <br>
                            Antrian Hari ini
                        </h3>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="card-body wow fadeInUp"
                    data-wow-duration="1.3s"
                    data-wow-delay="0.2s">
                    <div class="table-responsive"
                        style="border-radius: 5px; background-color: #ADDFFF">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Departemen</th>
                                <th>Prodi</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <!-- <th>
                                    <div class="d-flex justify-content-center">Ambil Antrean</div>
                                </th> -->
                            </tr>
                            <?php foreach ($approve as $indexMahasiswa => $value): ?>
                            <tr>
                                <td> <?= $indexMahasiswa + 1 ?> </td>
                                <td> <?= $value['nama_lengkap'] ?> </td>
                                <td> <?= $value['nim'] ?> </td>
                                <td> <?= $value['fakultas_mahasiswa'] ?> </td>
                                <td> <?= $value['departemen'] ?> </td>
                                <td> <?= $value['program_studi']?> </td>
                                <td> <?= date('d-m-Y', strtotime($value['tgl_rencana'])) ?> </td>
                                <td>
                                    <?php
                                    $badgeClass = 'badge-warning';
                                    if ($value['status_approval'] === 'approved') {
                                        $badgeClass = 'text-success y-auto fs-6';
                                    } elseif ($value['status_approval'] === 'rejected') {
                                        $badgeClass = 'text-danger y-auto fs-6';
                                    }
                                    ?>
                                    <div class="badge <?= $badgeClass ?>"><?= ucfirst($value['status_approval']) ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right wow fadeInUp"
                    data-wow-duration="1.3s"
                    data-wow-delay="0.2s"
                    style="border-end-end-radius: 8px; border-end-start-radius: 8px">
                    <nav class="d-inline-block">
                        <!-- pager here -->
                        <?= (count($approve) > 10) ? $pager->links('default', 'pagination') : false?>
                    </nav>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== SERVICES PART ENDS ======-->

    <!--====== VIDEO COUNTER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer"
        class="footer-area pt-240"
        style="z-index: 1;">
        <div class="container">

            <!-- subscribe area -->
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn"
                            data-wow-duration="1s"
                            data-wow-delay="0.2s">
                            <a class="logo"
                                href="javascript:void(0)">
                                <img src="<?= base_url() ?>/assets/images/logos.svg"
                                    alt="logo"
                                    style="height: 48px; width: 48px" />
                            </a>
                            <p class="text">
                                Pendidikan vokasi adalah pendidikan tinggi yang fokus pada keahlian terapan dari D-I
                                hingga Doktor Terapan. Tujuannya mengembangkan keterampilan praktis dan adaptasi
                                pekerjaan. Diselenggarakan di akademi, politeknik, sekolah tinggi, institut, dan
                                universitas dengan program Diploma 1 hingga 4. Standar pendidikan vokasi didasarkan pada
                                kompetensi nasional dan internasional.
                            </p>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/Universitas.Brawijaya.Official/?locale=id_ID"
                                        target="_blank">
                                        <i class="lni lni-facebook-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://x.com/UB_Official?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                                        target="_blank">
                                        <i class="lni lni-twitter-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/univ.brawijaya/"
                                        target="_blank">
                                        <i class="lni lni-instagram-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/school/universitas-brawijaya/?originalSubdomain=id"
                                        target="_blank">
                                        <i class="lni lni-linkedin-original"> </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12">
                        <div class="footer-link d-flex mt-50 justify-content-sm-between">
                            <div class="link-wrapper wow fadeIn"
                                data-wow-duration="1s"
                                data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Road Map</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div>
                            <!-- footer wrapper -->
                            <div class="link-wrapper wow fadeIn"
                                data-wow-duration="1s"
                                data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Resources</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <!-- footer wrapper -->
                        </div>
                        <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <div class="footer-contact mt-50 wow fadeIn"
                            data-wow-duration="1s"
                            data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Contact Us</h4>
                            </div>
                            <ul class="contact">
                                <li>0341-553240</li>
                                <li>vokasi@ub.ac.id</li>
                                <li>vokasi.ub.ac.id</li>
                                <li>
                                    Jl. Veteran No 12 – 14, Ketawanggede, <br />
                                    Malang, Jawa Timur, Indonesia.
                                </li>
                            </ul>
                        </div>
                        <!-- footer contact -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">
                                    Copyright ©2024 All rights reserved
                                </p>
                                <!-- <p class="text">
                                    Designed and Developed by
                                    <a href="https://dotsnusa.com"
                                        rel="nofollow"
                                        target="_blank">Connecting Dots Nusa</a>
                                </p> -->
                            </div>
                            <!-- copyright content -->
                        </div>
                        <!-- copyright -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- footer copyright -->
        </div>
        <!-- Start bubble area bawah -->
        <div id="particles-2"></div>
        <!-- End bubble area bawah -->
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->
    <a href="#"
        class="back-to-top"> <i class="lni lni-chevron-up"> </i> </a>
    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Javascript Files ======-->
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/count-up.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/particles.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>

</html>