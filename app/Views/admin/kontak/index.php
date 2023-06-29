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
                <a href="<?= base_url('/admin/kontak/edit') ?>" class="btn btn-warning d-block mr-3">
                    <i class="fas fa-pen"></i><span class="ml-2">Edit</span>
                </a>

                <a href="#" class="btn btn-danger d-block" data-toggle="modal" data-target="#modal-hapus-kontak">
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
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Google Map</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= isset($kontak->telepon) ? $kontak->telepon : '-'; ?>
                                    </td>
                                    <td><?= isset($kontak->email) ? $kontak->email : '-'; ?></td>
                                    <td><?= isset($kontak->fb_url) ? '<a href="' . $kontak->fb_url . '">' . $kontak->fb_url . '</a>' : '-'; ?></td>
                                    <td><?= isset($kontak->ig_url) ? '<a href="' . $kontak->ig_url . '">' . $kontak->ig_url . '</a>' : '-'; ?></td>
                                    <td><?= isset($kontak->alamat) ? $kontak->alamat : '-'; ?></td>
                                    <td>
                                        <?= isset($kontak->embed_map) ? '
                                        <iframe src="' . $kontak->embed_map . '" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        ' : '-' ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-hapus-kontak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kontak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data kontak?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/kontak/hapus') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>