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

    .tim_card {
        width: 23%;
    }

    .tim_container {
        margin-left: 1.5rem;
        margin-right: 1.5rem;
        justify-content: start;
        column-gap: 2%;
        row-gap: 32px;
    }

    @media only screen and (max-width: 991px) {
        .container_custom {
            margin-top: 36px;
            margin-bottom: 36px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .tim_container {
            margin-left: 0;
            margin-right: 0;
            justify-content: space-between;
            row-gap: 16px;
        }

        .tim_card {
            width: 48%;
        }

        .tim_body {
            padding: 12px;
        }

        .tim_jabatan {
            font-size: .875rem;
        }
    }
</style>

<div class="container container_custom">
    <div class="mb-5">
        <h1 class="text-center judul_section">Tim Kami</h1>

        <?php $awal = ($index == 1) ? 0 : ($index * 12) - 12; ?>
        <?php $akhir = ($index == 1) ? 11 : ($index * 12) - 12 + 11; ?>
        <?php $semat_jml = count($tim_semat) ?>

        <div class="d-flex flex-wrap column tim_container">
            <?php if ($index == 1) : ?>
                <?php foreach ($tim_semat as $ts) : ?>
                    <div class="card overflow-hidden tim_card">
                        <div style="background-image: url(<?= base_url('upload/image/tim/') . $ts->foto ?>);" class="tim_picture"></div>
                        <div class="card-body text-center tim_body">
                            <h5 class="card-title fs-6"><?= $ts->nama ?></h5>
                            <p class="card-text tim_jabatan"><?= $ts->jabatan ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php for ($x = $awal; $x <= ($akhir - $semat_jml); $x++) : ?>
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
            <?php else : ?>
                <?php for ($x = ($awal - $semat_jml); $x <= ($akhir - $semat_jml); $x++) : ?>
                    <?php if (isset($tim[$x])) : ?>
                        <div class="card overflow-hidden tim_card">
                            <div style="background-image: url(<?= base_url('upload/image/tim/') . $tim[$x]->foto ?>);" class="tim_picture"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title fs-6"><?= $tim[$x]->nama ?></h5>
                                <p class="card-text"><?= $tim[$x]->jabatan ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <div class="mt-4 btn-group">
                <a href="<?= base_url('tim/' . strval($index - 1)) ?>" class="btn btn-light <?= $index == 1 ? 'disabled' : '' ?>">Previous</a>
                <a href="<?= base_url('tim/1') ?>" class="btn <?= $index == 1 ? 'btn-danger' : 'btn-light' ?>">1</a>
                <?php $lengthGaleri = count($tim) ?>
                <?php $b = 1; ?>
                <?php for ($a = 2; $a <= $lengthGaleri; $a++) : ?>
                    <?php if ($a % 12 == 1) : ?>
                        <?php $b++ ?>
                        <a href="<?= base_url('tim/' . strval($b)) ?>" class="btn <?= $index == $b ? 'btn-danger' : 'btn-light' ?>"><?= $b ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <a href="<?= base_url('tim/' . strval($index + 1)) ?>" class="btn btn-light <?= $index == $b ? 'disabled' : '' ?>">Next</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>