<?php
include('koneksi.php'); // Meng-includekan koneksi database
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['id_desa']) and isset($_POST['nama_desa']) and isset($_POST['nama_kades'])){ // Memeriksa apakah inputan ada atau tidak 
    $id_desa=$_POST['id_desa'];// membuat variabel id untuk menampung data id jumlah_desa
    $nama_desa=$_POST['nama_desa']; // membuat variabel nama untuk menampung data inputan nama jumlah_desa
    $nama_kades=$_POST['nama_kades']; // membuat variabel ibukota untuk menampung data inputan ibukota jumlah_desa
    $id = $_POST['id']; // membuat variabel id
 
    if(!empty($id_desa) and (!empty($nama_desa)) and (!empty($nama_kades)) ){ // Memeriksa apakah variabel sudah terisi,jika sudah jalankan query dibawah
      $sql="UPDATE desa SET id_desa='$id_desa', nama_desa='$nama_desa', nama_kades='$nama_kades' WHERE id_desa='$id'";
       
      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: tampildesa.php?pesan=update');
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
  <title>Informasi Kependudukan|Edit Desa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">


<?php
$sql= "SELECT * FROM kependudukan, desa, kecamatan, kabupaten WHERE kependudukan.id_desa=desa.id_desa and kependudukan.id_kecamatan=kecamatan.id_kecamatan and kependudukan.id_kabupaten=kabupaten.id_kabupaten"; // Menampilkan data berdasarkan id 
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
            <a href="../forms/login.php" class="nav-link">
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
                <input type="hidden" name="id" value="<?php echo $data['id_desa']; ?>" />
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputIdKab" class="col-sm-2 col-form-label">Id desa</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_desa" class="form-control" id="inputIdKab" placeholder="Id Kecamatan" value="<?php echo $data['id_desa']; ?>" readonly/>
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputNamaKab" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_desa" class="form-control" id="inputNamaKab" placeholder="Nama Kecamatan" value="<?php echo $data['nama_desa']; ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputIbukotaKab" class="col-sm-2 col-form-label">Nama Camat</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kades" class="form-control" id="inputIbukotaKab" placeholder="Nama Camat" value="<?php echo $data['nama_kades']; ?>" />
                    </div>
                  </div>
                  
                  </div> 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" value="Simpan" class="btn btn-info">SAVE</button>
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
