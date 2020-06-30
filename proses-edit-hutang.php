<?php
//include('dbconnected.php');
session_start();
include('koneksi.php');

$id1 = $_GET['id1'];
$status1 = $_GET['status1'];
$jumlah1 = $_GET['jumlah1'];
$nama1= $_GET['nama1'];
$username1= $_GET['username1'];
$tanggal1= $_GET['tanggal1'];

//query update
$query = mysqli_query($koneksi,"UPDATE transaksipiutang SET status1='$status1', jumlah1='$jumlah1', nama1='$nama1', username1='$username1', tanggal1='$tanggal1' WHERE id1='$id1' ");

 define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}
//jika benar

$namaadmin = $_SESSION['nama1'];


if ($query) {
write_log("Nama Admin : ".$namaadmin." => Edit Hutang => ".$id1." => Sukses ");
 # credirect ke page index
 header("location:hutang.php?pesan=berhasil_update"); 
}
else{
	write_log("Nama Admin : ".$namaadmin." => Edit hutang => ".$id." => Gagal");
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>