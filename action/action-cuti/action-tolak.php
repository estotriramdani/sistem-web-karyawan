<?php 

$koneksi = mysqli_connect("localhost", "root", "", "j3d118129_esto");

$id = $_GET['id'];

$query = "UPDATE cuti SET status = 1 WHERE id = $id";

mysqli_query($koneksi, $query);

?>