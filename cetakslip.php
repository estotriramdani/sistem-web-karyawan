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
    <title>Cetak Slip</title>
    <?php include_once 'pages/template/head.php'; ?>
    <style type="text/css" media="print">
      @page {
        size: landscape;
      }
    </style>
    <style>
      .print-button {
        position: fixed; 
        bottom: 15px; 
        right: 100px;
      }
      * {
        color-adjust: exact !important; /*Firefox*/
      }
      body {
        height: 98vh;
      }
      .sertifikat-wrapper {
        transform: scale(1.2, 1.2);
        -webkit-print-color-adjust: exact;
      }
    </style>
  </head>

    <body class="bg-light">
    <!-- navbar -->
    <div class="print-button" ><button class="btn btn-primary" onclick="printSlip()">Cetak Slip</button></div>
    <div class="container" id="slip-wrapper">
      
    </div>

    <!-- script -->
    <?php include_once 'pages/template/script.php'; ?>
    <script>
      let slipWrapper = document.querySelector("#slip-wrapper");
      slipWrapper.innerHTML = localStorage.getItem("slip");
      function printSlip() {
        window.print();
      }

      printSlip();  
    </script>
  </body>
</html>
