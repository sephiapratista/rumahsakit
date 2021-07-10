<?php
include('koneksi.php'); // Meng-includekan koneksi database

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['id_pasien']) 
    and isset($_POST['nama_lengkap']) 
    and isset($_POST['umur']) 
    and isset($_POST['jenis_kelamin']) 
    and isset($_POST['tempat_lahir']) 
    and isset($_POST['tanggal_lahir']) 
    and isset($_POST['alamat']) 
    and isset($_POST['paket']) ){
    
    $id_pasien=$_POST['id_pasien'];
  $nama_lengkap=$_POST['nama_lengkap'];
  $umur=$_POST['umur'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $jenis_kelamin=$_POST['tempat_lahir'];
  $jenis_kelamin=$_POST['tanggal_lahir'];
  $jenis_kelamin=$_POST['alamat'];
  $jenis_kelamin=$_POST['paket'];

  if(!empty($id_pasien) 
    and (!empty($nama_lengkap)) 
    and (!empty($umur)) 
    and (!empty($jenis_kelamin))
    and (!empty($tempat_lahir))
    and (!empty($tanggal_lahir))
    and (!empty($alamat))
    and (!empty($paket)) ){

    $sql="INSERT INTO medicalcheckup (id_pasien, nama_lengkap, umur, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, paket) VALUES ('$id_pasien', '$nama_lengkap','$umur','$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$paket')";

      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: jsmedicalcheckup.php');
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
  <title>Medical Check Up</title>

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
        <center><span class="brand-text font-weight-light"><b>RUMAH SAKIT</b></span></center>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">ADMIN</a>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="index.php" class="nav-link">
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
          <li class="nav-item menu-open">
            <a href="checkup.php" class="nav-link active">
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
            <!-- Horizontal Form Medical Check Up-->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Medical Check Up</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <select name="id_pasien" class="form-control select" style="width: 100%;"> 
                        <option value="-">Pilih</option>
                        <?php
                        include "koneksi.php";

                        $sql = mysqli_query($mysqli,"select * from registrasi");

                        while ($hasil = mysqli_fetch_array($sql))
                        {
                          echo '<option value ="'. $hasil['id_pasien'].'">'.$hasil['nama_pasien']. "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputNamaBupati" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                      <input type="text" name="umur" class="form-control" id="inputNamaBupati" placeholder="Umur">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputjeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" /> Laki-laki &nbsp; </label>
                    <label><input type="radio" name="jenis_kelamin" value="Perempuan" /> Perempuan</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputNamaBupati" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir" class="form-control" id="inputNamaBupati" placeholder="Tempat Lahir">
                    </div>
                  </div>

                  <!-- Date -->
                  <div class="form-group row">
                    <label for="inputTglLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputNamaBupati" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control" id="inputNamaBupati" placeholder="Alamat">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pilihan Paket</label>
                    <div class="col-sm-10">
                      <select name="paket" class="form-control select" style="width: 100%;">
                        <option selected="selected">Pilih</option>
                        <option>Paket Basic</option>
                        <option>Paket Middle</option>
                        <option>Paket Exclusive</option>
                      </select>
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
      <strong>Copyright &copy; 2021 RUMAH SAKIT</strong> by <b>kELOMPOK 4.</b>
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