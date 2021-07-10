<?php
include('koneksi.php');

if(isset($_GET['hapus'])){
  $id_pasien = $_GET['hapus'];
  if(!empty($id_pasien)){
    $sql="DELETE FROM registrasi WHERE id_pasien='$id_pasien'";

        if($mysqli->query($sql) === false) { // Jika gagal meng-hapus data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
        } else { // Jika berhasil alihkan ke halaman tampil.php
          header('location: tampilregistrasi.php');
        }
      }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Sistem Informasi Kependudukan | Data Kabupaten</title>

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
            <span class="brand-text font-weight-light"><b>SISFO KEPENDUDUKAN</b></span>
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
            <a href="registrasi.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                registrasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="medicalcheckup.php" class="nav-link">
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
            <a href="#" class="nav-link">
              <i class="fas fa-table nav-icon"></i>
              <p>
                Dokter
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/tampilkabupaten.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Dokter Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/tampilkecamatan.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Dokter Spesialis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/tampildesa.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Dokter Gigi</p>
                </a>
              </li>
            </ul>
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
            <a href="grafik.html" class="nav-link">
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
            <h1>Data Master Kabupaten</h1>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kabupaten</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Pasien</th>
                      <th>Nomor Rekam Medis</th>
                      <th>Nomor BPJS</th>
                      <th>Kelas BPJS</th>
                      <th>Nama Pasien</th>
                      <th>Umur</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql= "SELECT id_pasien, nik, nomor_bpjs, kelas_bpjs, nama_pasien, umur, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat FROM registrasi ORDER BY nama_pasien ASC";
                    $hasil = $mysqli->query($sql);

                    if($hasil === false) {
                      trigger_error('Perintah SQL salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
                    } else {
                      while($data = $hasil->fetch_array()){
                        echo "<tr>";
                        echo "<td>$data[id_pasien]</td>";
                        echo "<td>$data[nik]</td>";
                        echo "<td>$data[nomor_bpjs]</td>";
                        echo "<td>$data[kelas_bpjs]</td>";
                        echo "<td>$data[nama_pasien]</td>";
                        echo "<td>$data[umur]</td>";
                        echo "<td>$data[jenis_kelamin]</td>";
                        echo "<td>$data[tempat_lahir]</td>";
                        echo "<td>$data[tanggal_lahir]</td>";
                        echo "<td>$data[alamat]</td>";
                        echo "<td><a href=editregister.php?id_pasien=$data[id_pasien]>Edit</a> <a href=tampilregistrasi.php?hapus=$data[id_pasien]>Hapus</a></td>";
                        // Menciptakan data id_kabupaten yang mengarah ke file edit.php
                        // Menciptakan data id_kabupaten yang mengarah ke file hapus.php  
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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