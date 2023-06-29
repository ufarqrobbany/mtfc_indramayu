<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin MTFC | Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/css/adminlte.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .wrapper {
            margin: 0 auto;
            width: 500px;
        }

        .content-header {
            margin-top: 100px;
        }

        .logo-container {
            flex-grow: 0;
        }

        .logo {
            height: 80px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center justify-content-center">
                    <div class="col logo-container">
                        <img src="<?= base_url(); ?>/assets/logo_t.png" class="logo" />
                    </div>
                    <div class="col-auto">
                        <h1>Admin MTFC</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title py-1">Masuk ke Halaman Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?= base_url(); ?>/admin/login" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="idAdmin">ID</label>
                                        <input type="text" name="id" class="form-control" id="idAdmin" placeholder="Masukkan ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSandi">Kata Sandi</label>
                                        <input type="password" name="kata_sandi" class="form-control" id="kataSandi" placeholder="Masukkan Kata Sandi">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                                    <small class="flex-fill"><?= anchor(base_url(), 'Kembali ke halaman beranda'); ?></small>
                                    <button type="submit" class="btn btn-dark px-4">Masuk</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-danger text-center d-block w-100"><?= session()->getFlashdata('error'); ?></div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= base_url(); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/admin/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    id: {
                        required: true,
                    },
                    kata_sandi: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    id: {
                        required: "ID tidak boleh kosong",
                    },
                    kata_sandi: {
                        required: "Password tidak boleh kosong",
                        minlength: "Minimal 5 karakter"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>