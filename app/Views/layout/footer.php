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

    .soc_link {
        transition: 0.2s;
    }

    .soc_link:hover {
        transform: scale(1.2);
    }

    @media only screen and (max-width: 991px) {
        .footer_info {
            font-size: .875rem;
        }
    }
</style>

<footer class="border-top bg-dark" style="bottom: 0; left:0; right:0;">
    <div class="container row mx-auto justify-content-between align-items-start py-3 my-4">
        <div class="col-lg-6 col-12 d-flex row gap-3">
            <div class="fw-semibold fs-3 text-danger">Mangoes Taekwondo Fans Club</div>
            <div class="text-light footer_info">
                <?php
                $db      = \Config\Database::connect();
                $tentang = $db->table('tentang')->get()->getFirstRow();
                ?>
                <?= (isset($tentang) && ($tentang->footer != NULL)) ? $tentang->footer : 'Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada' ?>
            </div>
            <ul class="list-unstyled d-flex mt-2">
                <?php
                if (isset($kontak->ig_url)) {
                    if ($kontak->ig_url != '') {
                        echo '
                            <li class="me-3 soc_link">
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
                            <li class="me-3 soc_link">
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

        <div class="col-lg-6 col-12 d-flex row gap-3">
            <div class="fw-semibold fs-5 text-danger">Hubungi Kami :</div>

            <?= isset($kontak->alamat) ? '<div class="text-light footer_info">' . $kontak->alamat . '</div>' : '' ?>

            <div class="text-light footer_info">
                <div><span class="text-danger">Telepon: </span><?= isset($kontak->telepon) ? $kontak->telepon  : '-' ?></div>
                <div><span class="text-danger">Email: </span><?= isset($kontak->email) ? $kontak->email : '-' ?></div>
            </div>
        </div>
    </div>
</footer>