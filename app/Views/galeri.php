<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<style>
    .container_custom {
        margin-top: 48px;
        margin-bottom: 48px;
    }

    .judul_section {
        margin-bottom: 48px;
    }

    .galeri_flex {
        row-gap: 30px;
    }

    .galeri_card {
        width: 48%;
    }

    @media only screen and (max-width: 991px) {
        .container_custom {
            margin-top: 36px;
            margin-bottom: 36px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .galeri_flex {
            row-gap: 16px;
        }

        .galeri_card {
            width: 100%;
        }

        .galeri_body {
            padding: 12px;
        }

        .galeri_text {
            font-size: .875rem;
        }
    }
</style>

<div class="container container_custom">
    <!-- Galeri -->
    <div>
        <h1 class="text-center judul_section">Galeri</h1>
        <?php $awal = ($index == 1) ? 0 : ($index * 6) - 6; ?>
        <?php $akhir = ($index == 1) ? 5 : ($index * 6) - 6 + 5; ?>
        <?php if (count($galeri) == 0) : ?>
            <div class="text-center my-5">Tidak ada foto</div>
        <?php else : ?>
            <div class="d-flex flex-wrap column justify-content-between galeri_flex">
                <?php for ($x = $awal; $x <= $akhir; $x++) : ?>
                    <?php if (isset($galeri[$x])) : ?>
                        <div class="card overflow-hidden galeri_card">
                            <div style="background-image: url(<?= base_url('upload/image/galeri/') . $galeri[$x]->foto ?>);" class="galeri_picture" data-bs-toggle="modal" data-bs-target="#fotoModal_<?= $x ?>"></div>
                            <div class="card-body text-center galeri_body">
                                <p class="card-text galeri_text"><?= isset($galeri[$x]->keterangan) ? $galeri[$x]->keterangan : '-'; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center mt-4">
            <div class="mt-4 btn-group">
                <a href="<?= base_url('galeri/' . strval($index - 1)) ?>" class="btn btn-light <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                <a href="<?= base_url('galeri/1') ?>" class="btn <?= $index == 1 ? 'btn-danger' : 'btn-light' ?>">1</a>
                <?php $lengthGaleri = count($galeri) ?>
                <?php $b = 1; ?>
                <?php for ($a = 2; $a <= $lengthGaleri; $a++) : ?>
                    <?php if ($a % 6 == 1) : ?>
                        <?php $b++ ?>
                        <a href="<?= base_url('galeri/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-danger' : 'btn-light' ?>"><?= $b ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <a href="<?= base_url('galeri/' . strval($index + 1)) ?>" class="btn btn-light <?= $index == $b ? 'disabled' : '' ?>">Next</a>
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

<?= $this->endSection() ?>