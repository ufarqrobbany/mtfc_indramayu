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
    .header_image {
        width: 100%;
        aspect-ratio: 2.5/1;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-origin: content-box;
        filter: brightness(75%);
    }

    .container_custom {
        margin-top: 48px;
        margin-bottom: 48px;
    }

    .tim_card {
        width: 18rem;
    }

    .tentang_text {
        width: 50%;
        font-size: 1.25rem;
    }

    .less_four_tim {
        justify-content: center;
        gap: 30px;
    }

    .is_four_tim {
        margin-left: 1.5rem;
        margin-right: 1.5rem;
        justify-content: space-between;
    }

    .galeri_flex {
        row-gap: 30px;
    }

    .galeri_card {
        width: 32%;
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

    .berita_body {
        text-align: center;
    }

    .berita_card_judul {
        font-size: 1.25rem;
    }

    .berita_card_info {
        margin-top: 16px;
    }

    .logo_tentang {
        width: 350px;
    }

    .judul_section {
        margin-bottom: 48px;
    }

    .sub_section {
        margin-top: 48px;
    }

    .button_semua {
        margin-top: 48px;
    }

    .map_frame {
        height: 500px;
    }

    .judul_kontak_list {
        font-size: 1.25rem;
    }

    .isi_kontak_list {
        font-size: 1rem;
    }

    @media only screen and (max-width: 991px) {
        .header_image_container {
            width: 100%;
            aspect-ratio: 2/1;
        }

        .header_image {
            aspect-ratio: 2/1;
            position: absolute;
        }

        .container_custom {
            margin-top: 36px;
            margin-bottom: 36px;
        }

        .tentang_text {
            width: 100%;
            font-size: 1rem;
        }

        .logo_tentang {
            width: 200px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .sub_section {
            margin-top: 36px;
        }

        .tim_body {
            padding: 12px;
        }

        .less_four_tim {
            column-gap: 12px;
            row-gap: 16px;
        }

        .is_four_tim {
            margin-left: 0;
            margin-right: 0;
            column-gap: 12px;
            row-gap: 16px;
        }

        .tim_card {
            width: 48%;
        }

        .tim_jabatan {
            font-size: .875rem;
        }

        .galeri_flex {
            row-gap: 16px;
        }

        .galeri_body {
            padding: 12px;
        }

        .galeri_card {
            width: 100%;
        }

        .ket_galeri {
            font-size: .875rem;
        }

        .berita_card {
            width: 100%;
            display: flex;
            flex-direction: row;
            padding: 12px;
        }

        .berita_picture {
            width: 35%;
            aspect-ratio: 1/1;
            border-radius: .375rem;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .berita_body {
            flex-grow: 1;
            padding: 0;
            text-align: start;
        }

        .berita_card_judul {
            font-size: 1rem;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
        }

        .berita_card_info {
            margin-top: 12px;
            font-size: .750rem;
            flex-direction: column;
            row-gap: 4px;
        }

        .button_semua {
            margin-top: 24px;
        }

        .button_semua_text {
            font-size: 0.925rem;
        }

        .map_frame {
            height: 250px;
        }

        .judul_kontak_list {
            font-size: 1rem;
        }

        .isi_kontak_list {
            font-size: .875rem;
        }

        .pesan {
            margin-top: 50px;
        }
    }
</style>

<div class="bg-black d-flex align-content-stretch header_image_container" style="position: relative; overflow:hidden;">
    <div style="background:linear-gradient(-90deg, rgba(255,255,255,0) 0%, rgba(0,0,0,0.5466561624649859) 23%, rgba(0,0,0,1) 100%); position:absolute; top:0; bottom:0; left:0; width: 35%; z-index:88; opacity:1; filter: blur(100px)">

    </div>
    <div class="container" style="z-index:0;">
        <div class="header_image" style="background-image: url('<?= base_url('upload/image/banner_1.jpg') ?>')"></div>
    </div>
    <div style="background:linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(0,0,0,0.5466561624649859) 23%, rgba(0,0,0,1) 100%); position:absolute; top:0; bottom:0; right:0; width: 35%; z-index:88; opacity:1; filter: blur(100px)">

    </div>
</div>

<div class="container container_custom">
    <!-- Tentang -->
    <div class="mb-5">
        <h1 class="text-center">Tentang Kami</h1>
        <p class="text-center tentang_text mx-auto mt-4" style="opacity:0.8;">
            <?php
            $db      = \Config\Database::connect();
            $tentangData = $db->table('tentang')->get()->getFirstRow();
            ?>
            <?= (isset($tentangData) && ($tentangData->tentang != NULL)) ? $tentangData->tentang : 'Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.' ?> </p>
        <img src="<?= base_url('assets/logo_t.png') ?>" class="mx-auto d-block logo_tentang" />
    </div>

    <!-- Tim -->
    <?php if (count($tim) != 0) : ?>
        <div class="w-75 bg-dark mb-5 mx-auto" style="height:1px; opacity:0.3;"></div>

        <div class="mb-5">
            <h1 class="text-center judul_section">Tim Kami</h1>
            <div class="d-flex flex-wrap column <?= count($tim) < 4 ? 'less_four_tim' : 'is_four_tim' ?>">
                <?php $semat_jml = count($tim_semat) ?>

                <?php foreach ($tim_semat as $ts) : ?>
                    <div class="card overflow-hidden tim_card">
                        <div style="background-image: url(<?= base_url('upload/image/tim/') . $ts->foto ?>);" class="tim_picture"></div>
                        <div class="card-body text-center tim_body">
                            <h5 class="card-title fs-6"><?= $ts->nama ?></h5>
                            <p class="card-text tim_jabatan"><?= $ts->jabatan ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($semat_jml < 4) : ?>

                    <?php for ($x = 0; $x <= (3 - $semat_jml); $x++) : ?>
                        <?php if (isset($tim[$x])) : ?>
                            <div class="card overflow-hidden tim_card">
                                <div style="background-image: url(<?= base_url('upload/image/tim/') . $tim[$x]->foto ?>);" class="tim_picture"></div>
                                <div class="card-body text-center tim_body">
                                    <h5 class="card-title fs-6"><?= $tim[$x]->nama ?></h5>
                                    <p class="card-text tim_jabatan"><?= $tim[$x]->jabatan ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                <?php endif; ?>
            </div>
            <div class="text-center w-100 button_semua">
                <a href="<?= base_url('tim/1') ?>" style="transition: 0.2s;" class="btn btn-danger d-inline-block px-3 py-2 button_semua_text">Lihat semua anggota tim</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Galeri -->
    <?php if (count($galeri) != 0) : ?>
        <div class="w-75 bg-dark mb-5 mx-auto" style="height:1px; opacity:0.3;"></div>
        <div class="mb-5">
            <h1 class="text-center judul_section">Galeri</h1>
            <div class="d-flex flex-wrap column justify-content-center galeri_flex" style="column-gap:2%;">
                <?php for ($x = 0; $x <= 5; $x++) : ?>
                    <?php if (isset($galeri[$x])) : ?>
                        <div class="card overflow-hidden galeri_card">
                            <div style="background-image: url(<?= base_url('upload/image/galeri/') . $galeri[$x]->foto ?>);" class="galeri_picture" data-bs-toggle="modal" data-bs-target="#fotoModal_<?= $x ?>"></div>
                            <div class="card-body text-center galeri_body">
                                <p class="card-text ket_galeri"><?= isset($galeri[$x]->keterangan) ? $galeri[$x]->keterangan : '-'; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="text-center w-100 button_semua">
                <a href="<?= base_url('galeri/1') ?>" style="transition: 0.2s;" class="btn btn-danger d-inline-block px-3 py-2 button_semua_text">Lihat semua foto galeri</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Berita -->
    <?php if (count($berita) != 0) : ?>
        <div class="w-75 bg-dark mb-5 mx-auto" style="height:1px; opacity:0.3;"></div>
        <div class="mb-5">
            <h1 class="text-center judul_section">Berita</h1>
            <div class="d-flex flex-wrap column justify-content-center galeri_flex" style="column-gap: 2%;">
                <?php for ($x = 0; $x <= 5; $x++) : ?>
                    <?php if (isset($berita[$x])) : ?>
                        <a href="<?= base_url('berita/view/' . $berita[$x]->slug . '/1') ?>" class="card overflow-hidden berita_card">
                            <div style="background-image: url(<?= base_url('upload/image/berita/') . $berita[$x]->thumbnail ?>);" class="berita_picture"></div>
                            <div class="card-body d-flex flex-column justify-content-between berita_body">
                                <div class="fw-semibold text-danger berita_card_judul"><?= isset($berita[$x]->judul) ? $berita[$x]->judul : '-'; ?></div>
                                <small class="d-flex justify-content-between berita_card_info">
                                    <div class="text-truncate">
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
            <div class="text-center w-100 button_semua">
                <a href="<?= base_url('berita/1') ?>" style="transition: 0.2s;" class="btn btn-danger d-inline-block px-3 py-2 button_semua_text">Lihat semua berita</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="w-75 bg-dark mb-5 mx-auto" style="height:1px; opacity:0.3;"></div>

    <div class="mb-5">
        <h1 class="text-center judul_section">Kontak</h1>
        <div class="row">
            <div class="col-12">
                <?= isset($kontak->embed_map) ? '
                    <iframe src="' . $kontak->embed_map . '" width="100%" class="map_frame" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    ' : '-' ?>
            </div>
            <div class="col-12">
                <div class="row sub_section">
                    <div class="col-lg-6 col-12 d-flex row row-gap-4 align-content-start">
                        <div class="d-flex align-items-center column-gap-4">
                            <div><i class="fa-solid fa-map fs-2 text-danger"></i></div>
                            <div>
                                <div class="fw-semibold judul_kontak_list">Lokasi : </div>
                                <div class="isi_kontak_list"><?= isset($kontak->alamat) ? $kontak->alamat  : '-' ?></div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center column-gap-4">
                            <div><i class="fa-solid fa-envelope fs-2 text-danger"></i></div>
                            <div>
                                <div class="fw-semibold judul_kontak_list">Email : </div>
                                <div class="isi_kontak_list"><?= isset($kontak->email) ? $kontak->email  : '-' ?></div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center column-gap-4">
                            <div><i class="fa-solid fa-phone fs-2 text-danger"></i></div>
                            <div>
                                <div class="fw-semibold judul_kontak_list">Telepon : </div>
                                <div class="isi_kontak_list"><?= isset($kontak->telepon) ? $kontak->telepon  : '-' ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 pesan">
                        <form class="row g-3" action="<?= base_url('pesan/add') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-12">
                                <label for="subjek" class="form-label">Subjek</label>
                                <input type="text" class="form-control" id="subjek" name="subjek" required>
                            </div>

                            <div class="col-md-12">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesan" rows="5" name="pesan" required></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-danger w-100" type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php for ($x = 0; $x <= 5; $x++) : ?>
    <?php if (isset($galeri[$x])) : ?>
        <div class="modal fade" id="fotoModal_<?= $x ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="w-100" style="height: 100px"></div>
                <?= isset($galeri[$x]->foto) ? '<img width="100%" src="' . base_url('upload/image/galeri/') . $galeri[$x]->foto . '" />' : ''; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endfor; ?>

<?= $this->endSection() ?>