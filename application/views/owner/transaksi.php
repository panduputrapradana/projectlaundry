<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_ambil = date('Y-m-d h:i:s');
?>
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

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link rel="shortcut icon" href="<?= base_url('assets/logo/favicon.png'); ?>" type="image/x-icon">



    <title>Halaman | <?= $this->session->userdata('role'); ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('owner/beranda'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-kiss-wink-heart"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $this->session->userdata('role'); ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Halaman Utama
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/beranda'); ?>">
                    <i class="fas fa-home "></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Navbar profil -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/profil'); ?>">
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
                <a class="nav-link" href="<?= base_url('owner/karyawan'); ?>">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Karyawan & Staff</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/pelanggan'); ?>">
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

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/paket'); ?>">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Paket</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/pesanan/transaksi'); ?>">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/laporan'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" onclick="return confirm('Yakin Logout?')" href="<?= base_url('owner/beranda/keluar'); ?>">
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
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/owner1/') . $namakaryawan->foto; ?>">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered tabelkaryawan" id="tabelkaryawan" width="100%" cellspacing="0">
                                    <thead class="table-secondary ">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pesanan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Paket</th>
                                            <th>Outlet</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Ambil</th>
                                            <th>Jumlah (kg/pcs)</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Status Bayar</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="table-secondary ">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pesanan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Paket</th>
                                            <th>Outlet</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Ambil</th>
                                            <th>Jumlah (kg/pcs)</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Status Bayar</th>
                                            <th>aksi</th>
                                        </tr>

                                    </tfoot>
                                    <tbody class="table-primary">
                                        <?php
                                        $no = 1;
                                        foreach ($transaksi as $row) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->id; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->nama_paket; ?></td>
                                                <td><?= $row->nama_outlet; ?></td>
                                                <td><?= $row->tgl_masuk; ?></td>
                                                <td><?= $row->tgl_ambil; ?></td>
                                                <td><?= $row->jumlah; ?></td>
                                                <td><?= "Rp." . number_format($row->total, 0, '.', '.'); ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->status == "baru") { ?>
                                                        <select name="status" class="badge badge-primary status">
                                                            <option value="<?= $row->id ?>baru" selected> Baru</option>
                                                        </select>
                                                    <?php } else if ($row->status == "proses") { ?>
                                                        <select name="status" class="badge badge-info status">
                                                            <option value="<?= $row->id ?>proses" selected> Proses</option>
                                                        </select>
                                                    <?php } else if ($row->status == "selesai") { ?>
                                                        <select name="status" class="badge badge-success status">
                                                            <option value="<?= $row->id ?>selesai" selected> Selesai</option>
                                                        </select>
                                                    <?php } else { ?>
                                                        <button class="btn btn-sm btn-secondary dropdown-toggle"> Diambil</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row->dibayar == "dibayar") { ?>
                                                        Lunas
                                                    <?php } else { ?>
                                                        Belum Lunas
                                                    <?php }
                                                    ?>
                                                </td>
                                                <?php
                                                if ($row->status == "diambil") { ?>
                                                    <td>
                                                        <a href="<?= base_url('owner/pesanan/detail/') . $row->id; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                    </td>
                                                <?php } else if ($row->status == "selesai") { ?>
                                                    <td>
                                                        <a href="<?= base_url('owner/pesanan/detail/') . $row->id; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                    </td>
                                                <?php } else if ($row->status == "proses") { ?>
                                                    <td>
                                                        <a href="<?= base_url('owner/pesanan/detail/') . $row->id; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <a href="<?= base_url('owner/pesanan/detail/') . $row->id; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tabelkaryawan').DataTable();
        });
    </script>

    <script>
        $('.status').change(function() {
            var status = $(this).val();
            var id = status.substr(0, 10);
            var stt = status.substr(10, 10);

            $.ajax({
                url: "<?= base_url('admin/pesanan/update_status'); ?>",
                method: "post",
                data: {
                    id: id,
                    stt: stt
                }
            });

            location.reload();
        });
    </script>

    <!-- Icheck -->
</body>

</html>