<?php 
$query = "SELECT * FROM user";

$data = mysqli_query($conn, $query);

$tanggal = date('Y-m-d');

while($d = mysqli_fetch_assoc($data)) {
  $rek_gaji = $d['rekening_gaji'];
}

?>

<div class="container mt-4">
  
<h1 class="mb-4 text-primary">Halaman Karyawan</h1>
  <div class="row justify-content-center">
    <div class="col-sm-6 bg-white shadow-sm p-4 rounded mr-4 hoverable" style="transition: .3s;">
      <h5 class="mb-4">Presensi</h5>
      <form class="form-inline" method="POST" action="action/action-presensi/action-presensi.php">
        <input type="hidden" value="<?= $email; ?>" name="email">
        <input type="hidden" value="<?= $nama; ?>" name="nama">
        <div class="form-group mb-2">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Isi presensi tanggal">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" id="tanggal" value="<?php echo date('Y-m-d') ?>" name="tanggal" readonly>
        </div>
        <?php  
          $result  = mysqli_query($conn,"SELECT * FROM `kehadiran` WHERE `tanggal` = '$tanggal' AND `email` = '$email'");
          if (mysqli_num_rows($result) === 1){
            echo "<button type='submit' class='btn btn-success mb-2' disabled>Berhasil</button>";
          } else {
            echo "<button type='submit' class='btn btn-primary mb-2'>Konfirmasi</button>";
          }
        ?>
        
      </form>
      <?php 
      if (mysqli_num_rows($result) === 1){
        echo "<small><span class='text-success'>Anda sudah mengisi presensi</span></small>";
      } else {
        echo "<small><span class='text-danger'>Anda belum mengisi presensi</span></small>";
      }
      
      ?>
      
    </div>
    <div class="col-sm-5 bg-white shadow-sm p-4 rounded hoverable" style="transition: .3s;">
      <h5>Rekening Gaji</h5>
      <div class="row mt-4">
        <div class="col-sm-9 mb-3">
          <input
            type="text"
            class="form-control input-rekening"
            value="<?= $rek_gaji; ?>"
          />
          <small>Bank BNI</small>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-primary w-100" id="action-rekening">
            Set
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4 justify-content-center">
    <div class="col-sm-5 bg-white shadow-sm p-4 rounded mr-4 hoverable" style="transition: .3s;">
      <h5>Mau Lembur Hari Ini?</h5>
      <form action="action/action-lembur/action-lembur.php" method="post">
        <input type="hidden" value="<?= $nama; ?>" name="nama">
        <input type="hidden" value="<?= $email; ?>" name="email">
        <div class="form-group">
          <label for="tanggal">Tanggal Lembur</label>
          <input type="text" readonly class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal; ?>">
          <small>hari ini</small>
        </div>
        <div class="form-group">
          <label for="durasi">Durasi Lembur</label>
          <input type="number" class="form-control" id="durasi" name="durasi">
          <small>dalam jam</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Lembur</button>

      </form>
    </div>
    <div class="col-sm-6 bg-white shadow-sm p-4 rounded hoverable" style="transition: .3s;">
      <h5>Data Lembur Anda</h5>
      <small>Lima data lembur terakhir Anda</small>
      <table class="table">
        <tr>
          <th>Tanggal</th>
          <th>Durasi</th>
        </th>
        <?php 
          $datalembur = mysqli_query($conn,"SELECT * FROM lembur WHERE email = '$email' LIMIT 5");
          while($d = mysqli_fetch_array($datalembur)) {
        ?>
        <tr>
          <td><?= $d['tanggal']; ?></td>
          <td><?= $d['durasi']; ?> jam</td>
        </tr>
        <?php } ?>

      </table>
    </div>
  </div>



<script src="assets/js/rekening.js"></script>
<script>
  const hoverable = document.querySelectorAll(".hoverable");

    for (let i = 0; i < hoverable.length; i++) {
      hoverable[i].addEventListener("mouseenter", function () {
        hoverable[i].classList.add("shadow");
      });
      hoverable[i].addEventListener("mouseleave", function () {
        hoverable[i].classList.remove("shadow");
      });
    }
</script>
</div>
<br>
<br>