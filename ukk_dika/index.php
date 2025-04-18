<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengaduan Masyarakat | Rendra Ardika </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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
               <li class="nav-item">
          <a class="nav-link" style="color:black;" href="index.php?page=registrasi">Daftar Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:black;" href="index.php?page=login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
if (isset($_GET['page'])) {
	$page= $_GET['page'];

	switch ($page) {
		case 'login':
			include 'login.php';
			break;
		case 'registrasi':
			include 'registrasi.php';
			break;

		default:
			echo "Halaman tidak tersedia";
			break;
	}
} else {
	include 'home.php';
}

?>


<footer class="footer py-2" style="margin-top: auto; background-color:#AFEEEA; color:black">
	<div class="container">
		<p class="text-center"><strong>UKK RPL 2023 | Rendra Ardika| SMK Negeri Jatirogo</strong></p>
	</div>
</footer>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>