<!DOCTYPE html>
<html lang="en">

<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Koneksi Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('assets/logo/favicon.png'); ?>" type="image/x-icon">

    <title>Halaman | <?= $this->session->userdata('role'); ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/beranda'); ?>">
                <div class="sidebar-brand-icon">
                    <img style="width: 140px; height: 60px; padding-right: 20px; padding-left: 10px;" src="<?= base_url('assets/logo/logob.jpg') ?>" alt="logo">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Halaman Utama
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/beranda'); ?>">
                    <i class="fas fa-home "></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Navbar profil -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/profil'); ?>">
                    <i class="fa-fw far fa-calendar "></i>
                    <span> Profil Outlet</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/karyawan'); ?>">
                    <i class=" fas fa-fw fa-users-cog"></i>
                    <span>Karyawan & Staff</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/pelanggan'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pelanggan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pemesanan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/paket'); ?>">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Paket</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/pesanan'); ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pesanan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/pesanan/transaksi'); ?>">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/laporan'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" onclick="return confirm('Yakin Logout?')" href="<?= base_url('admin/beranda/keluar'); ?>">
                    <i class="fas fa-door-open"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/admin/') . $namakaryawan->foto; ?>">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Form Tambah Paket</h1>
                    <div class="container">
                        <?= $this->session->flashdata('karyawangl'); ?>
                    </div>
                    <div class="card col-lg-5 bg-primary">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg text-light">Silakan Isi Form</p>

                            <form action="<?= base_url(); ?>admin/paket/simpan" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-2 mt-2">
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $id_paket; ?>" name="id_paket" placeholder="ID Paket" value="<?php echo set_value('id_paket'); ?>" readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span><i class="bi bi-geo-alt-fill"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inputEmail4" name="nama_paket" placeholder="Nama Paket" value="<?php echo set_value('nama_paket'); ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span><i class="bi bi-person-fill"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_error('nama_paket', '<small class="text-danger pl-1">', '</small>'); ?>
                                <div class="input-group mb-2 mt-2">
                                    <input type="number" class="form-control" id="inputEmail4" name="harga" placeholder="Harga" value="<?php echo set_value('harga'); ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span><i class="bi bi-geo-alt-fill"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_error('harga', '<small class="text-danger pl-1">', '</small>'); ?>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="<?= base_url('admin/paket'); ?>" type="submit" class="btn btn-danger btn-block" style="margin-top: 0 !important ;">Batal</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                                    </div>

                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>


                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/'); ?>js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/print.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });

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
        $('.select2').select2({
            placeholder: "Pilih item"
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $('#reservation').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $("#cetak").bind("click", function(event) {
            const tgl = $("#reservation").val();
            const Url = $(this).data('url');
            var a = tgl.split(' - ');
            dataa = {
                'tglawal': a[0],
                'tglakhir': a[1]
            };
            var datatanggal = "Dari Tanggal " + convertanggal(a[0]) + " s/d " + convertanggal(a[1]);
            // var options = { mode : "popup", popClose : true, extraHead : '<meta charset="utf-8"/>,<meta http-equiv="X-UA-Compatible" content="IE=edge"/>,<style rel="stylesheet" type="text/css" media="print">@page { size: landscape; }</style>' };
            $("#tgllaporan").text(datatanggal);
            $('.action').css('display', 'none');
            $('.dataTables_filter').css('display', 'none');
            $('.dataTables_info').css('display', 'none');
            $('.dataTables_paginate').css('display', 'none');
            $('.dataTables_length').css('display', 'none');
            // cetak data pada area <div id="#data-mahasiswa"></div>
            $('#data-print').printArea();
            $('.action').css('display', 'block');
            $('.dataTables_filter').css('display', 'block');
            $('.dataTables_info').css('display', 'block');
            $('.dataTables_paginate').css('display', 'block');
            $('.dataTables_length').css('display', 'block');
        });

        function convertanggal(item) {
            item = new Date(item)
            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var tanggal = item.getDate();
            var xhari = item.getDay();
            var xbulan = item.getMonth();
            var xtahun = item.getYear();
            var hari = hari[xhari];
            var bulan = bulan[xbulan];
            var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
            return (tanggal + ' ' + bulan + ' ' + tahun);
        }
    </script>



    <!-- Icheck -->
</body>

</html>