<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengaduan Masyarakat | Rendra Ardika</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
	<nav class="navbar navbar-expand-lg" style="background-color:#AFEEEA;">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="color:black;"><strong>Aplikasi Pengaduan Masyarakat</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
         
          <?php 
          if ($_SESSION['login'] =='admin') { ?>
            <a class="nav-link" href="index.php?page=tanggapan" style="color:black;">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=pengaduan" style="color:black;">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=masyarakat" style="color:black;">Data Masyarakat</a>
            <a class="nav-link" href="index.php?page=petugas" style="color:black;">Data Petugas</a>
            <a class="nav-link" href="../config/aksi_logout.php" style="color:black;">Logout</a>

          <?php } elseif ($_SESSION['login'] =='petugas'){ ?>
            <a class="nav-link" href="index.php?page=pengaduan" style="color:black;">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=tanggapan" style="color:black;">Data Tanggapan</a>
            <a class="nav-link" href="../config/aksi_logout.php" style="color:black;">Logout</a>

          <?php } elseif ($_SESSION['login'] =='masyarakat'){ ?>
            <a class="nav-link" href="../config/aksi_logout.php" style="color:black;">Logout</a>
          <?php } else { ?>
            <a class="nav-link" href="index.php?page=registrasi" style="color:black;">Daftar Akun</a>
            <a class="nav-link" href="index.php?page=login" style="color:black;">Login</a>

          <?php } ?>
        
      </ul>
    </div>
  </div>
</nav>