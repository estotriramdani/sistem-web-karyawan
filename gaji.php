<?php 
  session_start();
  include_once './functions.php';
  include_once './variables.php';
  include_once './perhitungan.php';

  if (!isset($_SESSION['login'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location = 'pages/auth/login.php';</script>";
    // header("Location: pages/auth/login.php");
    exit;
  }

  if ($role != 3){
    header('Location: ./');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'pages/template/head.php'; ?>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Pojok Gaji</title>
  <style>
    .print-button {
      position: fixed; 
      bottom: 15px; 
      right: 100px;
    }
  </style>
</head>
<body class="bg-light">
  <?php include_once 'pages/template/navbar.php'; ?>

  <div class="print-button" ><a href="cetakslip.php" target="_blank" class="btn btn-primary" onclick="printSlip()">Cetak Slip</a></div>

  <div class="container mt-5" id="slip-wrapper">
    <div class="slip">
    <h3 class="text-primary ">Cetak Slip Gaji</h3>
    <table class="table  mt-4">
      <tbody>
        <tr>
          <td>Rekening Gaji</td>
          <td><?= $rekening_gaji; ?> (BNI)</td>
        </tr>
        <tr>
          <td>Penerima</td>
          <td colspan="2"><?= $nama; ?></td>
        </tr>
        <tr>
          <td>Gaji Pokok</td>
          <td>Rp<?= $gaji_pokok; ?></td>
        </tr>
        <tr>
          <td>Potongan BPJS Ketenagakerjaan</td>
          <td>Rp<?= $potonganBpjs; ?></td>
        </tr>
        <tr>
          <td>Potongan PPh1</td>
          <td>Rp<?= $pph21; ?></td>
        </tr>
        <tr>
          <td>Gaji Bersih (Take Home Pay)</td>
          <td>Rp<?= $takeHomePay; ?></td>
        </tr>
      </tbody>
    </table>
    <h4 class="text-primary">Keterangan</h4>
    <ul class="list-group" style="width: 50%;">
      <li class="list-group-item">Jumlah Hadir: <b><?= $jumlahHariMasuk; ?> hari</b></li>
      <li class="list-group-item">Jumlah Cuti: <b><?= $jumlahHariTidakMasuk; ?> hari</b></li>
      <li class="list-group-item">Jumlah Jam Lembur: <b><?= $jumlahJamLembur; ?> jam</b></li>
    </ul>
    </div>
  </div>

  <?php include_once 'pages/template/script.php'; ?>
  <script>
    const slipWrapper = document.getElementById('slip-wrapper').innerHTML;
      function printSlip() {
        // const slipWrapper = document.querySelector(".slip-wrapper");
        console.log(slipWrapper);
        localStorage.setItem("slip", slipWrapper);
        // alert('haha')
      }
    </script>



</body>
</html>