<?php
//include('dbconnected.php');
include('koneksi.php');


$status1 = $_GET['status1'];
$jumlah1 = $_GET['jumlah1'];
$nama1= $_GET['nama1'];
$username1= $_GET['username1'];
$tanggal1= $_GET['tanggal1'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `transaksipiutang` (`status1`, `jumlah1`, `nama1`, `username1`, `tanggal1`) VALUES ('$status1', '$jumlah1','$nama1', '$username1', '$tanggal1')");

if ($query) {
 # credirect ke page index
 header("location:hutang.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>