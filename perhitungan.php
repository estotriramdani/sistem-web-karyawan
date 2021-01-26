<?php 

include_once './functions.php';
include_once './variables.php';

$jamKerja = 8;
$gaji = query("SELECT * FROM gaji");

foreach ($gaji as $g) {
    $gajiHarian = $g['harian'];
    $uangLembur = $g['lembur'];
  }

// hitung jumlah cuti
$cuti = mysqli_query($conn,"SELECT * from cuti");
$jumlahHariTidakMasuk = 0;
while($d = mysqli_fetch_array($cuti)) {
  if ($email == $d['email'])
  $jumlahHariTidakMasuk++;
}
// echo "Jumlah cuti ".$jumlahHariTidakMasuk. "<br>";

// hitung jumlah hadir
$kehadiran = mysqli_query($conn,"SELECT * from kehadiran");
$jumlahHariMasuk = 0;
while($d = mysqli_fetch_array($kehadiran)) {
  if ($email == $d['email']){
   $jumlahHariMasuk++;
  }
}
// echo "Jumlah hari masuk ".$jumlahHariMasuk. "<br>";

// hitung total jam lembur
$lembur = mysqli_query($conn,"SELECT * from lembur WHERE `email` = '$email'");
$jumlahJamLembur = 0;
while($d = mysqli_fetch_array($lembur)) {
  if ($email == $d['email']){
    $durasi = $d['durasi'];
    $durasi = intval($durasi);
    $jumlahJamLembur = $jumlahJamLembur + $durasi;
  }
}
// echo "Jumlah jam lembur ".$jumlahJamLembur. " jam <br>";


$gaji_pokok = ($jumlahHariMasuk - $jumlahHariTidakMasuk) * $jamKerja * $gajiHarian;
// echo $gaji_pokok. "<br>";

$uangLembur = $uangLembur * $jumlahJamLembur;
// echo $uangLembur. "<br>";

$potonganBpjs = ($gaji_pokok * 5 / 100);
$pph21 = ($gaji_pokok * 5 / 100);

$potongan = $potonganBpjs + $pph21;
// echo $potongan. "<br>";

$takeHomePay = $gaji_pokok + $uangLembur - $potongan;
// echo "Take home pay: $takeHomePay";



?>