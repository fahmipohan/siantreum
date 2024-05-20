<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIANTREA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            <?php if (session()->get('roles') == 'admin') : ?>
                <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Kelola</li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('kelola_dosen') ?>" class="nav-link"><i class="fas fa-users"></i><span>Kelola Dosen</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('kelola_antrean') ?>" class="nav-link"><i class="fas fa-user-clock"></i> <span>Kelola Antrean</span></a>
                </li>
                <li class="menu-header">Riwayat</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-th-large"></i> <span>Riwayat Antrean</span></a>
                </li>
            <?php else : ?>
                <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('dosen/dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Kelola</li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('dosen/kelola_antrean') ?>" class="nav-link"><i class="fas fa-users"></i><span>Kelola Antrean</span></a>
                </li>
                <li class="menu-header">Data</li>
                <li class="nav-item dropdown">
                    <a href="<?= site_url('dosen/kelola_antrean') ?>" class="nav-link"><i class="fas fa-user-clock"></i><span>Antrean</span></a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>