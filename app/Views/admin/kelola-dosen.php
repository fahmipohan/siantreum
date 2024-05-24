<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Dosen</h1>
    </div>
    <div class="d-flex justify-content-end">
        <a href="#"
            class="btn btn-icon icon-left btn-primary mb-3"
            data-toggle="modal"
            data-target="#dosenModal"><i class="fas fa-user-plus"></i> Tambah
            Dosen</a>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <?php if (session('errors') || session('success')): ?>
            <div class="alert alert-dismissible show fade <?= session('errors') ? 'alert-danger' : 'alert-success' ?>"
                role="alert">
                <div class="alert-body">
                    <button class="close"
                        data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <?php if (session('errors')): ?>
                    <?= session('errors') ?>
                    <?php endif ?>

                    <?php if (session('success')): ?>
                    <?= session('success') ?>
                    <?php endif ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4>Data Dosen</h4>
                </div>

                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Prodi</th>
                                <th>
                                    <div class="d-flex justify-content-center">Action</div>
                                </th>
                            </tr>
                            <?php foreach ($dosen as $dosen => $value): ?>
                            <tr>
                                <td> <?= $dosen + 1 ?> </td>
                                <td> <?= $value['nama'] ?> </td>
                                <td> <?= $value['email'] ?> </td>
                                <td> <?= $value['prodi'] ?> </td>
                                <td>
                                    <div class="d-flex justify-content-center">

                                        <a href="<?= site_url('kelola_dosen/edit?id=' . $value['id']) ?>"
                                            class="btn btn-icon btn-info mr-2">
                                            <i class="far fa-edit"></i></a>

                                        <a href="<?= site_url('delete_dosen/' . $value['id']) ?>"
                                            class="btn btn-icon btn-danger"
                                            data-confirm="Yakin?|Apakah anda benar ingin menghapus data ini?"
                                            data-confirm-yes="window.location.href = '<?= site_url('delete_dosen/' . $value['id']) ?>';">
                                            <i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <?= $pager->links('default', 'pagination') ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Form Tambah Dosen -->
<div class="modal fade"
    tabindex="-1"
    role="dialog"
    id="dosenModal">
    <div class="modal-dialog"
        role="document">
        <form action="<?= site_url('tambah_dosen') ?>"
            method="post"
            class="needs-validation"
            novalidate=""
            id="formModal">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dosen</h5>
                    <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text"
                                class="form-control"
                                id="username"
                                placeholder="Username"
                                name="username"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password"
                                class="form-control"
                                id="password"
                                placeholder="Password"
                                name="password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text"
                            class="form-control"
                            id="nama"
                            placeholder="Nama Lengkap Dosen"
                            name="nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Email</label>
                        <input type="email"
                            class="form-control"
                            id="email"
                            placeholder="Email"
                            name="email"
                            required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <input type="text"
                                class="form-control"
                                id="role"
                                value="Dosen"
                                readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputZip">Prodi</label>
                            <input type="text"
                                class="form-control"
                                id="prodi"
                                name="prodi"
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary"
                        id="buttonSave">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Form Tambah Dosen -->
<?php $this->endSection() ?>