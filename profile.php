<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>About</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php require 'koneksi.php'; ?>
<?php require 'sidebar.php'; ?>
      <!-- Main Content -->
      <div id="content">

<?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php
if ($_SESSION['id'] == 1) {
	$lihat = 'none';
} else {
	$lihat = 'hidden';
};
?>
<button type="button" class="btn btn-success" style="margin:5px; visibility:<?=$lihat?>" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> </i></button><br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
                
        <p align = justify>
        Keuangan adalah sesuatu yang sangat sulit untuk diatur. Kebanyakan orang sering merasa kesulitan untuk mengatur
        keuangannya dengan baik dan terstruktur. Kesulitan tersebut juga sering dialami mahasiswa, di mana kebanyakan
        dari pelajar dan mahasiswa yang baru belajar mengatur keuangannya sendiri. Tak hanya pelajar dan mahasiswa, banyak
        pekerja yang terlalu sibuk dengan pekerjaannya hingga merasa kerepotan untuk mengatur keuangan. Nah, dari masalah 
        tersebut terciptalah ide untuk memberi kemudahan untuk mengatur keuangan dengan baik.
       </p>
        <p align = justify>
        Manajemen Keuangan adalah sebuah sistem yang dirancang oleh anggota kelompok Mantap Betul
        yang beranggotakan 4 orang. Sistem ini dirancang untuk mengatur dan mengelola keuangan
        dengan mencatat pemasukan dan pengeluaran, serta hutang-piutang dari pengguna. Manajemen Keuangan dibangun
        dengan desain tampilan yang user-friendly untuk memudahkan pengguna supaya bisa mengatur dan mengelola
        keuangannya dengan cara yang lebih terstruktur, namun tetap dinamis.  </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
