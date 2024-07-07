<?php
$this->extend('layout/template');
$this->section('konten');
?>
<section class="section">
    <div class="section-header">
        <h1>Antrean Saat ini</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Data</a></div>
            <div class="breadcrumb-item">Antrean Saat ini</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
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
    </div>
    <div class="row">
        <div class="card-body wow fadeInUp"
            data-wow-duration="1.3s"
            data-wow-delay="0.2s">
            <div class="table-responsive"
                style="border-radius: 5px; background-color: #6495ED; color: white;">
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
                    </tr>
                    <?php foreach ($approve as $indexAntreanSekarang => $value): ?>
                    <tr>
                        <td> <?= $indexAntreanSekarang + 1 ?> </td>
                        <td> <?= $value['nama_lengkap'] ?> </td>
                        <td> <?= $value['nim'] ?> </td>
                        <td> <?= $value['fakultas_mahasiswa'] ?> </td>
                        <td> <?= $value['departemen'] ?> </td>
                        <td> <?= $value['program_studi'] ?> </td>
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
                            <div class="badge <?= $badgeClass ?>">
                                <?= ucfirst($value['status_approval']) ?>
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
                    <?= (count($approve) > 10) ? $pager->links('default', 'pagination') : false ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>