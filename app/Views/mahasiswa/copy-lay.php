<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Antrean</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $total_antre ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Antrean Saat Ini</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $current_antre ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Antre Selanjutnya</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $next_antre ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Sisa Antrean</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $sisa_antre ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-between">
            <a href="#"
                class="btn btn-icon icon-left btn-danger mb-3"
                data-confirm="Yakin?|Apakah anda ingin melakukan reset pada antrean saat ini?"
                data-confirm-yes="window.location.href = '<?= site_url('dosen/reset_queue') ?>';"><i
                    class="fas fa-trash"></i>Reset Antrean</a>
            <a href="<?= site_url('dosen/next_queue') ?>"
                class="btn btn-icon icon-left btn-success mb-3"><i class="fas fa-arrow-right"></i>Antrean
                Selanjutnya</a>
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
                    <!-- Start Pesan error -->
                    <?php if (session('errors')): ?>
                    <?= session('errors') ?>
                    <?php endif ?>
                    <!-- End Pesan error -->

                    <!-- Start Pesan Sukses -->
                    <?php if (session('success')): ?>
                    <?= session('success') ?>
                    <?php endif ?>
                    <!-- End Pesan Sukses -->
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
                                <th>Kode Verif</th>
                                <th>Antrean Ke</th>
                            </tr>
                            <?php foreach ($antre as $antre => $value): ?>
                            <tr>
                                <td> <?= $antre + 1 ?> </td>
                                <td style="text-transform:uppercase; font-weight: bold;"> <?= $value['kode_verif'] ?>
                                </td>
                                <td> <?= $value['no_urut'] ?> </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <!-- pager here -->
                    </nav>
                </div>
            </div>

        </div>

    </div>
</section>
<?php $this->endSection() ?>