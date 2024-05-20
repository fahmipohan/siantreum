<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/header') ?>
<?= $this->include('layout/sidebar') ?>

<body>
    <div id="app">
        <div class="main-wrapper">

            <?= $this->include('layout/topbar') ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="row">
                            <a href="#"
                                onclick="history.back();"
                                class="nav-link nav-link-lg"><i class="fas fa-arrow-left"></i></a>
                            <h1>Edit Data Antrean</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <form action="<?= site_url('kelola_antrean/update/' . $antre['id']) ?>"
                                method="post"
                                class="needs-validation"
                                novalidate="">
                                <?= csrf_field() ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Data Antrean</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Dosen</label>
                                            <select id="inputState"
                                                class="form-control"
                                                name="optionDosen"
                                                disabled>
                                                <option value="<?= $dosen['id'] ?>"><?php echo $dosen['dosen_nama'] ?>
                                                </option>
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
                                                value="<?= $dosen['maks_antrean'] ?>"
                                                name="antrean">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <div class="section-body">

        </div>
        </section>
    </div>
    <?= $this->include('layout/footer') ?>
    </div>
    </div>

    <!-- General JS Library -->
    <?= $this->include('layout/js') ?>

    <!-- Page Specific JS File -->
</body>

</html>