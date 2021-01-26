<?php 
session_start();
include_once '../../variables.php';

$koneksi = mysqli_connect("localhost", "root", "", "j3d118129_esto");

$value = $_GET['value'];
$rekening_gaji = $value;

$query = "UPDATE user SET rekening_gaji = $value WHERE email = '$email'";

mysqli_query($koneksi, $query);

?>