<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <!-- Galeri -->
    <div>
        <h1 class="text-center">Galeri</h1>
        <div class="d-flex flex-wrap column mt-5 mx-4 justify-content-between" style="row-gap: 40px;">
            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>

            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>

            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>

            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>

            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>

            <div class="card overflow-hidden" style="width: 24rem;">
                <!-- <img src="<?= base_url('upload/image/banner_2.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/banner_2.jpeg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <p class="card-text">Keterangan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>