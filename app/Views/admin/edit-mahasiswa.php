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
                                <label for="username">Username</label>
                                <input type="text"
                                    class="form-control"
                                    id="username"
                                    placeholder="Username"
                                    name="username"
                                    value="<?php echo $user['username'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Password"
                                    name="password"
                                    value="<?php echo $user['password'] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Nama</label>
                                <input type="text"
                                    class="form-control"
                                    id="nama"
                                    placeholder="Nama Lengkap Mahasiswa"
                                    name="nama"
                                    value="<?php echo $user['nama_lengkap'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">NIM</label>
                                <input type="text"
                                    class="form-control"
                                    id="nim"
                                    placeholder="NIM"
                                    name="nim"
                                    value="<?php echo $user['nim'] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Kontak</label>
                                <input type="text"
                                    class="form-control"
                                    id="kontak"
                                    placeholder="Kontak"
                                    name="kontak"
                                    value="<?php echo $user['kontak'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Email</label>
                                <input type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email"
                                    name="email"
                                    value="<?php echo $user['email'] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Jenis Kelamin</label>
                                <input type="text"
                                    class="form-control"
                                    id="jenis-kelamin"
                                    placeholder="jenis-kelamin"
                                    name="jenis-kelamin"
                                    value="<?php echo $jenis_kelamin[$user['id_jenis_kelamin']] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Fakultas</label>
                                <input type="text"
                                    class="form-control"
                                    id="fakultas"
                                    placeholder="fakultas"
                                    name="fakultas"
                                    value="<?php echo $fakultas[$user['id_fakultas_mahasiswa']] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Departemen</label>
                                <input type="text"
                                    class="form-control"
                                    id="departemen"
                                    placeholder="departemen"
                                    name="departemen"
                                    value="<?php echo $departemen[$user['id_departemen_mahasiswa']] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Prodi</label>
                                <input type="text"
                                    class="form-control"
                                    id="prodi"
                                    placeholder="prodi"
                                    name="prodi"
                                    value="<?php echo $prodi[$user['id_prodi_departemen']] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role">Role</label>
                                <input type="text"
                                    class="form-control"
                                    id="role"
                                    value="Mahasiswa"
                                    readonly>
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