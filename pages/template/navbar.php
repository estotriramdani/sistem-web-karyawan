<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="./">siswebkar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <?php if ($role != 2) : ?>
          <li class="nav-item">
            <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="ajuan-cuti.php">Ajuan Cuti</a>
          </li>
          <?php if ($role == 3 ): ?>
          <li class="nav-item">
            <a class="nav-link" href="gaji.php">Gaji Karyawan</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/auth/logout.php">Logout</a>
          </li> 
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->