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
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>/assets/images/logos.svg"
                                alt="logo"
                                width="100"
                                class="shadow-info rounded-circle"
                                style="background-color: #6777ef; padding: 10px;" />
                        </div>

                        <!-- Start Alert Errors -->
                        <?php if (session('errors') || session('success')) : ?>
                        <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                            role="alert">
                            <div class="alert-body d-flex">
                                <!-- Start Pesan error -->
                                <?php if (session('errors')): ?>
                                <?= session('errors') ?>
                                <?php endif; ?>
                                <!-- End Pesan error -->

                                <!-- Start Pesan Sukses -->
                                <?php if (session('success')): ?>
                                <?= session('success') ?>
                                <?php endif; ?>
                                <!-- End Pesan Sukses -->
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
                                <h4 class="ml-2">Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST"
                                    action="<?= site_url('authLogin') ?>"
                                    class="needs-validation"
                                    novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username"
                                            type="text"
                                            class="form-control"
                                            name="username"
                                            tabindex="1"
                                            required
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password"
                                                class="control-label">Password</label>
                                        </div>
                                        <input id="password"
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            tabindex="2"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <P class="d-flex justify-content-center">Belum Punya Akun? Silahkan&nbsp;
                            <a href="<?= site_url('registrasi') ?>">Daftar</a>
                        </P>
                        <h6 class="simple-footer">
                            Copyright &copy; Connecting Dots Nusa
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>