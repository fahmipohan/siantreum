<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-success text-white pt-4 pb-4">
                <div class="hero-inner">
                    <h2>Welcome Back, <?= session()->get('username') ?></h2>
                    <p class="lead">This page is a place to manage posts, categories and more.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $total_admin ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Antrean Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <?php echo ($total_antrean == null) ? '0' : $total_antrean; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Mahasiswa Mendaftar</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $total_mahasiswa_daftar ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Log</h4>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="section-header">
        <h1>Antrean Berjalan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Antrean Berjalan</div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-between">
            <a href="#"
                class="btn btn-icon icon-left btn-danger mb-3"
                data-confirm="Yakin?|Apakah anda ingin melakukan reset pada antrean saat ini?"
                data-confirm-yes="window.location.href = '#';"><i class="fas fa-trash"></i>Reset Antrean</a>
            <a href="#"
                class="btn btn-icon icon-left btn-success mb-3"><i class="fas fa-arrow-right"></i>Antrean
                Selanjutnya</a>
        </div>
        <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-between">
            <a href="#"
                class="btn btn-icon icon-left btn-danger mb-3"
                data-confirm="Yakin?|Apakah anda ingin melakukan reset pada antrean saat ini?"
                data-confirm-yes="window.location.href = '<?= site_url('mahasiswa/reset_queue') ?>';"><i
                    class="fas fa-trash"></i>Reset Antrean</a>
            <a href="<?= site_url('mahasiswa/next_queue') ?>"
                class="btn btn-icon icon-left btn-success mb-3"><i class="fas fa-arrow-right"></i>Antrean
                Selanjutnya</a>
        </div>
    </div> -->
    <div class="row">
        <div class="card-body wow fadeInUp"
            data-wow-duration="1.3s"
            data-wow-delay="0.2s">
            <div class="table-responsive"
                style="border-radius: 5px; background-color: #ADDFFF">
                <table class="table table-striped table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Fakultas</th>
                        <th>Departemen</th>
                        <th>Prodi</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <!-- <th>
                            <div class="d-flex justify-content-center">Ambil Antrean</div>
                        </th> -->
                    </tr>
                    <?php foreach ($approve as $index => $value): ?>
                    <tr>
                        <td> <?= $index + 1 ?> </td>
                        <td> <?= $value['nama_lengkap'] ?> </td>
                        <td> <?= $value['nim'] ?> </td>
                        <td> <?= $value['fakultas_mahasiswa'] ?> </td>
                        <td> <?= $value['departemen'] ?> </td>
                        <td> <?= $value['program_studi']?> </td>
                        <td> <?= date('d-m-Y', strtotime($value['tgl_rencana'])) ?> </td>
                        <td>
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
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="card-footer text-right wow fadeInUp"
                data-wow-duration="1.3s"
                data-wow-delay="0.2s"
                style="border-end-end-radius: 8px; border-end-start-radius: 8px">
                <nav class="d-inline-block">
                    <!-- pager here -->
                    <?= (count($approve) > 10) ? $pager->links('default', 'pagination') : false?>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>