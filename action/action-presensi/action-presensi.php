<?php 

  require '../../functions.php';
  $koneksi = mysqli_connect("localhost", "root", "", "j3d118129_esto");

$nama = $_POST['nama'];
$email = $_POST['email'];
$tanggal = $_POST['tanggal'];

$query = "INSERT INTO kehadiran VALUES ('', '$email', '$nama', '$tanggal')";

mysqli_query($koneksi, $query);

echo "
<script>
alert('berhasil mengisi presensi');
window.location = '../../';
</script>
";

// header('Location: ../../ajuan-cuti.php');

?>