<style>
    .sosial {
        font-size: 30px;
    }

    .fa-facebook {
        color: #3b5998;
    }

    .fa-instagram {
        color: #E4405F;
    }
</style>

<footer class="border-top">
    <div class="container row mx-auto justify-content-between align-items-start py-3 my-4">
        <div class="col-6 d-flex row gap-3">
            <div class="fw-semibold fs-3">Mangoes Taekwondo Fans Club</div>
            <div>
                Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada
            </div>
            <ul class="list-unstyled d-flex">
                <?php
                if (isset($kontak->ig_url)) {
                    if ($kontak->ig_url != '') {
                        echo '
                            <li class="me-3">
                                <a class="link-body-emphasis" href="' . $kontak->ig_url . '">
                                    <i class="fa-brands fa-instagram sosial"></i>
                                </a>
                            </li>
                            ';
                    }
                }

                if (isset($kontak->fb_url)) {
                    if ($kontak->fb_url != '') {
                        echo '
                            <li class="me-3">
                                <a class="link-body-emphasis" href="' . $kontak->fb_url . '">
                                    <i class="fa-brands fa-facebook sosial"></i>
                                </a>
                            </li>
                            ';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="col-6 d-flex row gap-3">
            <div class="fw-semibold fs-5">Hubungi Kami :</div>

            <?= isset($kontak->alamat) ? '<div>' . $kontak->alamat . '</div>' : '' ?>

            <div>
                <div>Telepon: <?= isset($kontak->telepon) ? $kontak->telepon  : '-' ?></div>
                <div>Email: <?= isset($kontak->email) ? $kontak->email : '-' ?></div>
            </div>
        </div>
    </div>
</footer>