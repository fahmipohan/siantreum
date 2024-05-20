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
                            <h1>Edit Data Dosen</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <form action="<?= site_url('kelola_dosen/update/' . $user['id']) ?>"
                                method="post"
                                class="needs-validation"
                                novalidate="">
                                <?= csrf_field() ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Data <?php echo $user['nama'] ?></h4>
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
                                                    value="<?php echo $user['username'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">Password</label>
                                                <input type="password"
                                                    class="form-control"
                                                    id="password"
                                                    placeholder="Password"
                                                    name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Nama</label>
                                            <input type="text"
                                                class="form-control"
                                                id="nama"
                                                placeholder="Nama Lengkap Dosen"
                                                name="nama"
                                                value="<?php echo $user['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Email</label>
                                            <input type="email"
                                                class="form-control"
                                                id="email"
                                                placeholder="Email"
                                                name="email"
                                                value="<?php echo $user['email'] ?>">
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
                                                    value="<?php echo $user['prodi'] ?>">
                                            </div>
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