<?php
//include('dbconnected.php');
include('koneksi.php');

$id1 = $_GET['id1'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `transaksipiutang` WHERE id1 = '$id1'");

if ($query) {
 # credirect ke page index
 header("location:hutang.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>