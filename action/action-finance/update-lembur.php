<?php 

$koneksi = mysqli_connect("localhost", "root", "", "j3d118129_esto");

$value = $_GET['value'];

$query = "UPDATE gaji SET lembur = '$value' WHERE id = 1";

mysqli_query($koneksi, $query);

?>