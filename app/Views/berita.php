<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

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

    $hasil = $hari_ini . ', ' . $date . ', ' . $time . ' WIB';

    return $hasil;
}
?>

<style>
    .container_custom {
        margin-top: 48px;
        margin-bottom: 48px;
    }

    .judul_section {
        margin-bottom: 48px;
    }

    .berita_flex {
        row-gap: 30px;
    }

    .berita_card {
        width: 32%;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .berita_card:hover {
        transform: scale(1.05);
    }

    .berita_judul {
        font-size: 1.25rem;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
    }

    @media only screen and (max-width: 991px) {
        .container_custom {
            margin-top: 36px;
            margin-bottom: 48px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .berita_flex {
            row-gap: 16px;
        }

        .berita_card {
            width: 100%;
        }

        .berita_body {
            padding: 12px;
        }

        .berita_judul {
            font-size: 1rem;
        }

        .berita_info {
            font-size: .750rem;
        }
    }
</style>

<div class="container container_custom">
    <!-- Galeri -->
    <div>
        <h1 class="text-center judul_section">Berita</h1>
        <?php $awal = ($index == 1) ? 0 : ($index * 6) - 6; ?>
        <?php $akhir = ($index == 1) ? 5 : ($index * 6) - 6 + 5; ?>
        <?php if (count($berita) == 0) : ?>
            <div class="text-center my-5">Tidak ada berita</div>
        <?php else : ?>
            <div class="d-flex flex-wrap column justify-content-start berita_flex" style="column-gap: 2%;">
                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                    <?php if (isset($berita[$x])) : ?>
                        <a href="<?= base_url('berita/view/' . $berita[$x]->slug . '/1') ?>" class="card overflow-hidden berita_card">
                            <div style="background-image: url(<?= base_url('upload/image/berita/') . $berita[$x]->thumbnail ?>);" class="berita_picture"></div>
                            <div class="card-body text-center d-flex flex-column justify-content-between berita_body">
                                <div class="fw-semibold text-danger berita_judul"><?= isset($berita[$x]->judul) ? $berita[$x]->judul : '-'; ?></div>
                                <small class="d-flex justify-content-between mt-3 berita_info">
                                    <div>
                                        <i class="fas fa-calendar text-secondary me-1"></i>
                                        <span><?= isset($berita[$x]->tgl_diupdate) ? tgl_indo($berita[$x]->tgl_diupdate) : '-'; ?></span>
                                    </div>
                                    <div class="d-flex column-gap-3">
                                        <div>
                                            <i class="fas fa-eye text-secondary me-1"></i><?= count($view->where('view_berita.id_berita', $berita[$x]->id_berita)->get()->getResult()) ?>
                                        </div>
                                        <div>
                                            <?php
                                            $db      = \Config\Database::connect();
                                            $builder = $db->table('subkomentar_berita')->select('subkomentar_berita.*')->join('berita', 'berita.id_berita = subkomentar_berita.id_berita')->where('subkomentar_berita.id_berita', $berita[$x]->id_berita)->orderBy("waktu", "asc");
                                            $subkomen = $builder->get()->getResult();
                                            ?>
                                            <i class="fas fa-comment text-secondary me-1"></i>
                                            <?= count($komentar->where('komentar_berita.id_berita', $berita[$x]->id_berita)->get()->getResult()) + count($subkomen) ?>
                                        </div>
                                    </div>
                                </small>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center mt-4">
            <div class="mt-4 btn-group">
                <a href="<?= base_url('berita/' . strval($index - 1)) ?>" class="btn btn-light <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                <a href="<?= base_url('berita/1') ?>" class="btn <?= $index == 1 ? 'btn-danger' : 'btn-light' ?>">1</a>
                <?php $lengthGaleri = count($berita) ?>
                <?php $b = 1; ?>
                <?php for ($a = 2; $a <= $lengthGaleri; $a++) : ?>
                    <?php if ($a % 6 == 1) : ?>
                        <?php $b++ ?>
                        <a href="<?= base_url('berita/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-danger' : 'btn-light' ?>"><?= $b ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <a href="<?= base_url('berita/' . strval($index + 1)) ?>" class="btn btn-light <?= $index == $b ? 'disabled' : '' ?>">Next</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>