<?php
include('koneksi.php'); // Meng-includekan koneksi database

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['nama_kabupaten']) and isset($_POST['ibukota_kabupaten']) and isset($_POST['luas_wilayah']) and isset($_POST['jumlah_kecamatan']) and isset($_POST['nama_bupati']) and isset ($_POST['wilayah_administrasi'])and isset($_POST['tahun_berdiri'])){ // Memeriksa apakah inputan judul dan pengarang ada atau tidak
  // membuat variabel pengarang untuk menampung data inputan 
    $nama_kabupaten=$_POST['nama_kabupaten'];
    $ibukota_kabupaten=$_POST['ibukota_kabupaten'];
    $luas_wilayah=$_POST['luas_wilayah'];
    $jumlah_kecamatan=$_POST['jumlah_kecamatan'];
    $nama_bupati=$_POST['nama_bupati'];
    $wilayah_administrasi=$_POST['wilayah_administrasi'];
    $tahun_berdiri=$_POST['tahun_berdiri'];

    if(!empty($nama_kabupaten) and (!empty($ibukota_kabupaten)) and (!empty($luas_wilayah)) and (!empty($jumlah_kecamatan)) and (!empty($nama_bupati)) and (!empty($wilayah_administrasi)) and (!empty($tahun_berdiri))){ // Memeriksa apakah variabel judul dan pengarang sudah terisi,jika sudah jalankan query dibawah
      $sql="INSERT INTO kabupaten (nama_kabupaten, ibukota_kabupaten, luas_wilayah, jumlah_kecamatan, nama_bupati, wilayah_administrasi, tahun_berdiri) VALUES ('$nama_kabupaten','$ibukota_kabupaten','$luas_wilayah','$jumlah_kecamatan','$nama_bupati','$wilayah_administrasi','$tahun_berdiri')";

      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: jskabupaten.php');
      }
    }
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['id_kabupaten']) and isset($_POST['nama_kecamatan']) and isset($_POST['nama_camat']) and isset($_POST['jumlah_desa'])){
    
    $id_kabupaten=$_POST['id_kabupaten'];
    $nama_kecamatan=$_POST['nama_kecamatan'];
    $nama_camat=$_POST['nama_camat'];
    $jumlah_desa=$_POST['jumlah_desa'];

    if(!empty($id_kabupaten) and (!empty($nama_kecamatan)) and (!empty($nama_camat)) and (!empty($jumlah_desa))){

      $sql="INSERT INTO kecamatan (id_kabupaten, nama_kecamatan, nama_camat, jumlah_desa) VALUES ('$id_kabupaten', '$nama_kecamatan','$nama_camat','$jumlah_desa')";

      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: jskecamatan.php');
      }
    }
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['id_kecamatan']) and isset($_POST['nama_desa']) and isset($_POST['nama_kades'])){

    $id_kecamatan=$_POST['id_kecamatan'];
    $nama_desa=$_POST['nama_desa'];
    $nama_kades=$_POST['nama_kades'];

    if(!empty($id_kecamatan) and (!empty($nama_desa)) and (!empty($nama_kades)) ){

      $sql="INSERT INTO desa (id_kecamatan, nama_desa, nama_kades) VALUES ('$id_kecamatan', '$nama_desa','$nama_kades')";

      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: jsdesa.php');
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Kependudukan | Beranda</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link">
        <center><span class="brand-text font-weight-light"><b>SISFO KEPENDUDUKAN</b></span></center>
      </div>

            <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

      <!-- Sidebar -->
      <div class="sidebar">


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="fas fa-house-user"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pendaftaran.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pendaftaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="checkup.php" class="nav-link">
              <i class="fas fa-plus-circle nav-icon"></i>              
              <p>
                Medical Chechk Up
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="poli.php" class="nav-link">
              <i class="fas fa-stethoscope nav-icon"></i>              
              <p>
                Poli
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../forms/jadwal.php" class="nav-link">
              <i class="fas fa-calendar-alt nav-icon"></i>              
              <p>
                Jadwal Praktik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/forms/chartjs.html" class="nav-link">
              <i class="fas fa-chart-line nav-icon"></i>              
              <p>
                Grafik Kunjungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/forms/login.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Data</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">              
            <!-- Horizontal Form Kabupaten-->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Kabupaten</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputNamaKab" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kabupaten" class="form-control" id="inputNamaKab" placeholder="Nama Kabupaten">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputIbukotaKab" class="col-sm-2 col-form-label">Ibukota Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" name="ibukota_kabupaten" class="form-control" id="inputIbukotaKab" placeholder="Ibukota Kabupaten">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputIbukotaKab" class="col-sm-2 col-form-label">Luas Wilayah</label>
                    <div class="col-sm-10">
                      <input type="text" name="luas_wilayah" class="form-control" id="inputIbukotaKab" placeholder="Ibukota Kabupaten">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputJumlahKec" class="col-sm-2 col-form-label">Jumlah Kecamatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="jumlah_kecamatan" class="form-control" id="inputJumlahKec" placeholder="Jumlah Kecamatan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNamaBupati" class="col-sm-2 col-form-label">Nama Bupati</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_bupati" class="form-control" id="inputNamaBupati" placeholder="Nama Bupati">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Wilayah Administrasi</label>
                    <div class="col-sm-10">
                      <select name="wilayah_administrasi" class="form-control select" style="width: 100%;">
                        <option selected="selected">Kota</option>
                        <option>Kabupaten</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputTahunBerdiri" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_berdiri" class="form-control" id="inputTahunBerdiri" placeholder="Tahun Berdiri">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" value="Simpan" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!--/.col -->


            

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 Sistem Informasi Kependudukan</strong> by <b>Sephia Pratista.</b>
      All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      bsCustomFileInput.init();
    });
  </script>
</body>
</html>