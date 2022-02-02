<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Koneksi Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="<?= base_url('assets/logo/favicon.png'); ?>" type="image/x-icon">

    <title>Form Registrasi | CodeIgniter</title>
</head>

<body class="hold-transition login-page">
    <div class="data-flush"></div>
    <div class="login-box">
        <div class="login-logo">
            <h3>Buat Akun</h3>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan Registrasi terlebih Dahulu</p>

                <form action="<?= base_url(); ?>login/register" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-2 mt-2" hidden>
                        <input type="text" class="form-control" value="<?= $idmember; ?>" id="inputEmail4" name="id_member" placeholder="ID" value="<?php echo set_value('id_member'); ?>" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-geo-alt-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputEmail4" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-person-fill"></i></span>
                            </div>
                        </div>

                    </div>
                    <?php echo form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                    <div class="input-group mb-2 mt-2">
                        <input type="text" class="form-control" id="inputEmail4" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-geo-alt-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                    <div class="input-group mb-2 mt-2">
                        <select class="form-select form-select-sm" name="jenis_kelamin" aria-label=".form-select-sm example">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-people-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2 mt-2">
                        <input type="number" class="form-control" id="inputEmail4" name="tlp" placeholder="No Telepon" value="<?php echo set_value('tlp'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-telephone-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('tlp', '<small class="text-danger pl-1">', '</small>'); ?>
                    <div class="input-group mb-2 mt-2" hidden>
                        <input type="text" class="form-control" value="<?= $id_user; ?>" id="inputEmail4" name="id_user" placeholder="ID" value="<?php echo set_value('id_user'); ?>" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="bi bi-geo-alt-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2 mt-2">
                        <input type="text" class="form-control" id="inputEmail4" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    <div class="input-group mb-2 mt-2">
                        <input type="password" class="form-control" id="inputEmail4" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    <div class="input-group mb-3 mt-2">
                        <input type="password" class="form-control" id="inputEmail4" name="password2" placeholder="Verifikasi Kembali Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-check-all"></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="<?= base_url('login') ?>" type="submit" class="btn btn-secondary btn-block" style="margin-top: 0 !important ;">Kembali</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>


    <!-- Upload Foto -->
    <script type="text/javascript">
        var element = document.querySelector(".choosefile");
        var upload = document.querySelector(".uploadfoto");
        element.onclick = function() {
            upload[1].classList.remove("uploadfoto");
        }
    </script>


    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- jQuery -->
    <!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                var data = $('.data-flush').data('flash');
                console.log(data);
                if (data) {
                    var a = data.split(',');
                    if (a[1].replace(/\s/g, '') == 'success') {
                        swal("Information!", a[0], "success");
                    } else {
                        swal("Information!", a[0], "error");
                    }
                }
            })
        })
    </script>

    <!-- Icheck -->
</body>

</html>