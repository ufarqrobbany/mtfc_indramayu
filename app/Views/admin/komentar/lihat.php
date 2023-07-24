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

    .hover_komentar {
        background-color: #f8f9fa;
        transition: .2s;
    }

    .hover_komentar:hover {
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
                <a href="#" class="btn btn-success d-block" data-toggle="modal" data-target="#modal-tambah-komen">
                    <i class="fas fa-plus"></i><span class="ml-2">Tambah Komentar</span>
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
                    <div class="card-header bg-dark">
                        <h4 class="mt-2"><?= $berita[0]->judul; ?></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:15%">Waktu</th>
                                    <th class="text-center" style="width:20%">Nama</th>
                                    <th style="width:35%">Komentar</th>
                                    <th class="text-center" style="width:5%">Balasan</th>
                                    <th class="text-center" style="width:10%">Balasan Baru</th>
                                    <th class="text-center" style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $awal = ($index == 1) ? 0 : ($index * 10) - 10; ?>
                                <?php $akhir = ($index == 1) ? 9 : ($index * 10) - 10 + 9; ?>
                                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                                    <?php if (isset($komentar[$x])) : ?>
                                        <?php
                                        $db      = \Config\Database::connect();
                                        $subkom = $db->table('subkomentar_berita')->select('subkomentar_berita.*')->join('komentar_berita', 'komentar_berita.id_komentar = subkomentar_berita.id_komentar')->where('subkomentar_berita.id_komentar', $komentar[$x]->id_komentar)->orderBy("waktu", "asc");
                                        $jml_subkomentar = $subkom->get()->getResult();

                                        $subkom_lihat = $db->table('subkomentar_berita')->select('subkomentar_berita.*')->join('komentar_berita', 'komentar_berita.id_komentar = subkomentar_berita.id_komentar')->where('subkomentar_berita.id_komentar', $komentar[$x]->id_komentar)->where('subkomentar_berita.dilihat', 0)->orderBy("waktu", "asc");
                                        $jml_subkomentar_lihat = $subkom_lihat->get()->getResult();

                                        $update = $db->table('komentar_berita')->where('id_komentar', $komentar[$x]->id_komentar)->update(['dilihat' => 1]);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $x + 1 ?></td>
                                            <td class="text-center"><?= tgl_indo($komentar[$x]->waktu) ?></td>
                                            <td class="text-center"><?= $komentar[$x]->nama ?><?= $komentar[$x]->foto != NULL ? '<span class="bg-danger text-white rounded px-2 py-1 d-inline-block ml-2" style="font-size: .7rem">admin</span>' : '' ?></td>
                                            <td><?= $komentar[$x]->komentar ?></td>
                                            <td class="text-center"><?= count($jml_subkomentar) ?></td>
                                            <td class="text-center"><?= count($jml_subkomentar_lihat) != 0 ? '<span class="bg-danger rounded-circle d-inline-block px-2 py-1">' . count($jml_subkomentar_lihat) . '</span>' : '0'; ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('/admin/komentar/lihat_balasan/') . $komentar[$x]->id_komentar ?>" class="btn btn-info d-block mr-3">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?= site_url('/admin/komentar/hapus_ini/') . $komentar[$x]->id_komentar ?>" onclick="isconfirm();" class="btn btn-danger d-block confirmHapus">
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
                            <a href="<?= base_url('admin/komentar/lihat/' . $berita[0]->id_berita . '/' . strval($index - 1)) ?>" class="btn btn-default <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                            <a href="<?= base_url('admin/komentar/lihat/' . $berita[0]->id_berita . '/1') ?>" class="btn <?= $index == 1 ? 'btn-primary' : 'btn-default' ?>">1</a>
                            <?php $lengthPesan = count($komentar) ?>
                            <?php $b = 1; ?>
                            <?php for ($a = 2; $a <= $lengthPesan; $a++) : ?>
                                <?php if ($a % 10 == 1) : ?>
                                    <?php $b++ ?>
                                    <a href="<?= base_url('admin/komentar/lihat/' . $berita[0]->id_berita . '/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-primary' : 'btn-default' ?>"><?= $b ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <a href="<?= base_url('admin/komentar/lihat/' . $berita[0]->id_berita . '/' . strval($index + 1)) ?>" class="btn btn-default <?= $index == $b ? 'disabled' : '' ?>">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-tambah-komen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Komentar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('komentar/add') ?>" method="post" class="d-flex flex-column row-gap-3">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_berita" value="<?= $berita[0]->id_berita ?>" />
                    <input type="hidden" name="foto" value="1" />
                    <input type="hidden" name="nama" value="MTFC Admin" />
                    <div>
                        <label for="komentar" class="form-label">Komentar : </label>
                        <textarea class="form-control" id="komentar" name="komentar" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mt-4">Tambah Komentar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function isconfirm() {
        if (!confirm('Hapus komentar ini?')) {
            event.preventDefault();
            return;
        }
        return true;
    }
</script>

<?= $this->endSection() ?>