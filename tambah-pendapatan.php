<?php
//include('dbconnected.php');
include('koneksi.php');

$status = $_GET['status'];
$jumlah = $_GET['jumlah'];
$keterangan = $_GET['keterangan'];
$username= $_GET['username'];
$tanggal = $_GET['tanggal'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `transaksikeuangan` (`status`, `jumlah`, `keterangan`, `username`, `tanggal`) VALUES ('$status', '$jumlah', '$keterangan', '$username', '$tanggal')");

if ($query) {
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>