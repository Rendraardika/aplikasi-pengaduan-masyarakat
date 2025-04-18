<?php 
include '../config/koneksi.php';
$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
$jml_masyarakat = mysqli_num_rows($masyarakat);

$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
$jml_pengaduan = mysqli_num_rows($pengaduan);

$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan");
$jml_tanggapan = mysqli_num_rows($tanggapan);

$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
$jml_petugas = mysqli_num_rows($petugas);
 ?>

<div class="container">
	<h3  class="mt-3">Dashboard</h3>
	<div class="row mt-3">
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header" style="background-color:#AFEEEA;"><strong>Masyarakat</strong></div>
				<div class="card-body"><?php echo $jml_masyarakat; ?> Orang</div>
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header" style="background-color:#AFEEEA;"><strong>Pengaduan</strong></div>
				<div class="card-body"><?php echo $jml_pengaduan; ?> Aduan</div>
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header" style="background-color:#AFEEEA;"><strong>Tanggapan</strong></div>
				<div class="card-body"><?php echo $jml_tanggapan; ?> Tanggapan</div>
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header" style="background-color:#AFEEEA;"><strong>Petugas</strong></div>
				<div class="card-body"><?php echo $jml_petugas; ?> Pengguna</div>
			</div>
		</div>
		
	</div>
</div>