<?= $this->extend('admin/layout/index.php') ?>

<?= $this->section('content') ?>

<style>
    .image_link {
        cursor: pointer;
        transition: 0.2s;
    }

    .image_link:hover {
        transform: scale(1.2);
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="col-6">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= isset($title) ? $title : '' ?></h1>
            </div>
            <div class="col-sm-6 d-flex row justify-content-end">
                <a href="<?= base_url('/admin/galeri/tambah') ?>" class="btn btn-success d-block mr-3">
                    <i class="fas fa-plus"></i><span class="ml-2">Tambah</span>
                </a>

                <a href="#" class="btn btn-danger d-block" data-toggle="modal" data-target="#modal-hapus-galeri">
                    <i class="fas fa-trash"></i><span class="ml-2">Hapus Semua</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= (session()->getFlashdata('success')) ? '
        <div class="alert alert-success alert-dismissible col-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            ' . session()->getFlashdata('success') . '
        </div>
        ' : '' ?>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:25%">Foto</th>
                                    <th style="width:40%">Keterangan</th>
                                    <th class="text-center" style="width:15%">Tgl Upload</th>
                                    <th class="text-center" style="width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $awal = ($index == 1) ? 0 : ($index * 5) - 5; ?>
                                <?php $akhir = ($index == 1) ? 4 : ($index * 5) - 5 + 4; ?>
                                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                                    <?php if (isset($galeri[$x])) : ?>
                                        <tr>
                                            <td class="text-center"><?= $x + 1 ?></td>
                                            <td class="text-center"><?= isset($galeri[$x]->foto) ? '<img class="image_link" width="100%" src="' . base_url('upload/image/galeri/') . $galeri[$x]->foto . '" data-toggle="modal" data-target="#fotoModal_' . $x . '" />' : '-'; ?></td>
                                            <td><?= isset($galeri[$x]->keterangan) ? $galeri[$x]->keterangan : '-'; ?></td>
                                            <td class="text-center"><?= isset($galeri[$x]->tgl_upload) ? $galeri[$x]->tgl_upload : '-'; ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('/admin/galeri/edit/') . $galeri[$x]->id_galeri ?>" class="btn btn-warning d-block mr-3">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?= site_url('/admin/galeri/hapus/' . $galeri[$x]->id_galeri) ?>" onclick="isconfirm();" class="btn btn-danger d-block confirmHapus">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                        <div class="mt-3 btn-group float-right">
                            <a href="<?= base_url('admin/galeri/' . strval($index - 1)) ?>" class="btn btn-default <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                            <a href="<?= base_url('admin/galeri/1') ?>" class="btn <?= $index == 1 ? 'btn-primary' : 'btn-default' ?>">1</a>
                            <?php $lengthGaleri = count($galeri) ?>
                            <?php $b = 1; ?>
                            <?php for ($a = 2; $a <= $lengthGaleri; $a++) : ?>
                                <?php if ($a % 5 == 1) : ?>
                                    <?php $b++ ?>
                                    <a href="<?= base_url('admin/galeri/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-primary' : 'btn-default' ?>"><?= $b ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <a href="<?= base_url('admin/galeri/' . strval($index + 1)) ?>" class="btn btn-default <?= $index == $b ? 'disabled' : '' ?>">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-hapus-galeri">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus semua data galeri?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/galeri/hapus_semua') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>



<?php for ($x = $awal; $x <= $akhir; $x++) : ?>
    <?php if (isset($galeri[$x])) : ?>
        <div class="modal fade" id="fotoModal_<?= $x ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="w-100" style="height: 100px"></div>
                <?= isset($galeri[$x]->foto) ? '<img width="100%" src="' . base_url('upload/image/galeri/') . $galeri[$x]->foto . '" />' : ''; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endfor; ?>

<script>
    function isconfirm() {
        if (!confirm('Hapus data galeri?')) {
            event.preventDefault();
            return;
        }
        return true;
    }
</script>

<?= $this->endSection() ?>