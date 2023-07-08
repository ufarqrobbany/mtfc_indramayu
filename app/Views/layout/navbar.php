<style>
    .nav_mobile_divider {
        display: none;
    }

    .alert {
        width: 25%;
        margin-right: 20px;
    }

    @media only screen and (max-width: 991px) {
        .navbar_mobile {
            padding: 0;
        }

        .logo_head {
            height: 60px;
        }

        .text_head {
            display: none;
        }

        .nav_logo {
            margin-top: 8px;
            margin-bottom: 8px;
            margin-left: 12px;
        }

        .nav_toggle {
            margin-right: 12px;
        }

        .nav_mobile {
            background-color: #212529;
        }

        .nav_mobile .nav-link {
            color: #f8f9fa;
            padding-left: 12px;
            padding-right: 12px;
            text-align: center;
            border-radius: 0 !important;
        }

        #con_nav {
            padding: 0;
        }

        .nav_mobile_divider {
            display: block;
            height: 10px;
            width: 100%;
            background-color: #212529;
        }

        .alert {
            width: 100%;
            margin-right: 0;
        }
    }
</style>

<nav class="navbar navbar-expand-lg bg-body border-bottom navbar_mobile" style="position:fixed; top:0; left:0; right:0; z-index:99;">
    <div class="container" id="con_nav">
        <a class="navbar-brand d-flex gap-3 column align-items-center nav_logo" href="<?= base_url('/'); ?>">
            <img src="<?= base_url(); ?>/assets/logo_t.png" alt="Logo" height="80px" class="d-block align-text-center logo_head">
            <div class="text-center fw-semibold text_head">
                Mangoes Taekwondo <br /> Fans Club
            </div>
        </a>
        <button class="navbar-toggler nav_toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0 nav_mobile" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex column-gap-2">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Beranda') ? 'active bg-danger rounded text-light px-3' : '' ?>" aria-current="page" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Tentang') ? 'active bg-danger rounded text-light px-3' : '' ?>" href="<?= base_url('/tentang') ?>">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Galeri') ? 'active bg-danger rounded text-light px-3' : '' ?>" href="<?= base_url('/galeri/1') ?>">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Berita') ? 'active bg-danger rounded text-light px-3' : '' ?>" href="<?= base_url('/berita/1') ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Kontak') ? 'active bg-danger rounded text-light px-3' : '' ?>" href="<?= base_url('/kontak') ?>">Kontak</a>
                </li>
            </ul>
            <div class="nav_mobile_divider"></div>
        </div>
    </div>
</nav>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

<?= (session()->getFlashdata('success')) ? '
        <div class="alert alert-light alert-dismissible d-flex justify-content-start align-items-center px-4 py-3 position-fixed bottom-0 shadow fade show" role="alert" style="z-index: 99; right: 0; margin-bottom: 30px;">
            <svg class="bi flex-shrink-0 me-2 text-success" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            ' . session()->getFlashdata('success') . '
            <button type="button" class="close btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
        </div>
        ' : '' ?>