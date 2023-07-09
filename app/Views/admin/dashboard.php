<?= $this->extend('admin/layout/index.php') ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= isset($title) ? $title : '' ?></h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Berita -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= ($berita) ? count($berita) : '0' ?></h3>

                        <p>Berita</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <a href="<?= base_url('admin/berita/1') ?>" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= ($galeri) ? count($galeri) : '0' ?></h3>

                        <p>Galeri</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <a href="<?= base_url('admin/galeri/1') ?>" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= ($tim) ? count($tim) : '0' ?></h3>

                        <p>Tim</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('admin/tim/1') ?>" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <h5 class="mb-2">Pesan & Komentar</h5>

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= ($pesan) ? count($pesan) : '0' ?></h3>

                        <p>Pesan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="<?= base_url('admin/pesan/1') ?>" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= ($komentar) ? count($komentar) + count($subkomentar) : '0' ?></h3>

                        <p>Komentar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-comment"></i>
                    </div>
                    <a href="<?= base_url('admin/komentar/1') ?>" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <h5 class="mb-2">Data</h5>

        <?php
        $persenKontak = 0;
        $jml = 0;
        if ($kontak->telepon != NULL) $jml++;
        if ($kontak->email != NULL) $jml++;
        if ($kontak->fb_url != NULL) $jml++;
        if ($kontak->ig_url != NULL) $jml++;
        if ($kontak->alamat != NULL) $jml++;
        if ($kontak->embed_map != NULL) $jml++;
        $persenKontak = round(16.6 * $jml);
        ?>

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="info-box bg-white">
                    <span class="info-box-icon"><i class="fas fa-address-book text-danger"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kontak</span>
                        <span class="info-box-number text-danger"><?= $persenKontak ?>%</span>

                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: <?= $persenKontak ?>%"></div>
                        </div>
                        <span class="progress-description" style="font-size: .875rem">
                            <?= $persenKontak == 100 ? 'Data lengkap' : 'Mohon lengkapi data kontak' ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>