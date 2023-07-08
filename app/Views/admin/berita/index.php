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

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode(' ', $tanggal);

    $dateArray = explode('-', $pecahkan[0]);
    $date = $dateArray[2] . ' ' . $bulan[(int)$dateArray[1]] . ' ' . $dateArray[0];

    $dt = new DateTime($pecahkan[0]);
    $day = $dt->format('D');

    switch ($day) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    $timeArray = explode(':', $pecahkan[1]);
    $time = $timeArray[0] . ':' . $timeArray[1];

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $hari_ini . ', ' . $date . ' - ' . $time;
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= isset($title) ? $title : '' ?></h1>
            </div>
            <div class="col-sm-6 d-flex row justify-content-end">
                <a href="<?= base_url('/admin/berita/tambah') ?>" class="btn btn-success d-block mr-3">
                    <i class="fas fa-plus"></i><span class="ml-2">Tambah</span>
                </a>

                <a href="#" class="btn btn-danger d-block" data-toggle="modal" data-target="#modal-hapus-berita">
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
        <div class="alert alert-success alert-dismissible col-12">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            ' . session()->getFlashdata('success') . '
        </div>
        ' : '' ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:10%">Thumbnail</th>
                                    <th style="width:25%">Judul</th>
                                    <th class="text-center" style="width:15%">Tgl Dibuat</th>
                                    <th class="text-center" style="width:15%">Tgl Diupdate</th>
                                    <th class="text-center" style="width:10%">Jumlah Dilihat</th>
                                    <th class="text-center" style="width:10%">Komentar</th>
                                    <th class="text-center" style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $awal = ($index == 1) ? 0 : ($index * 5) - 5; ?>
                                <?php $akhir = ($index == 1) ? 4 : ($index * 5) - 5 + 4; ?>
                                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                                    <?php if (isset($berita[$x])) : ?>
                                        <tr>
                                            <td class="text-center"><?= $x + 1 ?></td>
                                            <td class="text-center"><?= isset($berita[$x]->thumbnail) ? '<img class="image_link" width="100%" src="' . base_url('upload/image/berita/') . $berita[$x]->thumbnail . '" data-toggle="modal" data-target="#fotoModal_' . $x . '" />' : '-'; ?></td>
                                            <td><?= isset($berita[$x]->judul) ? $berita[$x]->judul : '-'; ?></td>
                                            <td class="text-center"><?= isset($berita[$x]->tgl_dibuat) ? tgl_indo($berita[$x]->tgl_dibuat) : '-'; ?></td>
                                            <td class="text-center"><?= isset($berita[$x]->tgl_diupdate) ? tgl_indo($berita[$x]->tgl_diupdate) : '-'; ?></td>
                                            <td class="text-center"><?= count($view->where('view_berita.id_berita', $berita[$x]->id_berita)->get()->getResult()) ?> kali</td>
                                            <td class="text-center"><?= count($komentar->where('komentar_berita.id_berita', $berita[$x]->id_berita)->get()->getResult()) ?> komentar</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('/admin/berita/edit/') . $berita[$x]->id_berita ?>" class="btn btn-warning d-block mr-3">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?= site_url('/admin/berita/hapus/' . $berita[$x]->id_berita) ?>" onclick="isconfirm();" class="btn btn-danger d-block confirmHapus">
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
                            <a href="<?= base_url('admin/berita/' . strval($index - 1)) ?>" class="btn btn-default <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                            <a href="<?= base_url('admin/berita/1') ?>" class="btn <?= $index == 1 ? 'btn-primary' : 'btn-default' ?>">1</a>
                            <?php $lengthBerita = count($berita) ?>
                            <?php $b = 1; ?>
                            <?php for ($a = 2; $a <= $lengthBerita; $a++) : ?>
                                <?php if ($a % 5 == 1) : ?>
                                    <?php $b++ ?>
                                    <a href="<?= base_url('admin/berita/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-primary' : 'btn-default' ?>"><?= $b ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <a href="<?= base_url('admin/berita/' . strval($index + 1)) ?>" class="btn btn-default <?= $index == $b ? 'disabled' : '' ?>">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-hapus-berita">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus semua data berita?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/berita/hapus_semua') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>



<?php for ($x = $awal; $x <= $akhir; $x++) : ?>
    <?php if (isset($berita[$x])) : ?>
        <div class="modal fade" id="fotoModal_<?= $x ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="w-100" style="height: 100px"></div>
                <?= isset($berita[$x]->thumbnail) ? '<img width="100%" src="' . base_url('upload/image/berita/') . $berita[$x]->thumbnail . '" />' : ''; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endfor; ?>

<script>
    function isconfirm() {
        if (!confirm('Hapus data berita?')) {
            event.preventDefault();
            return;
        }
        return true;
    }
</script>

<?= $this->endSection() ?>