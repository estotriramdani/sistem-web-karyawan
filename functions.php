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

function tambah($data) {
  global $conn;

  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  
  // upload gambar
  $gambar = upload();
  if (!$gambar){
    return false;
  }

  // query insert data
  $query = "INSERT INTO mahasiswa
            VALUES 
            ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}

function upload() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
      alert('Pilih gambar terlebih dahulu');
    </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpeg', 'jpg', 'png', 'gif'];
  $ekstensiGambar = explode(".", $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
      alert('Bukan gambar');
    </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
      ukurang gambar terlalu besar
    </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();

  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
  
  return $namaFileBaru;
}

function hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah ($data) {
  global $conn;
  $id = $data['id'];
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  // query insert data
  $query = "UPDATE mahasiswa SET 
              nrp = '$nrp',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = $id
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $query = "SELECT * FROM mahasiswa
              WHERE
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
  return query($query);
}

function registrasi($data){
  global $conn;

  $email = strtolower($data["email"]);
  $nama = strtolower($data["nama"]);
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