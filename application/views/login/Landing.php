<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- My Css -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>landing/style.css" type="text/css">

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- My fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="<?= base_url('assets/logo/favicon.png'); ?>" type="image/x-icon">

  <!-- AOS Scrpt -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


  <title>Welcome | <?= $data->nama; ?></title>
</head>

<body id="home">
  <!-- navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/'); ?>landing/img/logo.png">
      </a>
      <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link active" href="#home">Beranda <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#keunggulan">Keunggulan</a>
          <a class="nav-link" href="#harga">Harga</a>
          <a class="btn btn-primary tombol" href="<?= base_url('login'); ?>">Gabung</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- akhir navbar -->

  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div id="keunggulan" class="container">
      <h1 class="display-4" data-aos="zoom-in">Budayakan <span>malas mencuci</span><br> Karena itu <span>tugas kami</span> </h1>
      <h6 class="text-white bayar"></h6>
    </div>
  </div>
  <!-- akhir jumbotron -->

  <!-- container -->
  <div class="container">

    <!-- info panel -->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <div class="row">
          <div class="col-lg">
            <img src="<?= base_url('assets/'); ?>landing/img/employee.png" alt="employe" class="float-left">
            <h4>24 Jam Kerja</h4>
            <p>Hanya membutuhkan waktu 24 Jam. Pakaian Anda sudah siap untuk kembali dipakai</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/'); ?>landing/img/kindpng_430711.png" alt="hires" class="float-left">
            <h4>Kualitas Terbaik</h4>
            <p>Murah tapi tidak murahan. Kepuasan pelanggan selalu menjadi prioritas kami</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/'); ?>landing/img/security.png" alt="security" class="float-left">
            <h4>Privasi Aman</h4>
            <p>Kami menjaga penuh hak privasi para customer.</p>
          </div>
        </div>
      </div>
    </div>
    <!--  Akhir info panel -->

    <!-- Daftar AKtivasi -->

    <div class="row justify-content-center mt-4">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Karyawan Kami</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_karyawan; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users-cog fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Member Kami</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelanggan; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tasks Card Example -->
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Outlet Kami
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_outlet; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-store fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- workingspace -->
    <div class="row workingspace">
      <div class="col-lg-6">
        <img src="<?= base_url('assets/'); ?>landing/img/tt.png" alt="ws" class="img-fluid" data-aos="fade-up">
      </div>
      <div class="col-lg-5" data-aos="fade-down">
        <h3><span>Sibuk</span> bukan berarti <span>cucian</span> harus<span> menumpuk</span></h3>
        <p>Bergabung untuk menjadi member kami dan dapatkan potongan harga setiap pencucian.</p>
      </div>
    </div>
    <!-- akhir workingspace -->

    <!-- Awal satuan kiloan -->
    <div class="row workingspace">
      <div class="col-lg-6">
        <img src="<?= base_url('assets/'); ?>landing/img/aa.png" alt="ws" class="img-fluid" data-aos="fade-up">
      </div>
      <div class="col-lg-5" data-aos="fade-down">
        <h3><span>Laundry Satuan </span>Cucian</h3>
        <p>Jasa laundry satuan seperti kemeja, jas dll. Sangat cocok untuk pakaian spesial anda.
          Pengerjaan yang detail, bersih dengan harga terjangkau.</p>
      </div>
    </div>
    <div class="row workingspace">
      <div class="col-lg-5" data-aos="fade-down">
        <h3><span>Laundry Kiloan </span>Cucian</h3>
        <p>Jasa laundry baju kiloan di Bandung dan sekitarnya, cocok untuk pakaian sehari-hari.
          Sudah termasuk cuci, gosok dan lipat.</p>
      </div>
      <div class="col-lg-6">
        <img src="<?= base_url('assets/'); ?>landing/img/tecan.png" alt="ws" class="img-fluid" data-aos="fade-up">
      </div>
    </div>
    <!-- Akhir satuan kiloan -->

    <!-- Awal Daftar Harga -->
    <div id="harga" class="row justify-content-center mt-4">
      <div class="col-lg-12">
        <h1 class="text-center">Daftar Harga</h1>
      </div>
      <div class="col-lg-8 mt-4">
        <table class="table">
          <thead class="table-primary table-bordered border-dark">
            <tr>
              <th scope="col">Kode Paket</th>
              <th scope="col">Paket</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody class="table-bordered border-dark">
            <?php 
            foreach ($paket as $row) { ?>
              <tr>
                <td data-aos="fade-right"><?= $row->id_paket; ?></td>
                <td data-aos="zoom-in"><?= $row->nama_paket; ?></td>
                <td data-aos="fade-left"><?= "Rp." . number_format($row->harga, 0, '.', '.'); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Akhir Daftar Harga -->

  </div>
  <!-- akhir container -->


  <!-- footer -->
  <div class="row footer">
    <div class="col text-center">
      <div class="p-3 mb-2 bg-dark">
        <p>2021 All Reserved by <a href="<?= base_url('team/team'); ?>">Archie-Tech and Team-9</a></p>
      </div>
    </div>
  </div>
    <!-- akhir footer -->






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

    <!-- gsap scrpt -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script>
      gsap.registerPlugin(TextPlugin);
      gsap.to('.bayar', {
        duration: 2,
        delay: 1.8,
        text: 'Tapi harus bayar xixixi'
      });
      gsap.to('.siap-kerja', {
        duration: 2,
        delay: 1.7,
        text: 'Siap Kerja Cerdas dan Kompetitif'
      });
      gsap.from('.navbar', {
        duration: 1.6,
        y: '-100%',
        opacity: 0,
        ease: 'bounce'
      });
      gsap.from('.smk-7', {
        duration: 2,
        x: -50,
        opacity: 0,
        ease: 'back'
      });
    </script>

    <!-- AOS script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>