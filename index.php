<?php 
  session_start();

  include_once './functions.php';

  if (!isset($_SESSION['login'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location = 'pages/auth/login.php';</script>";
    // header("Location: pages/auth/login.php");
    exit;
  }

  $nama = $_SESSION['nama'];
  $email = $_SESSION['email'];
  $rekening_gaji = $_SESSION['rekening_gaji'];
  $role = $_SESSION['role'];
  $harikerja = $_SESSION['jumlah_hari_kerja'];

  $gaji = query("SELECT * FROM gaji");

  foreach ($gaji as $g) {
    $harian = $g['harian'];
    $lembur = $g['lembur'];
    $potonganCuti = $g['potonganCuti'];
  }
  
  if ($harian == 0) {
    echo "<script>alert('Silakan tentukan dahulu gaji harian')</script>";
  }

  if ($lembur == 0) {
    echo "<script>alert('Silakan tentukan dahulu uang lembur')</script>";
  }

  if ($potonganCuti == 0) {
    echo "<script>alert('Silakan tentukan dahulu potongan uang cuti')</script>";
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Beranda</title>
    <?php include_once 'pages/template/head.php'; ?>
  </head>

  <body class="bg-light">
    <!-- navbar -->
  <?php include_once 'pages/template/navbar.php'; ?>

  <!-- pimpinan section -->
  <div class="container" style="<?php if ($role != 1){ echo "display: none;";} ?>">
    <div class="row mt-4 bg-white p-3 shadow-sm hoverable justify-content-center" style="transition: .3s;">
      <div class="col-sm-4 mb-3">
        <h5>Tentukan Gaji Harian</h5>
        <div class="row mt-4">
          <div class="col-sm-9 mb-3">
            <input
              type="number"
              class="form-control input-harian"
              value="<?= $harian; ?>"
            />
            <small>per hari</small>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary w-100" id="action-harian">
              Set
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mb-3">
        <h5>Tentukan Uang Lembur</h5>
        <div class="row mt-4">
          <div class="col-sm-9 mb-3">
            <input
              type="number"
              class="form-control input-lembur"
              value="<?= $lembur; ?>"
            />
            <small>per jam</small>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary w-100" id="action-lembur">
              Set
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mb-3">
        <h5>Tentukan Uang Potongan Cuti</h5>
        <div class="row mt-4">
          <div class="col-sm-9 mb-3">
            <input
              type="number"
              class="form-control input-cuti"
              value="<?= $potonganCuti; ?>"
            />
            <small>per hari</small>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary w-100" id="action-cuti">
              Set
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- grafik total hari kerja -->
    <div class="row ">
      <div class="col-sm-6 bg-white mt-4 mr-4  p-3 shadow-sm hoverable" style="transition: .3s;">
        <h5>Jumlah Hari Kerja dan Hari Libur Bulan Ini</h5>
        <small>Tanggal hari ini: <?php echo date('Y-m-d'); ?></small>
        <canvas id="harikerja"></canvas>
        <!-- chart js -->
        <script>
          var ctx = document.getElementById("harikerja").getContext('2d');
          var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Hari kerja", "Hari libur"],
            datasets: [{
              label: '',
              data: [<?php echo $harikerja; ?>,<?php echo $tgl_akhir - $harikerja; ?>],
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              ],
              borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
        </script>
       <!-- end chart js -->
      </div>
      <div class="col-sm-5 bg-white mt-4  p-3 shadow-sm hoverable" style="transition: .3s; position: relative;">
        <h5>Perbandingan Karyawan Laki-laki dan Perempuan</h5>
        <small>Update terakhir: <?php echo date('Y-m-d'); ?></small>
        <canvas id="myChart" class="mt-3"></canvas>
        <!-- chart js -->
        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
              label: '',
              data: [
              <?php 
              $jumlah_laki = mysqli_query($conn,"SELECT * from user where jenis_kelamin='L'");
              echo mysqli_num_rows($jumlah_laki);
              ?>, 
              <?php 
              $jumlah_perempuan = mysqli_query($conn,"SELECT * from user where jenis_kelamin='P'");
              echo mysqli_num_rows($jumlah_perempuan);
              ?>
              ],
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              ],
              borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
    
        </script>
        <!-- end chart js -->
      </div>
    </div>
    
    <script src="assets/js/finance.js"></script>
  </div>
    <!-- pimpinan section -->

    <!-- script -->
    <?php include_once 'pages/template/script.php'; ?>
  </body>
</html>
