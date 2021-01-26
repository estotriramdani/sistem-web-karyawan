<?php 

$tanggal = date('Y-m-d');
?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<div class="container mt-5" ng-app="">
  <div class="row">
    <div class="col-sm-12 bg-white shadow-sm p-4 rounded hoverable mr-4" style="transition: .3s;">
      <h5 class="mb-4">Ajukan Cuti</h5>
      <form action="action/action-cuti/action-ajukan.php" method="post">
        <label for="">Durasi</label>
        <div class="row form-group">
          <div class="col">
            <input type="number" class="form-control" placeholder="Tanggal mulai" name="jumlahMulai" ng-model="jumlah">
          </div>
          <div class="col-1">sampai</div>
          <div class="col">
            <input type="number" class="form-control" placeholder="Tanggal berakhir" name="jumlah" value="{{jumlah + 1}}">
            <small></small>
          </div>
          <div class="col">Januari 2021</div>
        </div>

        <input type="hidden" name="email" value="<?= $email; ?>">
        <input type="hidden" name="nama" value="<?= $nama; ?>">
        <input type="hidden" name="status" value="<?= $status; ?>">
        <input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
        
        <button type="submit" class="btn btn-primary">Ajukan Cuti</button>

      </form>
    </div>
  </div>

  <div class="row mt-4">
    
    <div class="col-sm-12 bg-white shadow-sm p-4 rounded hoverable" style="transition: .3s;">
      <h5 class="mb-4">Status Pengajuan Cuti Anda</h5>
        <table class="table shadow" >
        <thead class="bg-primary">
          <tr class="text-white">
            <th scope="col">ID Cuti</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $data = mysqli_query($conn,"SELECT * from cuti WHERE email = '$email'");
            while($d = mysqli_fetch_array($data)) {
          ?>
          <tr>
            <td ><?= $d['id']; ?></td>
            <td ><?= $d['tanggal']; ?></td>
            <td><?= $d['jumlah']; ?> hari</td>
            <td >
              <?php if ($d['status'] == 0) { ?>
                <button class="btn btn-warning text-white">Proses Peninjauan</button>
              <?php } else if ($d['status'] == 1) { ?>
                <button class="btn btn-danger">Ditolak</button>
              <?php } else if ($d['status'] == 2) { ?>
                <button class="btn btn-success">Disetujui</button>
              <?php }  ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- script -->
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