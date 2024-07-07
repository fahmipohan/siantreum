<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <h1>Profil Saya</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Profil</a></div>
            <div class="breadcrumb-item">Profil Saya</div>
        </div>
    </div>
    <div class="section-body">
        <h1 class="section-title">Hi, <?= session()->get('username') ?></h1>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>
        <div class="row mt-sm-4">
            <div class="col-12 col-md-8 col-lg-12">
                <!-- Start Alert Success -->
                <?php if (session('success')) : ?>
                <div class="alert alert-dismissible show fade"
                    role="alert">
                    <div class="alert-body d-flex">
                        <?= session('success') ?>
                    </div>
                </div>
                <?php endif; ?>
                <!-- End Alert Success -->
                <?php if ($admin): ?>
                <div class="card">
                    <form action="<?= site_url('updateProfil' . $admin['id_users'])?>"
                        method="POST"
                        class="needs-validation"
                        novalidate="">
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="username">Username</label>
                                    <input type="text"
                                        class="form-control"
                                        id="username"
                                        placeholder="Username"
                                        name="username"
                                        value="<?=$admin['username']?>"
                                        readonly>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="password">Password</label>
                                    <input type="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Password"
                                        name="password"
                                        required
                                        readonly>
                                    <div class="invalid-feedback">
                                        Please fill in the password.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div> -->
                    </form>
                </div>
                <?php else: ?>
                <div class="alert alert-warning"
                    role="alert">
                    Profil tidak ditemukan.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>