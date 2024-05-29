<!DOCTYPE html>
<html lang="en">

<?= view('layout/header') ?>

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

                        <?php if (session('errors') || session('success')): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex justify-content-center">
                                <?php if (session('errors')): ?>
                                <?= session('errors') ?>
                                <?php endif; ?>

                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
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
                                <form method="POST"
                                    action="<?= site_url('registrasi') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control <?= isset($validation) && $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>"
                                                name="nama_lengkap"
                                                autofocus
                                                value="<?= old('nama_lengkap') ?>">
                                            <?php if (isset($validation) && $validation->hasError('nama_lengkap')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="text"
                                                class="form-control <?= isset($validation) && $validation->hasError('nim') ? 'is-invalid' : '' ?>"
                                                name="nim"
                                                value="<?= old('nim') ?>">
                                            <?php if (isset($validation) && $validation->hasError('nim')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nim') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email"
                                            type="email"
                                            class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                                            name="email"
                                            value="<?= old('email') ?>">
                                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="text"
                                                class="form-control <?= isset($validation) && $validation->hasError('kontak') ? 'is-invalid' : '' ?>"
                                                name="kontak"
                                                value="<?= old('kontak') ?>">
                                            <?php if (isset($validation) && $validation->hasError('kontak')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kontak') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="role"
                                                class="form-control <?= isset($validation) && $validation->hasError('role') ? 'is-invalid' : '' ?>"
                                                value="<?= old('role') ?>">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                            <?php if (isset($validation) && $validation->hasError('role')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('role') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                                name="username"
                                                value="<?= old('username') ?>">
                                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password"
                                                class="d-block">Password</label>
                                            <input id="password"
                                                type="password"
                                                class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                                name="password">
                                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                name="agree"
                                                class="custom-control-input <?= isset($validation) && $validation->hasError('agree') ? 'is-invalid' : '' ?>"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                            <?php if (isset($validation) && $validation->hasError('agree')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('agree') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                            class="