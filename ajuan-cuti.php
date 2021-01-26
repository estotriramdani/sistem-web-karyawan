<?php 

  session_start();

  include_once './functions.php';
  include_once './variables.php';

  if (!isset($_SESSION['login'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location = 'pages/auth/login.php';</script>";
    // header("Location: pages/auth/login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'pages/template/head.php'; ?>
  <title>Ajuan Cuti</title>
</head>
<body class="bg-light">
  <?php include_once 'pages/template/navbar.php'; ?>

  <?php if ($role == 1 | $role == 2){
    include_once 'pages/user/cuti-pimpinan.php';
  } 
  ?>

  <?php if ($role == 3){
    include_once 'pages/user/cuti-karyawan.php';
  } 
  ?>

  <?php include_once 'pages/template/script.php'; ?>
</body>
</html>