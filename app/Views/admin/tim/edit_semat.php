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
        <?= (session()->getFlashdata('danger')) ? '
        <div class="alert alert-danger alert-dismissible col-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-times"></i>
            ' . session()->getFlashdata('danger') . '
        </div>
        ' : '' ?>
        <div class="row">
            <div class="col-6">
                <div class="card card-primary overflow-hidden">
                    <form action="<?= base_url(); ?>admin/tim/save_semat" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-header row">
                            <div class="col-6">
                                <a href="<?= base_url('/admin/tim/1') ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i><span class="ml-2">Kembali</span></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i><span class="ml-2">Simpan</span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php for ($x = 0; $x <= 3; $x++) : ?>
                                <div class="form-group">
                                    <label>Anggota <?= $x + 1  ?></label>
                                    <select class="custom-select" name="anggota_<?= $x + 1 ?>">
                                        <option value="0">Tidak dipilih</option>
                                        <?php foreach ($tim as $t) : ?>
                                            <option value="<?= $t->id_tim ?>" <?= (isset($tim_semat[$x])) ? (($t->id_tim == $tim_semat[$x]->id_anggota_tim) ? 'selected' : '') : '' ?>><?= $t->id_tim ?> - <?= $t->nama ?> (<?= $t->jabatan ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>