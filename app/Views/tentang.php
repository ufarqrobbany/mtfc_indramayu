<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<style>
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

    .logo_tentang {
        width: 350px;
    }

    .judul_section {
        margin-bottom: 48px;
    }

    .button_semua {
        margin-top: 48px;
    }

    .container_custom {
        margin-top: 48px;
        margin-bottom: 48px;
    }

    @media only screen and (max-width: 991px) {
        .tim_card {
            width: 48%;
        }

        .tentang_text {
            width: 100%;
            font-size: 1rem;
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

        .logo_tentang {
            width: 200px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .tim_body {
            padding: 12px;
        }

        .tim_jabatan {
            font-size: .875rem;
        }

        .button_semua {
            margin-top: 24px;
        }

        .button_semua_text {
            font-size: 0.925rem;
        }

        .container_custom {
            margin-top: 36px;
            margin-bottom: 36px;
        }
    }
</style>

<div class="container container_custom">
    <div class="mb-5">
        <h1 class="text-center">Tentang Kami</h1>
        <p class="text-center tentang_text mx-auto mt-4" style="opacity:0.8;">
            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
        </p>
        <img src="<?= base_url('assets/logo_t.png') ?>" class="mx-auto d-block logo_tentang" />
    </div>

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
            <div class="button_semua text-center w-100">
                <!-- <a href="<?= base_url('tim/1') ?>" style="transition: 0.2s;" class="fs-5 fw-semibold link-opacity-100-hover link-underline-opacity-0 link-underline link-danger">Lihat semua anggota tim</a> -->
                <a href="<?= base_url('tim/1') ?>" style="transition: 0.2s;" class="btn btn-danger d-inline-block px-3 py-2 button_semua_text">Lihat semua anggota tim</a>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>