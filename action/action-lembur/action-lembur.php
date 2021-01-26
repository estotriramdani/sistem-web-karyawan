<?php  

include_once '../../functions.php';


$nama =  $_POST['nama'];
$durasi = $_POST['durasi'];
$email = $_POST['email'];
$tanggal = $_POST['tanggal'];

$query = "INSERT INTO lembur VALUES('', '$nama', '$email' ,'$tanggal', '$durasi')";

mysqli_query($conn, $query);

echo "
<script>
alert('Data lembur Anda sudah tersimpan');
window.location = '../../';
</script>";

?>