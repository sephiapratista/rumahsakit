<?php
include('koneksi.php'); // Meng-includekan koneksi database

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['id_keluarga']) and isset($_POST['nkk']) and isset($_POST['nama_istri']) and isset($_POST['no_ktp']) and isset($_POST['jenis_kelamin']) and isset($_POST['tempat_lahir'])and isset($_POST['tanggal']) and isset($_POST['agama']) and isset($_POST['alamat']) and isset($_POST['id_kabupaten']) and isset($_POST['id_kecamatan']) and isset($_POST['id_desa'])  and isset($_POST['telepon']) and isset($_POST['jumlah_anak']) and isset($_POST['pekerjaan']) and isset($_POST['gaji']) and isset($_POST['pendidikan'])  and isset($_POST['status_kependudukan'])){ // Memeriksa apakah inputan judul dan pengarang ada atau tidak
  // membuat variabel pengarang untuk menampung data inputan 
    $id_keluarga=$_POST['id_keluarga'];
    $nkk=$_POST['nkk'];
    $nama_istri=$_POST['nama_istri'];
    $no_ktp=$_POST['no_ktp'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $tempat_lahir=$_POST['tempat_lahir'];
    $tanggal=$_POST['tanggal'];
    $agama=$_POST['agama'];
    $alamat=$_POST['alamat'];
    $id_kabupaten=$_POST['id_kabupaten'];
    $id_kecamatan=$_POST['id_kecamatan'];
    $id_desa=$_POST['id_desa'];
    $telepon=$_POST['telepon'];
    $jumlah_anak=$_POST['jumlah_anak'];
    $pekerjaan=$_POST['pekerjaan'];
    $gaji=$_POST['gaji'];
    $pendidikan=$_POST['pendidikan'];
    $status_kependudukan=$_POST['status_kependudukan'];
    //upload gambar kedalam folder
    $nama_file=$_FILES['file_foto']['tmp_name'];
    $file_upload=$_FILES['file_foto']['name'];
    $file=str_replace(" ", "-", "$file_upload");
    $folder="foto/$file";
 
    if(copy("$nama_file","$folder"))
    { 
      $sql="INSERT INTO kependudukan (
      id_keluarga,
      nkk,
      nama_istri,
      no_ktp,
      jenis_kelamin,
      tempat_lahir,
      tanggal,
      agama,
      alamat,
      id_kabupaten,
      id_kecamatan,
      id_desa,telepon,
      jumlah_anak,
      pekerjaan,
      gaji,
      pendidikan,
      status_kependudukan,
      file_foto) 
      VALUES (
      '$id_keluarga',
      '$nkk',
      '$nama_istri',
      '$no_ktp',
      '$jenis_kelamin',
      '$tempat_lahir',
      '$tanggal',
      '$agama',
      '$alamat',
      '$id_kabupaten',
      '$id_kecamatan',
      '$id_desa',
      '$telepon',
      '$jumlah_anak',
      '$pekerjaan',
      '$gaji',
      '$pendidikan',
      '$status_kependudukan',
      '$folder')";
       
      if($mysqli->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
        header('location: jskependudukan.php');
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
            <a href="../forms/index.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-table nav-icon"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/tampilkabupaten.php" class="nav-link">
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
            <a href="../forms/penduduk.php" class="nav-link active">
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
            <a href="../forms/login.html" class="nav-link">
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
                <h3 class="card-title">Data Penduduk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" class="form-horizontal" enctype='multipart/form-data'>
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputNoKTP" class="col-sm-2 col-form-label">No. Induk Kependudukan</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_keluarga" class="form-control" id="inputNoKTP" placeholder="No. Induk Kependudukan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputKepalaKeluarga" class="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
                    <div class="col-sm-10">
                      <input type="text" name="nkk" class="form-control" id="inputKepalaKeluarga" placeholder="Nama Kepala Keluarga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNamaIstri" class="col-sm-2 col-form-label">Nama Istri</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_istri" class="form-control" id="inputNamaIstri" placeholder="Nama Istri">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNoKK" class="col-sm-2 col-form-label">No. Kartu Keluarga</label>
                    <div class="col-sm-10">
                      <input type="text" name="no_ktp" class="form-control" id="inputNoKK" placeholder="No. Kartu Keluarga">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputjeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <label><input type="radio" name="jenis_kelamin" value="L" />Laki-laki &nbsp; </label>
                      <label><input type="radio" name="jenis_kelamin" value="P" />Perempuan</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputTL" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir" class="form-control" id="inputTL" placeholder="Tempat Lahir">
                    </div>
                  </div>

                <!-- Date -->
                <div class="form-group row">
                  <label for="inputTglLahir" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                  <div class="col-sm-10">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                      <select name="agama" class="form-control select" style="width: 100%;">
                        <option selected="selected">Pilih</option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katholik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Konghucu</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat">
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="inputkabupaten" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                    <div class="col-sm-10">
                      <select name="id_kabupaten" class="form-control select" style="width: 100%;"> 
                        <option value="-">Pilih</option>
                        <?php
                        include "mysqli.php";

                        $sql = mysqli_query($mysqli,"select * from kabupaten");

                        while ($hasil = mysqli_fetch_array($sql))
                        {
                          echo '<option value ="'. $hasil['id_kabupaten'].'">'.$hasil['nama_kabupaten']. "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                      <select name="id_kecamatan" class="form-control select" style="width: 100%;"> 
                        <option value="-">Pilih</option>
                        <?php
                        include "mysqli.php";

                        $sql = mysqli_query($mysqli,"select * from kecamatan");

                        while ($hasil = mysqli_fetch_array($sql))
                        {
                          echo '<option value ="'. $hasil['id_kecamatan'].'">'.$hasil['nama_kecamatan']. "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                      <select name="id_desa" class="form-control select" style="width: 100%;"> 
                        <option value="-">Pilih</option>
                        <?php
                        include "mysqli.php";

                        $sql = mysqli_query($mysqli,"select * from desa");

                        while ($hasil = mysqli_fetch_array($sql))
                        {
                          echo '<option value ="'. $hasil['id_desa'].'">'.$hasil['nama_desa']. "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputhp" class="col-sm-2 col-form-label">No. HP/Telp</label>
                    <div class="col-sm-10">
                      <input type="text" name="telepon" class="form-control" id="inpuhp" placeholder="No HP/Telp">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputjumlahanak" class="col-sm-2 col-form-label">Jumlah Anak</label>
                    <div class="col-sm-10">
                      <input type="text" name="jumlah_anak" class="form-control" id="inputjumlahanak" placeholder="Jumlah Anak">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputpekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan" class="form-control" id="inputpekerjaan" placeholder="Pekerjaan">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputgaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-10">
                      <input type="text" name="gaji" class="form-control" id="inputgaji" placeholder="Tempat Lahir">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10">
                      <select name="pendidikan" class="form-control select" style="width: 100%;">
                        <option selected="selected">SD</option>
                        <option>SMP</option>
                        <option>SMA/Sederajat</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputsk" class="col-sm-2 col-form-label">Status Kependudukan</label>
                      <label><input type="radio" name="status_kependudukan" value="L" />Aktif &nbsp; </label>
                      <label><input type="radio" name="status_kependudukan" value="P" />Non-aktif</label>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Foto</label>
                    <div class="col-sm-10">
                    <div class="controls">
                      <input type='file' name='file_foto' size='25'>
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
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>
