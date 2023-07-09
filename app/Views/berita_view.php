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
    .thumb_image {
        width: 100%;
        aspect-ratio: 2/1;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-origin: content-box;
        filter: brightness(75%);
    }

    .berita_card {
        width: 100%;
        height: 103px;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .berita_card:hover {
        transform: scale(1.05);
    }

    .berita_picture {
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-origin: content-box;
    }

    .main_berita {
        width: 62%;
    }

    .side_berita {
        width: 35%;
    }

    .thumb_mobile {
        display: none;
    }

    .side_berita_divider {
        display: none;
    }

    .text_berita_lainnya {
        margin-top: 24px;
        margin-bottom: 16px;
    }

    .berita_info {
        font-size: 1rem;
        margin-bottom: 48px;
    }

    .title_berita {
        margin-bottom: 48px;
    }

    .judul_berita_lainnya {
        font-size: 1rem;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
    }

    .berita_lainnya_info {
        margin-top: 16px;
    }

    @media only screen and (max-width: 991px) {
        .thumb_image {
            position: absolute;
            left: 0;
            right: 0;
        }

        .thumb_mobile {
            display: block;
            width: 100%;
            aspect-ratio: 2/1;
        }

        .berita_card {
            width: 100%;
        }

        .main_berita {
            width: 100%;
        }

        .side_berita_divider {
            display: block;
        }

        .side_berita {
            width: 100%;
        }

        .text_berita_lainnya {
            text-align: center;
            margin-bottom: 24px;
        }

        .berita_info {
            padding-top: 6px;
            font-size: 0.875rem;
            margin-bottom: 24px;
        }

        .title_berita {
            margin-bottom: 24px;
        }

        .judul_berita_lainnya {
            font-size: 0.875rem;
        }

        .berita_lainnya_info {
            font-size: 0.750rem;
            margin-top: 0;
            flex-direction: column;
            row-gap: 4px;
        }
    }
</style>

<div class="container">
    <div class="mb-5 d-flex justify-content-between flex-wrap">
        <div class="main_berita">
            <div class="thumb_image mb-3" style="background-image: url('<?= base_url('upload/image/berita/') . $berita[0]->thumbnail ?>')"></div>
            <div class="thumb_mobile mb-3"></div>
            <div class="d-flex justify-content-between flex-wrap mt-3 berita_info">
                <div>
                    <i class="fas fa-calendar text-secondary me-2"></i>
                    <span><?= isset($berita[0]->tgl_diupdate) ? tgl_indo($berita[0]->tgl_diupdate) : '-'; ?></span>
                </div>
                <div class="d-flex column-gap-4">
                    <div>
                        <i class="fas fa-eye text-secondary me-2"></i><?= count($view->where('view_berita.id_berita', $berita[0]->id_berita)->get()->getResult()) ?>
                    </div>
                    <div>
                        <i class="fas fa-comment text-secondary me-2"></i>
                        <?= count($komentar->where('komentar_berita.id_berita', $berita[0]->id_berita)->get()->getResult()) + count($subkomentar) ?>
                    </div>
                </div>
            </div>
            <h1 class="text-center title_berita"><?= $berita[0]->judul ?></h1>
            <div>
                <?= $berita[0]->isi ?>
            </div>
        </div>

        <div class="w-100 bg-dark mt-5 mb-2 mx-auto side_berita_divider" style="height:1px; opacity:0.3;"></div>

        <div class="side_berita">
            <div>
                <div class="fw-semibold fs-4 text_berita_lainnya">Berita Lainnya</div>
                <div>
                    <?php for ($x = 0; $x <= 7; $x++) : ?>
                        <?php if (isset($berita_lainnya[$x])) : ?>
                            <a href="<?= base_url('berita/view/' . $berita_lainnya[$x]->slug  . '/1') ?>" class="card overflow-hidden berita_card d-flex flex-row p-2 mb-3">
                                <div class="col-3 me-3">
                                    <div style="background-image: url(<?= base_url('upload/image/berita/') . $berita_lainnya[$x]->thumbnail ?>);" class="berita_picture rounded"></div>
                                </div>
                                <div class="card-body p-0 d-flex flex-column justify-content-between">
                                    <div class="fw-semibold judul_berita_lainnya"><?= isset($berita_lainnya[$x]->judul) ? $berita_lainnya[$x]->judul : '-'; ?></div>
                                    <small class="d-flex justify-content-between berita_lainnya_info flex-wrap">
                                        <div>
                                            <i class="fas fa-calendar text-secondary me-1"></i>
                                            <span><?= isset($berita_lainnya[$x]->tgl_diupdate) ? tgl_indo($berita_lainnya[$x]->tgl_diupdate) : '-'; ?></span>
                                        </div>
                                        <div class="d-flex column-gap-3">
                                            <div>
                                                <i class="fas fa-eye text-secondary me-1"></i><?= count($view->where('view_berita.id_berita', $berita_lainnya[$x]->id_berita)->get()->getResult()) ?>
                                            </div>
                                            <div>
                                                <i class="fas fa-comment text-secondary me-1"></i>
                                                <?= count($komentar->where('komentar_berita.id_berita', $berita_lainnya[$x]->id_berita)->get()->getResult()) + count($subkomentar) ?>
                                            </div>
                                        </div>
                                    </small>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-dark mb-4 mx-auto" style="height:1px; opacity:0.3;"></div>

    <div class="mb-5">
        <div class="fw-semibold fs-4 text-center"><i class="fas fa-comment text-danger me-1" id="komentar"></i> Komentar</div>

        <div class="w-50 mx-auto mt-5">
            <form action="<?= base_url('komentar/add') ?>" method="post" class="d-flex flex-column row-gap-3">
                <?= csrf_field() ?>
                <input type="hidden" name="id_berita" value="<?= $berita[0]->id_berita ?>" />
                <div>
                    <label for="nama" class="form-label">Nama : </label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div>
                    <label for="komentar" class="form-label">Komentar : </label>
                    <textarea class="form-control" id="komentar" name="komentar" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Tambah Komentar</button>
            </form>
        </div>

        <div class="w-50 mt-5 mx-auto">
            <?php $awal = ($index == 1) ? 0 : ($index * 5) - 5; ?>
            <?php $akhir = ($index == 1) ? 4 : ($index * 5) - 5 + 4; ?>
            <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                <?php if (isset($komentar_ini[$x])) : ?>
                    <div class="w-100 py-2 px-4 mb-3 border-bottom">
                        <div class="d-flex column-gap-3 align-items-start">
                            <div class="flex-shrink-0" style="width: 8%;">
                                <?php
                                if ($komentar_ini[$x]->foto != NULL) {
                                    echo '<div class="rounded-circle bg-light komen_picture_admin p-1" style="width: 100%; aspect-ratio: 1/1; background-image: url(\'' . base_url('assets/logo_t.png') . '\')"></div>';
                                } else {
                                    echo '<div class="rounded-circle bg-secondary d-flex justify-content-center align-items-end overflow-hidden fs-1" style="width: 100%; aspect-ratio: 1/1;"><i class="fas fa-user text-light"></i></div>';
                                }
                                ?>
                            </div>
                            <div class="flex-grow-1 d-flex flex-column row-gap-1">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="fw-semibold">
                                        <?= $komentar_ini[$x]->nama ?>
                                        <?= ($komentar_ini[$x]->foto != NULL) ? '<span class="bg-danger text-white rounded px-2 py-1 d-inline-block ms-2" style="font-size: .7rem">admin</span>' : '' ?>
                                    </div>
                                    <small style="opacity: .8;"><?= $komentar_ini[$x]->waktu ?></small>
                                </div>
                                <div style="font-size: .95rem"><?= $komentar_ini[$x]->komentar ?></div>
                            </div>
                        </div>

                        <?php
                        $db      = \Config\Database::connect();
                        $builder = $db->table('subkomentar_berita')->select('subkomentar_berita.*')->join('komentar_berita', 'komentar_berita.id_komentar = subkomentar_berita.id_komentar')->where('subkomentar_berita.id_komentar', $komentar_ini[$x]->id_komentar)->orderBy("subkomentar_berita.waktu", "asc");
                        $subkomen = $builder->get()->getResult();
                        ?>

                        <?php if (count($subkomen) != 0) : ?>
                            <?php $counSub = 1; ?>
                            <div class="d-flex flex-column align-items-end my-2 w-100">
                                <?php foreach ($subkomen as $s) : ?>
                                    <div style="width: 90%;" class="d-flex column-gap-3 align-items-start <?= $counSub == count($subkomen) ? '' : 'border-bottom' ?> px-4 py-3">
                                        <div class="flex-shrink-0" style="width: 8%;">
                                            <?php
                                            if ($s->foto != NULL) {
                                                echo '<div class="rounded-circle bg-light komen_picture_admin p-1" style="width: 100%; aspect-ratio: 1/1; background-image: url(\'' . base_url('assets/logo_t.png') . '\')"></div>';
                                            } else {
                                                echo '<div class="rounded-circle bg-secondary d-flex justify-content-center align-items-end overflow-hidden fs-2" style="width: 100%; aspect-ratio: 1/1;"><i class="fas fa-user text-light"></i></div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="flex-grow-1 d-flex flex-column row-gap-1">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div class="fw-semibold" style="font-size: .95rem">
                                                    <?= $s->nama; ?>
                                                    <?= ($s->foto != NULL) ? '<span class="bg-danger text-white rounded px-2 py-1 d-inline-block ms-2" style="font-size: .6rem">admin</span>' : '' ?>
                                                </div>
                                                <small style="opacity: .8; font-size: .8rem"><?= $s->waktu; ?></small>
                                            </div>
                                            <div style="font-size: .85rem"><?= $s->komentar; ?></div>
                                        </div>
                                    </div>
                                    <?php $counSub++; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="text-end">
                            <small class="link-danger" style="transition: .2s; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#komentar_<?= $komentar_ini[$x]->id_komentar ?>">Balas</small>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <div class="mt-4 btn-group">
                <a href="<?= base_url('berita/view/' . $berita[0]->slug . '/' . strval($index - 1) . '#komentar') ?>" class="btn btn-light <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                <a href="<?= base_url('berita/view/' . $berita[0]->slug . '/1#komentar') ?>" class="btn <?= $index == 1 ? 'btn-danger' : 'btn-light' ?>">1</a>
                <?php $lengthKomentar = count($komentar_ini) ?>
                <?php $b = 1; ?>
                <?php for ($a = 2; $a <= $lengthKomentar; $a++) : ?>
                    <?php if ($a % 5 == 1) : ?>
                        <?php $b++ ?>
                        <a href="<?= base_url('berita/view/' . $berita[0]->slug . '/' . strval($b) . '#komentar') ?>" class="btn <?= $index == $b ? 'btn-danger' : 'btn-light' ?>"><?= $b ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <a href="<?= base_url('berita/view/' . $berita[0]->slug . '/' . strval($index + 1) . '#komentar') ?>" class="btn btn-light <?= $index == $b ? 'disabled' : '' ?>">Next</a>
            </div>
        </div>
    </div>
</div>

<?php for ($x = $awal; $x <= $akhir; $x++) : ?>
    <?php if (isset($komentar_ini[$x])) : ?>
        <div class="modal fade" id="komentar_<?= $komentar_ini[$x]->id_komentar ?>" tabindex="-1" aria-hidden="true">
            <form action="<?= base_url('subkomentar/add') ?>" method="post" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Balas Komentar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column row-gap-3">
                        <small>Balas komentar <?= $komentar_ini[$x]->nama ?></small>
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_komentar" value="<?= $komentar_ini[$x]->id_komentar ?>" />
                        <input type="hidden" name="id_berita" value="<?= $berita[0]->id_berita ?>" />
                        <div>
                            <label for="nama" class="form-label">Nama : </label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div>
                            <label for="komentar" class="form-label">Komentar : </label>
                            <textarea class="form-control" id="komentar" name="komentar" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger px-5">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
<?php endfor; ?>


<?= $this->endSection() ?>