<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Antrean</h1>
    </div>
    <div class="d-flex justify-content-end">
        <a href="#"
            class="btn btn-icon icon-left btn-primary mb-3"
            data-toggle="modal"
            data-target="#antreanModal"><i class="fas fa-user-clock"></i> Tambah
            Antrean</a>
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
                    <h4>Data Antrean</h4>
                </div>

                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>Tanggal</th>
                                <th>Maks Antrean</th>
                                <th>
                                    <div class="d-flex justify-content-center">Action</div>
                                </th>
                            </tr>
                            <?php foreach ($antre as $antre => $value): ?>
                            <tr>
                                <td> <?= $antre + 1 ?> </td>
                                <td> <?= $value['dosen_nama'] ?> </td>
                                <td> <?= $value['tanggal'] ?> </td>
                                <td> <?= $value['maks_antrean'] ?> </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?= site_url('kelola_antrean/edit?id=' . $value['id']) ?>"
                                            class="btn btn-icon btn-info mr-2"><i class="far fa-edit"></i></a>
                                        <a href=""
                                            class="btn btn-icon btn-danger"
                                            data-confirm="Yakin?|Apakah anda ingin menghapus data ini?"
                                            data-confirm-yes="window.location.href = '<?= site_url('delete_antrean/' . $value['id']) ?>';"><i
                                                class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <!-- pager here -->
                        <?= $pager->links('default', 'pagination') ?>
                    </nav>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Modal Create Antrean -->
<div class="modal fade"
    tabindex="-1"
    role="dialog"
    id="antreanModal">
    <div class="modal-dialog"
        role="document">
        <form action="<?= site_url('tambah_antrean') ?>"
            method="post"
            class="needs-validation"
            novalidate="">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Antrean</h5>
                    <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nama">Nama Dosen</label>

                        <select id="inputState"
                            class="form-control"
                            name="optionDosen">
                            <option selected>-- Pilih Dosen --</option>
                            <?php foreach ($dosen as $dosen => $value): ?>
                            <option value="<?= $value['id'] ?>"><?php echo $value['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date"
                            class="form-control"
                            value="<?php echo $tanggal ?>"
                            name="date">
                    </div>
                    <div class="form-group">
                        <label for="antrean">Jumlah Maks Antrean</label>
                        <input type="number"
                            min="0"
                            onpaste="return false;"
                            oninput="this.value = Math.abs(this.value)"
                            class="form-control"
                            value="0"
                            name="antrean">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->endSection() ?>