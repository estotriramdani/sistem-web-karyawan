<?php 
require '../../functions.php';

  if ( isset($_POST['register'])){

    if (registrasi($_POST) > 0 ) {
      echo "
        <script>alert('User baru berhasil diitambahkan'); window.location = './login.php';</script>
      ";
    }  else {
      echo mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
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
          <h2 class="mt-3 mb-4">Registrasi User Baru</h2>
          <form action="" method="post">
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  id="email"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" id="nama" required/>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label"
                >password</label
              >
              <div class="col-sm-9">
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  id="password"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-sm-3 col-form-label"
                >konfirmasi password</label
              >
              <div class="col-sm-9">
                <input
                  type="password"
                  class="form-control"
                  name="password2"
                  id="password2"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-3 col-form-label"
                >jenis_kelamin</label
              >
              <div class="col-sm-9">
                <select
                  name="jenis_kelamin"
                  id="jenis_kelamin"
                  class="form-control"
                >
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="role" class="col-sm-3 col-form-label"
                >role</label
              >
              <div class="col-sm-9">
                <select
                  name="role"
                  id="role"
                  class="form-control"
                >
                <option value="3">Karyawan</option>
                  <option value="1">Pimpinan</option>
                  <option value="2">Admin</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="rekening_gaji" class="col-sm-3 col-form-label"
                >rekening_gaji</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="rekening_gaji"
                  id="rekening_gaji"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="register">
                  Registrasi
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-6">
          <center>
            <p> Sudah punya akun?</p> 
            <a href="./login.php" class="btn btn-success">Login</a>
          </center>
        </div>
      </div>
    </div>
    <!-- script -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
