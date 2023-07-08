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
                    <form action="<?= base_url(); ?>admin/kontak/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="card-header row">
                            <div class="col-6">
                                <a href="<?= base_url('/admin/kontak') ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i><span class="ml-2">Kembali</span></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i><span class="ml-2">Simpan</span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="telepon" class="form-control" placeholder="+62" value="<?= (isset($kontak->telepon)) ? $kontak->telepon : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="info@example.com" value="<?= (isset($kontak->email)) ? $kontak->email : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Facebook Url</label>
                                <input type="url" name="fb_url" class="form-control" placeholder="https://www.facebook.com/....." value="<?= (isset($kontak->fb_url)) ? $kontak->fb_url : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Instagram Url</label>
                                <input type="url" name="ig_url" class="form-control" placeholder="https://www.instagram.com/....." value="<?= (isset($kontak->ig_url)) ? $kontak->ig_url : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control"><?= (isset($kontak->alamat)) ? $kontak->alamat : '' ?>"</textarea>
                            </div>
                            <div class="form-group">
                                <label>Embed Link Google Map</label>
                                <input type="url" name="embed_map" class="form-control" placeholder="https://www.google.com/maps/embed?....." value="<?= (isset($kontak->embed_map)) ? $kontak->embed_map : '' ?>">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>