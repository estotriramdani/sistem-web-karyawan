<?php 

include_once 'harikerja.php';

$conn = mysqli_connect("localhost", "root", "", "j3d118129_esto");

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function registrasi($data){
  global $conn;

  $email = strtolower($data["email"]);
  $nama = $data["nama"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $role = intval($data["role"]);
  $rekening_gaji = strtolower($data["rekening_gaji"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

  if (mysqli_fetch_assoc($result)){
    echo "
      <script>alert('Username yang dipilih sudah terdaftar')</script>
    ";
    return false;
  }

  // cek konfirmasi password
  if ($password !== $password2){
    echo "
      <script>alert('Password tidak sesuai')</script>
    ";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  // tambahkan userbaru ke database
  mysqli_query($conn, "INSERT INTO user VALUES ('','$role', '$email', '$password', '$jenis_kelamin', '$nama', '$rekening_gaji')");
  
  return mysqli_affected_rows($conn);
}