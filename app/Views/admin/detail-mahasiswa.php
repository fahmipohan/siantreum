<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <div class="row">
            <a href="#"
                onclick="history.back();"
                class="nav-link nav-link-lg"><i class="fas fa-arrow-left"></i></a>
            <h1>Detail Data Mahasiswa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="<?= site_url('approval_antrian/update/' . $user['id_users']) ?>"
                method="post"
                class="needs-validation"
                novalidate="">
                <?= csrf_field() ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Data <?php echo $user['nama_lengkap'] ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Nama</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['nama_lengkap'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">NIM</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['nim'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Kontak</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['kontak'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Email</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['email'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Jenis Kelamin</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $jenis_kelamin[$user['id_jenis_kelamin']] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Fakultas</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $fakultas[$user['id_fakultas_mahasiswa']] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Departemen</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $departemen[$user['id_departemen_mahasiswa']] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Prodi</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $prodi[$user['id_prodi_departemen']] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['username'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $user['password'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role">Role</label>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $role[$user['id_role']] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->endSection() ?>