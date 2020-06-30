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

  <title>Transaksi Utang-Piutang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require 'sidebar.php'; 

$user     = $_SESSION['username'];

$piutang_hari_ini = mysqli_query($koneksi, "SELECT (SELECT SUM(jumlah1) FROM transaksipiutang where username1='$user' AND status1='PIUTANG') AS PIUTANG");
$piutang_hari_ini = mysqli_fetch_array($piutang_hari_ini);

$hutang_hari_ini = mysqli_query($koneksi, "SELECT (SELECT SUM(jumlah1) FROM transaksipiutang where username1='$user' AND status1='HUTANG') AS HUTANG");
$hutang_hari_ini = mysqli_fetch_array($hutang_hari_ini);


$pepiutang=mysqli_query($koneksi,"SELECT * FROM transaksipiutang where username1='$user' AND status1='PIUTANG'");
while ($piutang=mysqli_fetch_array($pepiutang)){
$arraypiutang[] = $piutang['jumlah1'];
}
$jumlahpiutang = array_sum($arraypiutang);

$pehutang=mysqli_query($koneksi,"SELECT * FROM transaksipiutang where username1='$user' AND status1='HUTANG'");
while ($hutang=mysqli_fetch_array($pehutang)){
$arrayhutang[] = $hutang['jumlah1'];
}
$jumlahhutang = array_sum($arrayhutang);

$aset = $jumlahpiutang - $jumlahhutang;

?>

      <!-- Main Content -->
      <div id="content">
	  
<?php require 'navbar.php'; ?>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Piutang</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($piutang_hari_ini['0'],2,',','.');?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div> 
</div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Hutang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($hutang_hari_ini['0'],2,',','.');?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div> 
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Aset</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?=number_format($aset,2,',','.');?></div>
                        </div>   
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
              </div>
            </div>
          </div>
</div>


          <!-- Page Heading -->
          
<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Tambah Transaksi Utang-Piutang</i></button><br>

          
          <!-- Content Row -->
          <div class="row">
		  
		            <!-- DataTales Example -->
                <div class="col-xl-11 col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Utang-Piutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					            <th>ID</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
<?php 
$user    = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT * FROM transaksipiutang WHERE username1='$user' ORDER BY id1 ASC");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{ $tanggal1    = date_format(date_create($data['tanggal1']), "Y/m/d");
?>
                    <tr>
					            <td><?=$no++?></td>
                      <td><?=$data['status1']?></td>
                      <td><?=$data['jumlah1']?></td>
                      <td><?=$data['nama1']?></td>
                      <td><?=$data['username1']?></td>
                      <td><?=$data['tanggal1']?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id1']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id1']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Hutang</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-hutang.php" method="get">

<?php
$id1 = $data['id1']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM transaksipiutang WHERE id1='$id1'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id1" value="<?php echo $row['id1']; ?>">


<div class="form-group">
<label>Status</label>
<select class="form-control" name="status1">
<option value="PIUTANG" <?php if($data=="PIUTANG"){echo "selected";} ?>  >PIUTANG</option>
<option value="HUTANG" <?php if($data=="HUTANG"){echo "selected";} ?>  >HUTANG</option>
</select>
</div>

<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah1" class="form-control" value="<?php echo $row['jumlah1']; ?>">      
</div>

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama1" class="form-control" value="<?php echo $row['nama1']; ?>">      
</div>

<div class="form-group">
<label>Username</label>
<input type="text" name="username1" class="form-control" value="<?php echo $row['username1']; ?>">      
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal1" class="form-control" value="<?php echo $row['tanggal1']; ?>">      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="hapus-hutang.php?id1=<?=$row['id1'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



<!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Catatan</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-hutang.php" method="get">
        <div class="modal-body">
		ID : 
         <input type="text" class="form-control" name="id">
    Status : 
         <select class="form-control" name="status1">
		 <option value="PIUTANG" >PIUTANG</option>
		 <option value="HUTANG" >HUTANG</option>
		 </select>
		Jumlah : 
         <input type="number" class="form-control" name="jumlah1">
		Nama: 
         <input type="text" class="form-control" name="nama1">
		Username : 
         <input type="text" class="form-control" name="username1"> 
    Tanggal : 
         <input type="date" class="form-control" name="tanggal1">   
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
		<button type="submit" class="btn btn-success" >Tambah</button>
		</form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>


<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["7 hari lalu","6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
    datasets: [{
      label: "Pendapatan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php echo $tujuhhari['0']?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

  
  </script>
  
  <script type="text/javascript">
  
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Pendapatan", "Pengeluaran"],
    datasets: [{
      data: [<?php echo $pendapatan ?>, <?php echo $pengeluaran ?>],
      backgroundColor: ['#4e73df', '#e74a3b'],
      hoverBackgroundColor: ['#2e59d9', '#e74a3b'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  
  </script>

</body>

</html>
