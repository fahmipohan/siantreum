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
    <div class="section-header">
        <h1>Progres Approval Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Data</a></div>
            <div class="breadcrumb-item">Progres Approval Data</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Approval</h4>
                </div>
                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Departemen</th>
                                <th>Prodi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                            <?php if (!empty($approve)): ?>
                            <?php foreach ($approve as $indexApproval => $value): ?>
                            <tr>
                                <td> <?= $indexApproval + 1 ?> </td>
                                <td> <?= $value['nama_lengkap'] ?> </td>
                                <td> <?= $value['nim'] ?> </td>
                                <td> <?= $fakultas[$value['id_fakultas_mahasiswa']] ?> </td>
                                <td> <?= $departemen[$value['id_departemen_mahasiswa']] ?> </td>
                                <td> <?= $prodi[$value['id_prodi_departemen']] ?> </td>
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
                            <?php else: ?>
                            <tr>
                                <td colspan="8"
                                    class="text-center">No data available</td>
                            </tr>
                            <?php endif; ?>
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
        </div>
    </div>
</section>
<?php $this->endSection() ?>