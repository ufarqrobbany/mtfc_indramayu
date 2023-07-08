<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
        <img src="<?= base_url(); ?>/assets/logo_t.png" class="brand-image img-circle elevation-3 bg-white p-1 mr-3" alt="MTFC Logo">
        <span class="brand-text font-weight-light"><?= session()->get('nama'); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($title == 'Dashboard') ? 'active bg-danger' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Upload -->
                <li class="nav-header">Upload</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/berita/1') ?>" class="nav-link <?= ($title == 'Berita' || $title == 'Edit Berita' || $title == 'Tambah Berita') ? 'active bg-danger' : '' ?>">
                        <i class="fas nav-icon fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/galeri/1') ?>" class="nav-link <?= ($title == 'Galeri' || $title == 'Edit Galeri' || $title == 'Tambah Galeri') ? 'active bg-danger' : '' ?>">
                        <i class="fas fa-image nav-icon"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>

                <!-- Pesan -->
                <li class="nav-header">Pesan</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pesan/1') ?>" class="nav-link <?= ($title == 'Pesan' || $title == 'Lihat Pesan') ? 'active bg-danger' : '' ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Kotak Masuk
                        </p>
                        <?= count($pesan_notif) != 0 ? '<small class="bg-danger rounded-circle d-inline-block text-center" style="padding: 4px 10px; float: right;">' . count($pesan_notif) . '</small>' : ''; ?>
                    </a>
                </li>

                <!-- Kustom Web -->
                <li class="nav-header">Data</li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/tim/1') ?>" class="nav-link <?= ($title == 'Tim' || $title == 'Edit Anggota Tim' || $title == 'Tambah Anggota Tim' || $title == 'Sematkan Anggota Tim') ? 'active bg-danger' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tim
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/kontak') ?>" class="nav-link <?= ($title == 'Kontak' || $title == 'Edit Kontak') ? 'active bg-danger' : '' ?>">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Kontak
                        </p>
                    </a>
                </li>

                <!-- Akun -->
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-default">
                        <i class="fas nav-icon fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk keluar?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/logout') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>