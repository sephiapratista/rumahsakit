<?php
include('koneksi.php'); // Meng-includekan koneksi database
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['id_kabupaten']) and isset($_POST['nama_kabupaten']) and isset($_POST['ibukota_kabupaten']) and isset($_POST['luas_wilayah']) and isset($_POST['jumlah_kecamatan']) and isset($_POST['nama_bupati']) and isset ($_POST['wilayah_administrasi'])and isset($_POST['tahun_berdiri'])){ // Memeriksa apakah inputan ada atau tidak 
    $id_kabupaten=$_POST['id_kabupaten'];// membuat variabel id untuk menampung data id kabupaten
    $nama_kabupaten=$_POST['nama_kabupaten']; // membuat variabel nama untuk menampung data inputan nama kabupaten
    $ibukota_kabupaten=$_POST['ibukota_kabupaten']; // membuat variabel ibukota untuk menampung data inputan ibukota kabupaten
    $luas_wilayah=$_POST['luas_wilayah']; // membuat variabel luas untuk menampung data inputan luas wilayah
    $jumlah_kecamatan=$_POST['jumlah_kecamatan']; // membuat variabel jumlah untuk menampung data inputan jumlah kecamatan
    $nama_bupati=$_POST['nama_bupati']; // membuat variabel nama untuk menampung data inputan nama bupati
    $wilayah_administrasi=$_POST['wilayah_administrasi']; // membuat variabel wilayah untuk menampung data inputan wilayah administrasi
    $tahun_berdiri=$_POST['tahun_berdiri']; // membuat variabel tahun untuk menampung data inputan tahun berdiri
    $id = $_POST['id']; // membuat variabel id
 
    if(!empty($id_kabupaten) and (!empty($nama_kabupaten)) and (!empty($ibukota_kabupaten)) and (!empty($luas_wilayah)) and (!empty($jumlah_kecamatan)) and (!empty($nama_bupati)) and (!empty($wilayah_administrasi)) and (!empty($tahun_berdiri)) ){ // Memeriksa apakah variabel sudah terisi,jika sudah jalankan query dibawah
      $sql="UPDATE kabupaten SET id_kabupaten='$id_kabupaten', nama_kabupaten='$nama_kabupaten', ibukota_kabupaten='$ibukota_kabupaten', luas_wilayah='$luas_wilayah', jumlah_kecamatan='$jumlah_kecamatan', nama_bupati='$nama_bupati', wilayah_administrasi='$wilayah_administrasi', tahun_berdiri='$tahun_berdiri' WHERE id_kabupaten='$id'";
       
      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: tampilkabupaten.php?pesan=update');
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
  <title>Informasi Kependudukan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

  <?php
  $sql= "SELECT * FROM kabupaten WHERE id_kabupaten='$_GET[id_kabupaten]'"; // Menampilkan data berdasarkan id
  $hasil = $mysqli->query($sql);
  $data = $hasil->fetch_array();
?>
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
           <li class="nav-item">
            <a href="../forms/index.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fas fa-table nav-icon"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item menu-open">
                <a href="../forms/tampilkabupaten.php" class="nav-link active">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kabupaten</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/tampilkecamatan.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/tampildesa.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-file-contract nav-icon"></i>
              <p>
                Administrasi Desa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Surat Keterangan Domisili</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Surat Keterangan <br> Pencatatan Data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../forms/penduduk.php" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Kependudukan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../forms/laporan.php" class="nav-link">
              <i class="fas fa-folder-open"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../forms/logout.php" class="nav-link">
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
            <h1>Edit Data Kabupaten</h1>
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
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kabupaten</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
              <form method="POST" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo $data['id_kabupaten']; ?>" />
                  <div class="card-body">

                  <div class="form-group row">
                    <label for="inputIdKab" class="col-sm-2 col-form-label">Id Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_kabupaten" class="form-control" id="inputIdKab" placeholder="Id Kabupaten" value="<?php echo $data['id_kabupaten']; ?>" readonly/>
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputNamaKab" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kabupaten" class="form-control" id="inputNamaKab" placeholder="Nama Kabupaten" value="<?php echo $data['nama_kabupaten']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputIbukotaKab" class="col-sm-2 col-form-label">Ibukota Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" name="ibukota_kabupaten" class="form-control" id="inputIbukotaKab" placeholder="Ibukota Kabupaten" value="<?php echo $data['ibukota_kabupaten']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputLuas" class="col-sm-2 col-form-label">Luas Wilayah</label>
                    <div class="col-sm-10">
                      <input type="text" name="luas_wilayah" class="form-control" id="inputLuas" placeholder="Luas Wilayah" value="<?php echo $data['luas_wilayah']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputJumlahKec" class="col-sm-2 col-form-label">Jumlah Kecamatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="jumlah_kecamatan" class="form-control" id="inputJumlahKec" placeholder="Jumlah Kecamatan" value="<?php echo $data['jumlah_kecamatan']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label amfor="inputNaBup" class="col-sm-2 col-form-label">Nama Bupati</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_bupati" class="form-control" id="inputNamaBup" placeholder="Nama Bupati" value="<?php echo $data['nama_bupati']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label amfor="inputWilayah" class="col-sm-2 col-form-label">Wilayah Administrasi</label>
                    <div class="col-sm-10">
                      <input type="text" name="wilayah_administrasi" class="form-control" id="inputWilayah" placeholder="Wilayah Administrasi" value="<?php echo $data['wilayah_administrasi']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputTahunBerdiri" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_berdiri" class="form-control" id="inputTahunBerdiri" placeholder="Tahun Berdiri"  value="<?php echo $data['tahun_berdiri']; ?>"/>
                    </div>
                  </div> 
                  </div> 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" value="Simpan" class="btn btn-info">SAVE</button>
                  <button type="reset" value="Reset" class="btn btn-warning float-right">RESET</button>
                </div>
              </form>
            </div>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block"> 
    </div>
      <strong>Copyright &copy; 2021 Sistem Informasi Kependudukan</strong> by <b>Sephia Pratista.</b>
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
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
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
