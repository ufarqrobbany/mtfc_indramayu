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

    .hover_pesan {
        background-color: #f8f9fa;
        transition: .2s;
    }

    .hover_pesan:hover {
        background-color: white;
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
                <a href="#" class="btn btn-danger d-block" data-toggle="modal" data-target="#modal-hapus-pesan">
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
                                    <th class="text-center" style="width:4%">No</th>
                                    <th class="text-center" style="width:17%">Tanggal</th>
                                    <th style="width:20%">Nama</th>
                                    <th style="width:20%">Email</th>
                                    <th style="width:30%">Subjek</th>
                                    <th class="text-center" style="width:9%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $awal = ($index == 1) ? 0 : ($index * 10) - 10; ?>
                                <?php $akhir = ($index == 1) ? 9 : ($index * 10) - 10 + 9; ?>
                                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                                    <?php if (isset($pesan[$x])) : ?>
                                        <tr class="<?= $pesan[$x]->dilihat == true ? 'bg-white' : 'hover_pesan' ?>">
                                            <td class="text-center"><?= $x + 1 ?></td>
                                            <td class="text-center"><?= isset($pesan[$x]->waktu) ? tgl_indo($pesan[$x]->waktu) : '-'; ?></td>
                                            <td><?= isset($pesan[$x]->nama) ? $pesan[$x]->nama : '-'; ?></td>
                                            <td><?= isset($pesan[$x]->email) ? $pesan[$x]->email : '-'; ?></td>
                                            <td><?= isset($pesan[$x]->subjek) ? $pesan[$x]->subjek : '-'; ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('/admin/pesan/view/') . $pesan[$x]->id_pesan ?>" class="btn btn-info d-block mr-3">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?= site_url('/admin/pesan/hapus/' . $pesan[$x]->id_pesan) ?>" onclick="isconfirm();" class="btn btn-danger d-block confirmHapus">
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
                            <a href="<?= base_url('admin/pesan/' . strval($index - 1)) ?>" class="btn btn-default <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                            <a href="<?= base_url('admin/pesan/1') ?>" class="btn <?= $index == 1 ? 'btn-primary' : 'btn-default' ?>">1</a>
                            <?php $lengthPesan = count($pesan) ?>
                            <?php $b = 1; ?>
                            <?php for ($a = 2; $a <= $lengthPesan; $a++) : ?>
                                <?php if ($a % 10 == 1) : ?>
                                    <?php $b++ ?>
                                    <a href="<?= base_url('admin/pesan/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-primary' : 'btn-default' ?>"><?= $b ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <a href="<?= base_url('admin/pesan/' . strval($index + 1)) ?>" class="btn btn-default <?= $index == $b ? 'disabled' : '' ?>">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-hapus-pesan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus semua data pesan?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('admin/pesan/hapus_semua') ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>



<?php for ($x = $awal; $x <= $akhir; $x++) : ?>
    <?php if (isset($pesan[$x])) : ?>
        <div class="modal fade" id="fotoModal_<?= $x ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="w-100" style="height: 100px"></div>
                <?= isset($pesan[$x]->thumbnail) ? '<img width="100%" src="' . base_url('upload/image/pesan/') . $pesan[$x]->thumbnail . '" />' : ''; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endfor; ?>

<script>
    function isconfirm() {
        if (!confirm('Hapus data pesan?')) {
            event.preventDefault();
            return;
        }
        return true;
    }
</script>

<?= $this->endSection() ?>