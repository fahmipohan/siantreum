<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/header') ?>

<body>
    <style>
    @keyframes fadeIn {
        from {
            transform: translateY(-80%);
        }

        to {
            transform: translateY(0);
        }
    }

    .alert {
        animation: fadeIn 0.8s ease;
    }
    </style>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>/assets/images/logos.svg"
                                alt="logo"
                                width="100"
                                class="shadow-info rounded-circle"
                                style="background-color: #6777ef; padding: 10px;" />
                        </div>

                        <?php if (session('errors')): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan error -->
                                <?php if (session('errors')): ?>
                                <?= session('errors') ?>
                                <?php endif; ?>
                                <!-- End Pesan error -->
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <a href="#"
                                        onclick="history.back();"
                                        class="nav-link nav-link-lg"><i class="fas fa-arrow-left"></i></a>
                                </div>
                                <h4 class="ml-2">Register</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= site_url('authRegistrasi') ?>"
                                    method="POST">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control"
                                                name="nama_lengkap"
                                                autofocus
                                                value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="number"
                                                class="form-control"
                                                name="nim"
                                                min="0"
                                                step="1"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email Pribadi/Email Instansi</label>
                                            <input id="email"
                                                type="email"
                                                class="form-control"
                                                name="email"
                                                value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="tel"
                                                class="form-control"
                                                name="kontak"
                                                pattern="[0-9]{4}[0-9]{4}[0-9]{4}"
                                                placeholder="08XXXXXXXXXX"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="role">Sebagai</label>
                                            <select class="form-control selectric"
                                                name="id_role"
                                                value="">
                                                <option hidden
                                                    value=""></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="tgl_rencana">Tanggal direncanakan</label>
                                            <input id="tgl_rencana"
                                                type="date"
                                                class="form-control datepicker"
                                                name="tgl_rencana"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control selectric"
                                                name="id_jenis_kelamin"
                                                value="">
                                                <option hidden
                                                    value=""></option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="fakultas">Fakultas</label>
                                            <select class="form-control selectric"
                                                name="id_fakultas_mahasiswa"
                                                value="">
                                                <option hidden
                                                    value=""></option>
                                                <option value="1">Vokasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="departemen">Departemen</label>
                                            <select class="form-control selectric"
                                                name="id_departemen_mahasiswa"
                                                value="">
                                                <option hidden
                                                    value=""></option>
                                                <option value="1">Bisnis dan Hospitality</option>
                                                <option value="2">Industri Kreatif dan Digital</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="prodi">Prodi</label>
                                            <select class="form-control selectric"
                                                name="id_prodi_departemen"
                                                value="">
                                                <option hidden
                                                    value=""></option>
                                                <option value="1">D4 Manajemen Perhotelan</option>
                                                <option value="2">D3 Keuangan dan Perbankan</option>
                                                <option value="3">D3 Administrasi Bisnis</option>
                                                <option value="4">D4 Desain Grafis</option>
                                                <option value="5">D3 Teknologi Informasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control"
                                                name="username"
                                                value=""
                                                autofocus>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password"
                                                class="d-block">Password</label>
                                            <input id="password"
                                                type="password"
                                                data-indicator="pwindicator"
                                                class="form-control"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                name="agree"
                                                class="custom-control-input"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; SIANTREUM 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?= $this->include('layout/js') ?>
</body>

</html>