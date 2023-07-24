<?= $this->extend('admin/layout/index.php') ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= isset($title) ? $title : '' ?></h1>
            </div>
            <div class="col-sm-6 d-flex row justify-content-end">
                <a href="<?= base_url('/admin/tentang/edit') ?>" class="btn btn-warning d-block mr-3">
                    <i class="fas fa-pen"></i><span class="ml-2">Edit</span>
                </a>

                <a href="#" class="btn btn-danger d-block" data-toggle="modal" data-target="#modal-hapus-tentang">
                    <i class="fas fa-trash"></i><span class="ml-2">Hapus</span>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= (session()->getFlashdata('success')) ? '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            ' . session()->getFlashdata('success') . '
        </div>
        ' : '' ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tentang</th>
                                    <th>Footer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= isset($tentangData->tentang) ? $tentangData->tentang : '-'; ?>
                                    </td>
                                    <td><?= isset($tentangData->footer) ? $tentangData->footer : '-'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-hapus-tentang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Tentang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data tentang?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/tentang/hapus') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>