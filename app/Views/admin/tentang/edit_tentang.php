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
            <div class="col-6">
                <div class="card card-primary overflow-hidden">
                    <form action="<?= base_url(); ?>admin/tentang/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="card-header row">
                            <div class="col-6">
                                <a href="<?= base_url('/admin/tentang') ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i><span class="ml-2">Kembali</span></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i><span class="ml-2">Simpan</span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea name="tentang" class="form-control"><?= (isset($tentangData->tentang)) ? $tentangData->tentang : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Footer</label>
                                <textarea name="footer" class="form-control"><?= (isset($tentangData->footer)) ? $tentangData->footer : '' ?></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>