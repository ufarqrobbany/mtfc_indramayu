<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <!-- Tentang -->
    <div class="mb-5">
        <h1 class="text-center">Tentang Kami</h1>
        <p class="text-center fs-5 w-50 mx-auto mt-4">
            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
        </p>
        <img src="<?= base_url('assets/logo_t.png') ?>" class="mx-auto d-block" width="350px" />
    </div>

    <!-- Tim -->
    <div class="mb-5">
        <h1 class="text-center">Tim Kami</h1>
        <div class="d-flex column mt-5 mx-4 justify-content-between">
            <div class="card overflow-hidden" style="width: 18rem;">
                <!-- <img src="<?= base_url('upload/image/tim_1.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/tim_1.jpg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <h5 class="card-title fs-6">Umar Faruq Robbany</h5>
                    <p class="card-text">Jabatan</p>
                </div>
            </div>
            <div class="card overflow-hidden" style="width: 18rem;">
                <!-- <img src="<?= base_url('upload/image/tim_1.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/tim_1.jpg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <h5 class="card-title fs-6">Umar Faruq Robbany</h5>
                    <p class="card-text">Jabatan</p>
                </div>
            </div>
            <div class="card overflow-hidden" style="width: 18rem;">
                <!-- <img src="<?= base_url('upload/image/tim_1.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/tim_1.jpg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <h5 class="card-title fs-6">Umar Faruq Robbany</h5>
                    <p class="card-text">Jabatan</p>
                </div>
            </div>
            <div class="card overflow-hidden" style="width: 18rem;">
                <!-- <img src="<?= base_url('upload/image/tim_1.jpg') ?>" class="card-img-top" alt="..."> -->
                <div style="background-image: url(<?= base_url('upload/image/tim_1.jpg') ?>);" class="tim_picture"></div>
                <div class="card-body text-center">
                    <h5 class="card-title fs-6">Umar Faruq Robbany</h5>
                    <p class="card-text">Jabatan</p>
                </div>
            </div>
        </div>
    </div>

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