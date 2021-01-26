<?php 
  session_start();

  include_once './functions.php';
  include_once './variables.php';

  if (!isset($_SESSION['login'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location = 'pages/auth/login.php';</script>";
    // header("Location: pages/auth/login.php");
    exit;
  }

  $gaji = query("SELECT * FROM gaji");

  foreach ($gaji as $g) {
    $harian = $g['harian'];
    $lembur = $g['lembur'];
  }
  
  if ($role == 1){
    if ($harian == 0) {
      echo "<script>alert('Silakan tentukan dahulu gaji harian')</script>";
    }

    if ($lembur == 0) {
      echo "<script>alert('Silakan tentukan dahulu uang lembur')</script>";
    }

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

  <?php 
    if ($role == 1){
      include_once 'pages/user/pimpinan.php';
    } else if ($role == 3){
      include_once 'pages/user/karyawan.php';
    } else if ($role == 2){
      header('Location: ajuan-cuti.php');
    } 
  
  ?>

    <!-- script -->
    <?php include_once 'pages/template/script.php'; ?>
  </body>
</html>
