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
    <?php if ($profilmahasiswa): ?>
    <div class="row">
        <div class="col-12col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Lengkap</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['nama_lengkap'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>NIM</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['nim'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kontak</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['kontak'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['email'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $jenis_kelamin[$profilmahasiswa['id_jenis_kelamin']] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fakultas</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $fakultas[$profilmahasiswa['id_fakultas_mahasiswa']] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Departemen</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $departemen[$profilmahasiswa['id_departemen_mahasiswa']] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Prodi</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $prodi[$profilmahasiswa['id_prodi_departemen']] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['username'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <div class="card">
                                <div class="card-body">
                                    <?= $profilmahasiswa['password'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning"
                role="alert">
                Profil tidak ditemukan.
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php $this->endSection() ?>