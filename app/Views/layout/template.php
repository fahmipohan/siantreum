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
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') ?>" />

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="<?php echo base_url('/template/assets/css/style.css') ?>" />
    <link rel="stylesheet"
        href="<?php echo base_url('/template/assets/css/components.css') ?>" />

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?php echo base_url('/template/node_modules/prismjs/themes/prism.css') ?>" />

    <title> <?php echo $title ?> </title>

    <style>
    #backtop:hover {
        background-color: #0966ab;
        border-color: aqua;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>

<!-- Start Side Bar -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= site_url('#') ?>">SIANTREUM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SA</a>
        </div>
        <ul class="sidebar-menu">
            <?php if (session()->get('roles') == 'admin'): ?>
            <!-- START DASHBOARD ROLE ADMIN  -->
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown <?= $menu == 'antrean_berjalan' ? 'active' : '' ?> ">
                <a href="<?= site_url('antrean_berjalan') ?>"
                    class="nav-link"><i class="fas fa-user-clock"></i><span>Antrean Berjalan</span></a>
            </li>
            <li class="nav-item dropdown <?= $menu == 'approval_antrean' ? 'active' : '' ?> ">
                <a href="<?= site_url('approval_antrean') ?>"
                    class="nav-link"><i class="fas fa-users"></i><span>Approval Antrean</span></a>
            </li>
            <li class="menu-header">Profil</li>
            <li class="nav-item dropdown <?= $menu == 'profil' ? 'active' : '' ?> ">
                <a href="<?= site_url('profil') ?>"
                    class="nav-link"><i class="fas fa-user"></i><span>Profil Saya</span></a>
            </li>
            <li class="menu-header">Keluar</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('logout') ?>"
                    class="nav-link has-icon text-danger"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a>
            </li>
            <!-- <li class="menu-header">Copy Template</li>
            <li class="nav-item dropdown <?= $menu == 'kelola_antrean' ? 'active' : '' ?> ">
                <a href="<?= site_url('kelola_antrean') ?>"
                    class="nav-link"><i class="fas fa-user-clock"></i> <span>Copy Layout</span></a>
            </li> -->
            <!-- END DASHBOARD ROLE ADMIN  -->
            <!-- <li class="menu-header">Riwayat</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link"><i class="fas fa-th-large"></i> <span>Riwayat Antrean</span></a>
            </li> -->
            <?php else: ?>

            <!-- START DASHBOARD ROLE MAHASISWA  -->
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown <?= $menu == 'progres_approval' ? 'active' : '' ?>">
                <a href="<?= site_url('mahasiswa/progres_approval') ?>"
                    class="nav-link"><i class="fas fa-users"></i><span>Progres Approval Data</span></a>
            </li>
            <li class="nav-item dropdown <?= $menu == 'antrean_sekarang' ? 'active' : '' ?>">
                <a href="<?= site_url('mahasiswa/antrean_sekarang') ?>"
                    class="nav-link"><i class="fas fa-user-clock"></i><span>Antrean Saat ini</span></a>
            </li>
            <li class="menu-header">Profil</li>
            <li class="nav-item dropdown <?= $menu == 'profil' ? 'active' : '' ?>">
                <a href="<?= site_url('mahasiswa/profil') ?>"
                    class="nav-link"><i class="fas fa-user"></i><span>Profil Saya</span></a>
            </li>
            <li class="menu-header">Keluar</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('logout') ?>"
                    class="nav-link has-icon text-danger"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a>
            </li>
            <!-- <li class="menu-header">Copy Template</li>
            <li class="nav-item dropdown <?= $menu == 'copy_lay' ? 'active' : '' ?>">
                <a href="<?= site_url('mahasiswa/copy_lay') ?>"
                    class="nav-link"><i class="fas fa-fire"></i><span>Copy Layout</span></a>
            </li> -->
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
                                class="nav-link nav-link-lg"><i class="fas fa-bars">
                                </i>
                            </a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#"
                            data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm">
                                <img alt="image"
                                    src="<?= base_url() ?>template/assets/img/avatar/avatar-1.png">
                                <i class="avatar-presence online"></i>
                            </figure>
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('username') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('logout') ?>"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Keluar
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
    <script
        src="<?php echo base_url('/template/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>">
    </script>
    <script src="<?php echo base_url('/template/node_modules/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('/template/assets/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="<?php echo base_url('/template/assets/js/scripts.js') ?>"></script>
    <script src="<?php echo base_url('/template/assets/js/custom.js') ?>"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo  base_url('/templates/assets/js/page/index-0.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/page/auth-register.js') ?>"></script>


    <!-- MODAL -->
    <div id="confirmModal"
        class="modal"
        style="z-index: 999999 !important;">
        <div class="modal-content pt-0">
            <div class="text-right mt-2">
                <span class="close"
                    onclick="closeModal()">&times;</span>
            </div>
            <p id="confirmMessage"></p>
            <div class="row">
                <div class="col">
                    <button id="confirmYesBtn"
                        class="btn btn-block btn-success w-100">Yes</button>
                </div>
                <div class="col">
                    <button id="confirmNoBtn"
                        class="btn btn-block btn-danger w-100"
                        onclick="closeModal()">No</button>
                </div>
            </div>
        </div>
    </div>




    <script>
    // MODAL
    function showModal(message, yesCallback) {
        $('#confirmMessage').text(message);
        $('#confirmModal').fadeIn();

        $('#confirmYesBtn').off('click').on('click', function() {
            yesCallback();
            closeModal();
        });
    }

    function closeModal() {
        $('#confirmModal').fadeOut();
    }

    $(document).ready(function() {
        // Ensure modal is hidden on page load
        $('#confirmModal').hide();
    });
    </script>
</body>

</html>