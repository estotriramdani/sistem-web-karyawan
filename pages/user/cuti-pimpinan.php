<div class="container">
    <h2 class="text-primary mt-4 mb-3">Pengajuan Cuti Karyawan</h2>
    <table class="table shadow" >
      <thead class="bg-primary">
        <tr class="text-white">
          <th scope="col">id</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Aksi / Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $data = mysqli_query($conn,"SELECT * from cuti");
          while($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?= $d['id']; ?></td>
          <td><?= $d['nama']; ?></td>
          <td><?= $d['email']; ?></td>
          <td><?= $d['jumlah']; ?> hari</td>
          <td>
            <?php if ($d['status'] == 0) { ?>
              <a href="action/action-cuti/action-setujui.php?id=<?= $d['id']; ?>" class="btn btn-success" id="setujui">Setujui</a>
              <a href="action/action-cuti/action-tolak.php?id=<?= $d['id']; ?>" class="btn btn-danger" id="tolak">Tolak</a>
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

    <script src="assets/js/cuti.js"></script>
  </div>