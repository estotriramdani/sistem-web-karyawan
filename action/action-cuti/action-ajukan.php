<?php 
include_once '../../functions.php';

$email = $_POST['email'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$jumlahMulai = $_POST['jumlahMulai'];
$tanggal = $_POST['tanggal'];
$status = 0;

if ($jumlah <= $jumlahMulai){
  echo "<script>alert('Tanggal berakhir harus lebih besar dari tanggal mulai'); window.location = '../../ajuan-cuti.php';</script>";
  exit;
}
$jumlahHariCuti = $jumlah - $jumlahMulai;



$query = "INSERT INTO cuti VALUES ('', '$nama', '$email', '$jumlahHariCuti', '$status', '$tanggal')";

mysqli_query($conn, $query);

echo "<script>alert('Pengajuan cuti  berhasil'); window.location = '../../ajuan-cuti.php';</script>";


// echo "$email $nama $jumlah $tanggal $status";


?>