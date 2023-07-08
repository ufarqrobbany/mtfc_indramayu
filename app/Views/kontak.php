<?= $this->extend('layout/index.php') ?>

<?= $this->section('content') ?>

<style>
    .judul_kontak_list {
        font-size: 1.25rem;
    }

    .isi_kontak_list {
        font-size: 1rem;
    }

    .container_custom {
        margin-top: 48px;
        margin-bottom: 48px;
    }

    .judul_section {
        margin-bottom: 48ps;
    }

    .sub_section {
        margin-top: 48px;
    }

    .map_frame {
        height: 500px;
    }

    @media only screen and (max-width: 991px) {
        .pesan {
            margin-top: 50px;
        }

        .judul_kontak_list {
            font-size: 1rem;
        }

        .isi_kontak_list {
            font-size: .875rem;
        }

        .container_custom {
            margin-top: 36px;
        }

        .judul_section {
            margin-bottom: 36px;
        }

        .sub_section {
            margin-top: 36px;
        }

        .map_frame {
            height: 250px;
        }
    }
</style>

<div class="container container_custom">
    <div>
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

<?= $this->endSection() ?>