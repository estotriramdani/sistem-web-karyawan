<?php 
	session_start();
  include_once '../../functions.php';
  include_once '../../harikerja.php';


  if (isset($_SESSION['login'])) {
    header("Location: ../../");
    exit;
  }
  
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

		// cek username
		if (mysqli_num_rows($result) === 1){
			// cek password 
			$row = mysqli_fetch_assoc($result);
			
			if (password_verify($password, $row['password'])){
				
				// set session
				$_SESSION["login"] = true;
				$_SESSION["email"] = $row['email'];
				$_SESSION["nama"] = $row['nama'];
				$_SESSION["jenis_kelamin"] = $row['jenis_kelamin'];
				$_SESSION["rekening_gaji"] = $row['rekening_gaji'];
        $_SESSION["role"] = $row['role'];
        $_SESSION['jumlah_hari_kerja'] = $hari_kerja;
        $_SESSION['tgl_akhir'] = $tgl_akhir;

				header("Location: ../../");
				exit();
			}
		}

		$error = true;
	}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hallo Dunia</title>
    <!-- vendor -->
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="../../vendor/font-awesome/css/font-awesome.min.css"
    />
    <!-- custon css -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
  </head>
  <body class="bg-light">

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-6 p-4 bg-white rounded shadow">
          <h3 class="mb-3">Login Sistem Web Karyawan</h3>
          <form acion="" method="POST">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </form>
        </div>
      </div>
      <div class="row mt-4 mb-5 justify-content-center ">
        <div class="col-sm-6 ">
        <center>  
        <p>Belum punya akun?</p> 
          <a href="./registrasi.php" class="btn btn-success">Daftar</a>
          </center>
        </div>
      </div>
    </div>
    <!-- script -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
