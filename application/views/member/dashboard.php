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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('member/beranda'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-kiss-wink-heart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?= $this->session->userdata('role'); ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/beranda'); ?>">
                    <i class="fas fa-home "></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/pesanan/transaksi'); ?>">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Daftar Harga</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" onclick="return confirm('Yakin Logout?')" href="<?= base_url('member/beranda/keluar'); ?>">
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
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/member/') . $karyawan->foto; ?>">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->




                    <div class="row">
                        <div class="center text-dark">
                            <center>
                                <span class=" text-uppercase text-dark " style="font-size:45px; margin-bottom:-40px"><b class="welcome"></b></span><br><br><br><br>
                                <span style="font-size:80px; margin-top:-40px"><b><i class="far fa-smile-beam beam"></i> <i class="far fa-smile-wink wink"></i> <i class="far fa-kiss-wink-heart heart"></i></b></span><br><br><br>
                                <div class="container">
                                    <?= $this->session->flashdata('profilE'); ?>
                                </div>
                                <span style="font-size:40px; margin-top:-40px"><b class="outlet"><?= strtoupper($data->nama); ?></b>
                                </span><br>
                                <span style="font-size:30px; margin-top:-40px"><b>
                                        <a class="text-dark" href="https://www.instagram.com/<?= $data->ig; ?>/"> <i class="fab fa-instagram"></i></a>
                                        <a class="text-dark" href="https://wa.me/<?= $data->wa; ?>"><i class="fab fa-whatsapp"></i></a>
                                        <a class="text-dark" href="<?= $data->fb; ?>"><i class="fab fa-facebook-square"></i></a>
                                    </b></span><br><br><br>
                                <span style="font-size:25px; margin-top:-40px"><b>Kode Promo:</b></span>
                                <span style="font-size:25px; margin-top:-40px"><b>"<?= $this->session->userdata('id');; ?>"</b></span>
                            </center>
                        </div>




                    </div>
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

    <!-- gsap scrpt -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script>
        gsap.registerPlugin(TextPlugin);
        gsap.to('.welcome', {
            duration: 3.5,
            delay: 0.2,
            text: 'SELAMAT DATANG <?= $this->session->userdata('role');; ?>'
        });
        gsap.to('.siap-kerja', {
            duration: 2,
            delay: 1.7,
            text: 'Siap Kerja Cerdas dan Kompetitif'
        });
        gsap.from('.beam', {
            duration: 2,
            y: '-100%',
            opacity: 0,
            ease: 'bounce'
        });
        gsap.from('.wink', {
            duration: 2,
            delay: 0.5,
            y: '-100%',
            opacity: 0,
            ease: 'bounce'
        });
        gsap.from('.heart', {
            duration: 2,
            delay: 1,
            y: '-100%',
            opacity: 0,
            ease: 'bounce'
        });
        gsap.from('.outlet', {
            duration: 4,
            x: -50,
            opacity: 0,
            ease: 'back'
        });
    </script>

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