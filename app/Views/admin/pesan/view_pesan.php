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
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-header row">
                        <div class="col-6">
                            <a href="<?= base_url('/admin/pesan/1') ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i><span class="ml-2">Kembali</span></a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('/admin/pesan/hapus/' . $pesan->id_pesan) ?>" class="btn btn-danger float-right"><i class="fas fa-trash"></i><span class="ml-2">Hapus</span></a>
                        </div>
                    </div>
                    <div class="card-body py-2 px-3">
                        <div class="mailbox-read-info">
                            <h4><?= isset($pesan->subjek) ? $pesan->subjek : '-' ?></h4>
                            <div>Dari: <?= isset($pesan->nama) ? $pesan->nama . ' - ' : ' - ' ?><?= isset($pesan->email) ? $pesan->email : ' - ' ?>
                                <span class="mailbox-read-time float-right"><?= isset($pesan->waktu) ? $pesan->waktu : '-' ?></span>
                            </div>
                        </div>
                        <div class="mailbox-read-message">
                            <?= isset($pesan->pesan) ? $pesan->pesan : '-' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>