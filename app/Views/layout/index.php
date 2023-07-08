<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title . ' | MTFC Indramayu' : 'MTFC Indramayu' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        ::-moz-selection {
            /* Code for Firefox */
            color: white;
            background: rgb(220, 53, 69);
        }

        ::selection {
            color: white;
            background: rgb(220, 53, 69);
        }

        .berita_picture {
            width: 100%;
            aspect-ratio: 2/1;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-origin: content-box;
        }

        .tim_picture {
            width: 100%;
            aspect-ratio: 1/1;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-origin: content-box;
        }

        .galeri_picture {
            width: 100%;
            aspect-ratio: 2/1;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-origin: content-box;
            transition: 0.2s;
        }

        .galeri_picture:hover {
            cursor: pointer;
            filter: brightness(50%);
        }

        body {
            margin-top: 107px;
        }

        @media only screen and (max-width: 991px) {
            body {
                margin-top: 87px;
            }
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-between">
    <?= $this->include('layout/navbar') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>