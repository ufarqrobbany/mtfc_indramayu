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
                <div class="card card-primary overflow-hidden">
                    <form action="<?= base_url(); ?>admin/berita/save/<?= $berita->id_berita ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-header row">
                            <div class="col-6">
                                <a href="<?= base_url('/admin/berita/1') ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i><span class="ml-2">Kembali</span></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i><span class="ml-2">Simpan</span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="form-group col-6">
                                    <label>Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control" value="<?= $berita->judul ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="exampleInputFile">Thumbnail <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="thumbnail" accept=".jpg, .jpeg, .gif, .png">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="text-danger mt-1"><?= session()->getFlashdata('error') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita <span class="text-danger">*</span></label>
                                <textarea id="summernote" rows="12" name="isi" required><?= $berita->isi ?></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ketentuan upload foto thumbnail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <ol>
                            <li>File extention harus berupa jpg, jpeg, gif, atau png</li>
                            <li>Ukuran file maksimal 5 MB</li>
                        </ol>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>