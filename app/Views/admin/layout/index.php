<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title . ' | MTFC Admin' : 'MTFC Admin' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->
    <!-- CodeMirror -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/simplemde/simplemde.min.css">

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?= $this->include('admin/layout/navbar') ?>
        <?= $this->include('admin/layout/sidebar') ?>

        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>

        <?= $this->include('admin/layout/footer') ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/admin/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url(); ?>/assets/admin/js/pages/dashboard.js"></script>
    <script src="<?= base_url(); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/codemirror/codemirror.js"></script>
    <script src="<?= base_url(); ?>/plugins/codemirror/mode/css/css.js"></script>
    <script src="<?= base_url(); ?>/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="<?= base_url(); ?>/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>


    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

    <script>
        var baseUrl = "<?= base_url(); ?>";
        var siteUrl = "<?= site_url(); ?>";

        $(function() {
            bsCustomFileInput.init();
            $('#summernote').summernote({
                // callbacks: {
                //     onImageUpload: function(files) {
                //         for (let i = 0; i < files.length; i++) {
                //             $.upload(files[i]);
                //         }
                //     },
                //     onMediaDelete: function(target) {
                //         $.delete(target[0].src);
                //     }
                // },
                height: 500,
                dialogsInBody: true,
            });

            // $.upload = function(file) {
            //     let out = new FormData();
            //     out.append('file', file, file.name);
            //     $.ajax({
            //         method: 'POST',
            //         url: baseUrl + 'admin/berita/uploadGambar',
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         data: out,
            //         "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
            //         success: function(img) {
            //             $('.summernote').summernote('insertImage', img);
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             console.error(textStatus + " " + errorThrown);
            //         }
            //     });
            // };
        });
    </script>
</body>

</html>