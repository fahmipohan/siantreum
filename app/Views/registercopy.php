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
                        <?php if (session('errors') && !empty(old(''))): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan Sukses -->
                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
                                <!-- End Pesan Sukses -->

                                <!-- Start Pesan error -->
                                <?php foreach ($validation->getErrors() as $error) : ?>
                                <?= session($error) ?>
                                <?php endforeach ?>
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
                                <form method="POST"
                                    action="<?= site_url('authRegistrasi') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control <?= !empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>"
                                                name="nama_lengkap"
                                                autofocus
                                                value="<?= old('nama_lengkap') ?>">
                                            <?php if (!empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="number"
                                                class="form-control <?= !empty(old('nim')) && $validation->hasError('nim') ? 'is-invalid' : '' ?>"
                                                name="nim"
                                                min="0"
                                                step="1"
                                                value="<?= old('nim') ?>">
                                            <?php if (!empty(old('nim')) && $validation->hasError('nim')): ?>
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
                                            class="form-control <?= !empty(old('email')) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                                            name="email"
                                            value="<?= old('email') ?>">
                                        <?php if (!empty(old('email')) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="number"
                                                class="form-control <?= !empty(old('kontak')) && $validation->hasError('kontak') ? 'is-invalid' : '' ?>"
                                                name="kontak"
                                                min="0"
                                                step="1"
                                                value="<?= old('kontak') ?>">
                                            <?php if (!empty(old('kontak')) && $validation->hasError('kontak')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kontak') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="id_role"
                                                class="form-control <?= !empty(old('id_role')) && $validation->hasError('id_role') ? 'is-invalid' : '' ?>"
                                                value="<?= old('id_role') ?>">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                            <?php if (!empty(old('id_role')) && $validation->hasError('id_role')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_role') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control <?= !empty(old('username')) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                                name="username"
                                                value="<?= old('username') ?>"
                                                autofocus>
                                            <?php if (!empty(old('username'))  && $validation->hasError('username')): ?>
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
                                                data-indicator="pwindicator"
                                                class="form-control"
                                                <?= !empty(old('password'))  && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                                name="password">
                                            <?php if (!empty(old('password'))  && $validation->hasError('password')): ?>
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
                                                class="custom-control-input <?= !empty(old('agree')) && $validation->hasError('agree') ? 'is-invalid' : '' ?>"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                        </div>
                                        <!-- Start validasi checkbox -->
                                        <?php if (!empty(old('agree')) && $validation->hasError('agree')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agree') ?>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End validasi checkbox -->
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
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
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
                        <?php if (session('errors') && !empty(old(''))): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan Sukses -->
                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
                                <!-- End Pesan Sukses -->

                                <!-- Start Pesan error -->
                                <?php foreach ($validation->getErrors() as $error) : ?>
                                <?= session($error) ?>
                                <?php endforeach ?>
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
                                <form method="POST"
                                    action="<?= site_url('authRegistrasi') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control <?= !empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>"
                                                name="nama_lengkap"
                                                autofocus
                                                value="<?= old('nama_lengkap') ?>">
                                            <?php if (!empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="number"
                                                class="form-control <?= !empty(old('nim')) && $validation->hasError('nim') ? 'is-invalid' : '' ?>"
                                                name="nim"
                                                min="0"
                                                step="1"
                                                value="<?= old('nim') ?>">
                                            <?php if (!empty(old('nim')) && $validation->hasError('nim')): ?>
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
                                            class="form-control <?= !empty(old('email')) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                                            name="email"
                                            value="<?= old('email') ?>">
                                        <?php if (!empty(old('email')) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="number"
                                                class="form-control <?= !empty(old('kontak')) && $validation->hasError('kontak') ? 'is-invalid' : '' ?>"
                                                name="kontak"
                                                min="0"
                                                step="1"
                                                value="<?= old('kontak') ?>">
                                            <?php if (!empty(old('kontak')) && $validation->hasError('kontak')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kontak') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="id_role"
                                                class="form-control <?= !empty(old('id_role')) && $validation->hasError('id_role') ? 'is-invalid' : '' ?>"
                                                value="<?= old('id_role') ?>">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                            <?php if (!empty(old('id_role')) && $validation->hasError('id_role')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_role') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control <?= !empty(old('username')) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                                name="username"
                                                value="<?= old('username') ?>"
                                                autofocus>
                                            <?php if (!empty(old('username'))  && $validation->hasError('username')): ?>
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
                                                data-indicator="pwindicator"
                                                class="form-control"
                                                <?= !empty(old('password'))  && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                                name="password">
                                            <?php if (!empty(old('password'))  && $validation->hasError('password')): ?>
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
                                                class="custom-control-input <?= !empty(old('agree')) && $validation->hasError('agree') ? 'is-invalid' : '' ?>"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                        </div>
                                        <!-- Start validasi checkbox -->
                                        <?php if (!empty(old('agree')) && $validation->hasError('agree')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agree') ?>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End validasi checkbox -->
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
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
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
                        <?php if (session('errors') && !empty(old(''))): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan Sukses -->
                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
                                <!-- End Pesan Sukses -->

                                <!-- Start Pesan error -->
                                <?php foreach ($validation->getErrors() as $error) : ?>
                                <?= session($error) ?>
                                <?php endforeach ?>
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
                                <form method="POST"
                                    action="<?= site_url('authRegistrasi') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control <?= !empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>"
                                                name="nama_lengkap"
                                                autofocus
                                                value="<?= old('nama_lengkap') ?>">
                                            <?php if (!empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="number"
                                                class="form-control <?= !empty(old('nim')) && $validation->hasError('nim') ? 'is-invalid' : '' ?>"
                                                name="nim"
                                                min="0"
                                                step="1"
                                                value="<?= old('nim') ?>">
                                            <?php if (!empty(old('nim')) && $validation->hasError('nim')): ?>
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
                                            class="form-control <?= !empty(old('email')) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                                            name="email"
                                            value="<?= old('email') ?>">
                                        <?php if (!empty(old('email')) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="number"
                                                class="form-control <?= !empty(old('kontak')) && $validation->hasError('kontak') ? 'is-invalid' : '' ?>"
                                                name="kontak"
                                                min="0"
                                                step="1"
                                                value="<?= old('kontak') ?>">
                                            <?php if (!empty(old('kontak')) && $validation->hasError('kontak')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kontak') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="id_role"
                                                class="form-control <?= !empty(old('id_role')) && $validation->hasError('id_role') ? 'is-invalid' : '' ?>"
                                                value="<?= old('id_role') ?>">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                            <?php if (!empty(old('id_role')) && $validation->hasError('id_role')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_role') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control <?= !empty(old('username')) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                                name="username"
                                                value="<?= old('username') ?>"
                                                autofocus>
                                            <?php if (!empty(old('username'))  && $validation->hasError('username')): ?>
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
                                                data-indicator="pwindicator"
                                                class="form-control"
                                                <?= !empty(old('password'))  && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                                name="password">
                                            <?php if (!empty(old('password'))  && $validation->hasError('password')): ?>
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
                                                class="custom-control-input <?= !empty(old('agree')) && $validation->hasError('agree') ? 'is-invalid' : '' ?>"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                        </div>
                                        <!-- Start validasi checkbox -->
                                        <?php if (!empty(old('agree')) && $validation->hasError('agree')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agree') ?>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End validasi checkbox -->
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
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
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

                        <?php if (session('errors') && !empty(old(''))): ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan Sukses -->
                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
                                <!-- End Pesan Sukses -->

                                <!-- Start Pesan error -->
                                <?php foreach ($validation->getErrors() as $error) : ?>
                                <?= session($error) ?>
                                <?php endforeach ?>
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
                                <form method="POST"
                                    action="<?= site_url('authRegistrasi') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control <?= !empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>"
                                                name="nama_lengkap"
                                                autofocus
                                                value="<?= old('nama_lengkap') ?>">
                                            <?php if (!empty(old('nama_lengkap')) && $validation->hasError('nama_lengkap')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="number"
                                                class="form-control <?= !empty(old('nim')) && $validation->hasError('nim') ? 'is-invalid' : '' ?>"
                                                name="nim"
                                                min="0"
                                                step="1"
                                                value="<?= old('nim') ?>">
                                            <?php if (!empty(old('nim')) && $validation->hasError('nim')): ?>
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
                                            class="form-control <?= !empty(old('email')) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                                            name="email"
                                            value="<?= old('email') ?>">
                                        <?php if (!empty(old('email')) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kontak">No Telp</label>
                                            <input id="kontak"
                                                type="number"
                                                class="form-control <?= !empty(old('kontak')) && $validation->hasError('kontak') ? 'is-invalid' : '' ?>"
                                                name="kontak"
                                                min="0"
                                                step="1"
                                                value="<?= old('kontak') ?>">
                                            <?php if (!empty(old('kontak')) && $validation->hasError('kontak')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kontak') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="id_role"
                                                class="form-control <?= !empty(old('id_role')) && $validation->hasError('id_role') ? 'is-invalid' : '' ?>"
                                                value="<?= old('id_role') ?>">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                            <?php if (!empty(old('id_role')) && $validation->hasError('id_role')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_role') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control <?= !empty(old('username')) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                                name="username"
                                                value="<?= old('username') ?>"
                                                autofocus>
                                            <?php if (!empty(old('username'))  && $validation->hasError('username')): ?>
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
                                                data-indicator="pwindicator"
                                                class="form-control"
                                                <?= !empty(old('password'))  && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                                name="password">
                                            <?php if (!empty(old('password'))  && $validation->hasError('password')): ?>
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
                                                class="custom-control-input <?= !empty(old('agree')) && $validation->hasError('agree') ? 'is-invalid' : '' ?>"
                                                id="agree">
                                            <label class="custom-control-label"
                                                for="agree">Saya sudah yakin dengan data di atas!</label>
                                        </div>
                                        <!-- Start validasi checkbox -->
                                        <?php if (!empty(old('agree')) && $validation->hasError('agree')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agree') ?>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End validasi checkbox -->
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
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>