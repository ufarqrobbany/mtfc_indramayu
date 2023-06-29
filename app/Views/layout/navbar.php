<nav class="navbar navbar-expand-lg bg-body">
    <div class="container">
        <a class="navbar-brand d-flex gap-3 column align-items-center" href="<?= base_url('/'); ?>">
            <img src="<?= base_url(); ?>/assets/logo_t.png" alt="Logo" height="80" class="d-block align-text-center">
            <div class="text-center fw-semibold">
                Mangoes Taekwondo <br /> Fans Club
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/galeri') ?>">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>