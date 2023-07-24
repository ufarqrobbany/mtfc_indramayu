<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<div class="container my-5" style="width: 40%">
    <form class="d-flex flex-column row-gap-4" action="<?= base_url('coba_por') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Suku pertama <strong>(a)</strong> : </label>
            <input class="form-control w-100" type="number" name="a" value="<?= session()->getFlashdata('a') ? session()->getFlashdata('a') : '' ?>" required />
        </div>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Suku kedua <strong>(b)</strong> : </label>
            <input class="form-control w-100" type="number" name="b" value="<?= session()->getFlashdata('a') ? session()->getFlashdata('b') : '' ?>" required />
        </div>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Suku ketiga <strong>(c)</strong> : </label>
            <input class="form-control w-100" type="number" name="c" value="<?= session()->getFlashdata('a') ? session()->getFlashdata('c') : '' ?>" required />
        </div>
        <div class="d-flex align-items-center">
            <label class="form-label col-4"><strong>(n)</strong> : </label>
            <input class="form-control w-100" type="number" name="n" value="<?= session()->getFlashdata('a') ? session()->getFlashdata('n') : '' ?>" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Cari hasil</button>
    </form>
    <?= (session()->getFlashdata('hasil')) ? '
        <div class="border-top mt-4 pt-3">
            <h5>Hasil</h5>
            <div><strong>U' . session()->getFlashdata('n') . '</strong> : <span>' . session()->getFlashdata('hasil') . '</span></div>
        </div>
        ' : '' ?>

    <form class="mt-5 d-flex flex-column row-gap-4 border-top pt-5" action="<?= base_url('coba_por_2') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Masukkan <strong>n</strong> : </label>
            <input class="form-control w-100" type="number" name="n" value="<?= session()->getFlashdata('hasil_2') ? session()->getFlashdata('hasil_2') : '' ?>" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Hasil</button>
    </form>
    <?php if (session()->getFlashdata('hasil_2')) : ?>
        <div class="border-top mt-4 pt-3">
            <h5>Hasil</h5>
            <table class="table table-bordered align-middle text-center">
                <?php
                $n = session()->getFlashdata('hasil_2');

                for ($x = 0; $x < $n; $x++) {
                    echo '<tr>';
                    if (($x + 1) % 2 == 0) {
                        for ($y = ($x + 1) * $n; $y >= $x * $n + 1; $y--) {
                            echo '<td>' . $y . '</td>';
                        }
                    } else {
                        for ($y = $x * $n + 1; $y <= ($x * $n) + $n; $y++) {
                            echo '<td>' . $y . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    <?php endif; ?>

    <form class="mt-5 d-flex flex-column row-gap-4 border-top pt-5" action="<?= base_url('coba_por_3') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Masukkan jumlah kubus kecil : </label>
            <input class="form-control w-100" type="number" name="n" value="<?= session()->getFlashdata('hasil_3') ? session()->getFlashdata('hasil_3') : '' ?>" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Hasil</button>
    </form>
    <?php if (session()->getFlashdata('hasil_3')) : ?>
        <div class="border-top mt-4 pt-3">
            <h5>Hasil</h5>
            <span>Kubus yang dapat dibentuk adalah : </span>
            <?php
            $na = session()->getFlashdata('hasil_3');
            $jk = 0;

            $in = $na;

            while ($in != 0) {
                if ($na >= $in * $in * $in) {
                    $na -= $in * $in * $in;
                    $jk++;
                    echo $in * $in * $in . (($na != 0) ? ", " : " ");
                } else {
                    $in--;
                }
            }
            ?>
            <div>Jumlah kubus yang dapat dibentuk adalah : <?= $jk ?></div>
        </div>
    <?php endif; ?>

    <form class="mt-5 d-flex flex-column row-gap-4 border-top pt-5" action="<?= base_url('coba_por_3') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Masukkan kolom : </label>
            <input class="form-control w-100" type="number" name="col" value="<?= session()->getFlashdata('hasil_4_col') ? session()->getFlashdata('hasil_4_col') : '' ?>" required />
        </div>
        <div class="d-flex align-items-center">
            <label class="form-label col-4">Masukkan baris : </label>
            <input class="form-control w-100" type="number" name="row" value="<?= session()->getFlashdata('hasil_4_row') ? session()->getFlashdata('hasil_4_row') : '' ?>" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Hasil</button>
    </form>
    <?php if (session()->getFlashdata('hasil_4_col')) : ?>
        <div class="border-top mt-4 pt-3">
            <h5>Hasil</h5>
            <table class="table table-bordered align-middle text-center">
                <?php
                $col = session()->getFlashdata('hasil_4_col');
                $row = session()->getFlashdata('hasil_4_row');
                $num = $col * $row;

                for ($r = 0; $r >= $row; $r++) {
                    echo '<tr>';
                    if (($x + 1) % 2 == 0) {
                        for ($y = ($x + 1) * $n; $y >= $x * $n + 1; $y--) {
                            echo '<td>' . $y . '</td>';
                        }
                    } else {
                        for ($y = $x * $n + 1; $y <= ($x * $n) + $n; $y++) {
                            echo '<td>' . $y . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>