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
                        <!-- Start Alert Errors -->
                        <?php if (session('errors')) : ?>
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close"
                                    data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <?= session('errors') ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- End Alert Errors -->
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
                                    action="<?= site_url('auth') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input id="nama_lengkap"
                                                type="text"
                                                class="form-control"
                                                name="nama_lengkap"
                                                autofocus>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nim">NIM</label>
                                            <input id="nim"
                                                type="text"
                                                class="form-control"
                                                name="nim"
                                                min="0"
                                                step="1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email"
                                                type="email"
                                                class="form-control"
                                                name="email">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select name="id_role"
                                                class="form-control selectric">
                                                <option value=""
                                                    hidden></option>
                                                <option value="2">Mahasiswa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password">Username</label>
                                            <input id="username"
                                                type="text"
                                                class="form-control"
                                                name="username"
                                                autofocus>
                                            <div id="pwindicator"
                                                class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password"
                                                class="d-block">Password</label>
                                            <input id="password"
                                                type="password"
                                                class="form-control pwstrength"
                                                data-indicator="pwindicator"
                                                name="password">
                                            <div id="pwindicator"
                                                class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
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
                                        <!-- Start validasi checkbox -->
                                        <?php if (isset($validation) && $validation->hasError('agree')): ?>
                                        <div class="text-danger">
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