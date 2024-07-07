<?php
$this->extend('layout/template');
$this->section('konten');
?>

<section class="section">
    <div class="section-header">
        <h1>Approval Antrean</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Approval Antrean</div>
        </div>
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
                    <h4>Data Mahasiswa</h4>
                </div>

                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nim</th>
                                <th>Fakultas</th>
                                <th>Departemen</th>
                                <th>Prodi</th>
                                <th>Tanggal Rencana</th>
                                <th>Status</th>
                                <th>
                                    <div class="d-flex justify-content-center">Action</div>
                                </th>
                            </tr>
                            <?php foreach ($mahasiswa as $indexMahasiswa => $value): ?>
                            <tr>
                                <td> <?= $indexMahasiswa + 1 ?> </td>
                                <td> <?= $value['nama_lengkap'] ?> </td>
                                <td> <?= $value['nim'] ?> </td>
                                <td> <?= $fakultas[$value['id_fakultas_mahasiswa']] ?? 'Tidak diketahui' ?> </td>
                                <td> <?= $departemen[$value['id_departemen_mahasiswa']] ?? 'Tidak diketahui' ?> </td>
                                <td> <?= $prodi[$value['id_prodi_departemen']] ?? 'Tidak diketahui' ?> </td>
                                <td> <?= date('d-m-Y', strtotime($value['tgl_rencana'])) ?> </td>
                                <td>
                                    <!-- <div class="custom-control custom-switch">
                                        <input onclick="aktivasi('<?= $value['id_users'] ?>')"
                                            type="checkbox"
                                            <?php echo ($value['status'] == 'aktif')? 'checked' : false ?>
                                            class="custom-control-input p-0"
                                            id="customSwitch<?= $value['id_users'] ?>"
                                            value="1">
                                        <label class="custom-control-label"
                                            for="customSwitch<?= $value['id_users'] ?>"><?= ucfirst($value['status'] )?></label>
                                    </div><br> -->
                                    <?php
                                    $badgeClass = 'badge-warning';
                                    if ($value['status_approval'] === 'approved') {
                                        $badgeClass = 'badge-success';
                                    } elseif ($value['status_approval'] === 'rejected') {
                                        $badgeClass = 'badge-danger';
                                    }
                                    ?>
                                    <div class="badge <?= $badgeClass ?>"><?= ucfirst($value['status_approval']) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">

                                        <?php if($value['status_approval'] == 'pending'):?>

                                        <a href="<?= site_url('approval_antrean/approve?id_users=' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-success mr-2">
                                            <i class="fas fa-user-check"></i></a>

                                        <a href="<?= site_url('approval_antrean/reject?id_users=' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-danger mr-2">
                                            <i class="fas fa-user-times"></i></a>

                                        <!-- <a href="<?= site_url('approval_antrean/edit?id_users=' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-info mr-2">
                                            <i class="fas fa-info-circle"></i></a> -->

                                        <a href="<?= site_url('approval_antrean/detail?id_users=' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-info mr-2">
                                            <i class="fas fa-info-circle"></i></a>

                                        <a href="<?= site_url('delete_mahasiswa/' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-danger"
                                            data-confirm="Yakin?|Apakah anda benar ingin menghapus data ini?"
                                            data-confirm-yes="window.location.href = '<?= site_url('delete_mahasiswa/' . $value['id_users']) ?>';">
                                            <i class="fas fa-trash"></i></a>
                                        <?php else:?>

                                        <a href="<?= site_url('approval_antrean/detail?id_users=' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-info mr-2">
                                            <i class="fas fa-info-circle"></i></a>

                                        <a href="<?= site_url('delete_mahasiswa/' . $value['id_users']) ?>"
                                            class="btn btn-icon btn-danger"
                                            data-confirm="Yakin?|Apakah anda benar ingin menghapus data ini?"
                                            data-confirm-yes="window.location.href = '<?= site_url('delete_mahasiswa/' . $value['id_users']) ?>';">
                                            <i class="fas fa-trash"></i></a>

                                        <?php endif;?>

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
<script>
function aktivasi(id) {
    showModal("Apakah Anda Yakin Untuk Me-nonaktifkan Mahasiswa Ini?", function() {
        window.location.href = '<?php echo site_url('approval_antrian/aktivasi/') ?>' + id;
    })
}
</script>
<?php $this->endSection() ?>