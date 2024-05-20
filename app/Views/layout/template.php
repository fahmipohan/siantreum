<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">


    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/@fortawesome/fontawesome-free/css/all.css') ?>" />
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/bootstrap-social/bootstrap-social.css') ?>" />

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="<?php echo base_url('/template/assets/css/style.css') ?>" />
    <link rel="stylesheet"
        href="<?php echo base_url('/template/assets/css/components.css') ?>" />

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/prismjs/themes/prism.css') ?>" />

    <title> <?php echo $title ?> </title>
</head>

<!-- Start Side Bar -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= site_url('dashboard') ?>">SIANTREA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            <?php if (session()->get('roles') == 'admin'): ?>
            <!-- START DASHBOARD ROLE ADMIN  -->
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('profil') ?>"
                    class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('dashboard') ?>"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Kelola</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('kelola_dosen') ?>"
                    class="nav-link"><i class="fas fa-users"></i><span>Kelola Mahasiswa</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('kelola_antrean') ?>"
                    class="nav-link"><i class="fas fa-user-clock"></i> <span>Kelola Antrean</span></a>
            </li>
            <!-- END DASHBOARD ROLE ADMIN  -->
            <!-- <li class="menu-header">Riwayat</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link"><i class="fas fa-th-large"></i> <span>Riwayat Antrean</span></a>
            </li> -->
            <?php else: ?>
            <!-- START DASHBOARD ROLE MAHASISWA  -->

            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('dosen/dashboard') ?>"
                    class="nav-link"><i class="fas fa-fire"></i><span>Profil</span></a>
            </li>
            <li class="menu-header">Kelola</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('dosen/kelola_antrean') ?>"
                    class="nav-link"><i class="fas fa-users"></i><span>Kelola Antrean</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('dosen/kelola_antrean') ?>"
                    class="nav-link"><i class="fas fa-user-clock"></i><span>Antrean</span></a>
            </li>
            <!-- END DASHBOARD ROLE MAHASISWA  -->
            <?php endif; ?>
        </ul>

        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> -->
    </aside>
</div>
<!-- End Side Bar -->

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Start Top Bar -->
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#"
                                data-toggle="sidebar"
                                class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#"
                            data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image"
                                src="<?= base_url() ?>template/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('nama') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('logout') ?>"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End Top Bar -->
        </div>
    </div>

    <!-- Start Main Content -->
    <div class="main-content">
        <?php echo $this->renderSection('konten') ?>
    </div>
    <!-- End Main Content -->

    <!-- Start Footer -->
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2024 | <a href="https://dotsnusa.com/"
                target="_blank">Connecting Dots Nusa</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    <!-- Start Footer -->

    <!-- General JS Library -->
    <script src="<?php echo base_url('/template/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js') ?>">
    </script>
    <script src="<?php echo base_url('/template/node_modules/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/assets/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('/template/assets/js/scripts.js') ?>"></script>
    <script src="<?php echo base_url('/template/assets/js/custom.js') ?>"></script>
    <!-- Page Specific JS File -->
</body>

</html>