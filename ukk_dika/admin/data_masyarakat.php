<div class="container">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="card-header" style="background-color:#AFEEEA;">
				<strong>DATA MASYARAKAT</strong></div>
				<div class="card-body">
					<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
					<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="background-color:lightgreen;">
									<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Tambah Data Masyarakat</strong></h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="" method="POST">
										<div class="row mb-3">
											<script type="text/javascript">
											function numberOnly(input){
												var regex = /[^0-9 ]/gi;
												input.value = input.value.replace(regex,"");
												}
											</script>
											<label class="col-md-4"><strong>NIK</strong></label>
											<div class="col-md-8">
												<input maxlength="16" name="nik" class="form-control" placeholder="Masukkan NIK" required onkeyup="numberOnly(this)">
											</div>
										</div>
										<div class="row mb-3">
											<script type="text/javascript">
							function lettersOnly(input){
								var regex = /[^a-z space ]/gi;
								input.value = input.value.replace(regex,"");
							}
						</script>
											<label class="col-md-4"><strong>Nama Lengkap</strong></label>
											<div class="col-md-8">
												<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required onkeyup="lettersOnly(this)">
											</div>
										</div>
										<div class="row mb-3">
											<label class="col-md-4"><strong>Alamat</strong></label>
											<div class="col-md-8">
												<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
											</div>
										</div>
										<div class="row mb-3">
											<label class="col-md-4"><strong>Username</strong></label>
											<div class="col-md-8">
												<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
											</div>
										</div>
										<div class="row mb-3">
											<label class="col-md-4"><strong>Password</strong></label>
											<div class="col-md-8">
												<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
											</div>
										</div>
										<script type="text/javascript">
							function telp(input){
								var regex = /[^0-9 ]/gi;
								input.value = input.value.replace(regex,"");
							}
						</script>
										<div class="row mb-3">
											<label class="col-md-4"><strong>Nomor Telpon</strong></label>
											<div class="col-md-8">
												<input maxlength="13" name="telp" class="form-control" placeholder="Masukkan Telp" pattern="^(?=.*[0-9]).{12,}$" title="Nomor Telepon Setidaknya memiliki 12-13 Angka." required onkeyup="telp(this)">
											</div>
										</div>
									<div class="modal-footer">
										<button type="submit" name="kirim" class="btn btn-primary">Tambah Data</button>
									</div>
								</form>

								<?php 
								include '../config/koneksi.php';
								if (isset($_POST['kirim'])) {
									$nik = $_POST['nik'];
									$nama = $_POST['nama'];
									$alamat= $_POST['alamat'];
									$username = $_POST['username'];
									$password = md5($_POST['password']);
									$telp = $_POST['telp'];
									$level = 'masyarakat';

									$query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik', '$nama', '$alamat', '$username', '$password','$telp','$level')");
									if ($query) {
										header('location:index.php?page=masyarakat');
									}
								}


							?>

						</div>
					</div>
				</div>
			</div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>NIK</th>
						<th>NAMA</th>
						<th>ALAMAT</th>
						<th>USERNAME</th>
						<th>TELP</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include '../config/koneksi.php';
					$no = 1;
					$query = mysqli_query($koneksi, "SELECT * FROM masyarakat");
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['telp']; ?></td>
							<td>								
								<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['nik'] ?>">Hapus</a>
								<!-- Modal Hapus-->
								<div class="modal fade" id="hapus<?php echo $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="edit_data.php" method="POST">
													<input type="hidden" name="nik" class="form-control" value="<?php echo $data['nik'] ?>">
													<p>Apakah yakin akan menghapus data? <br><?php echo $data['nama'] ?></p>
												</div>
												<div class="modal-footer">
													<button type="submit" name="hapus_masyarakat" class="btn btn-danger">Hapus</button>
												</div>
											</form>

										</div>
									</div>
								</div>
							</td>

						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>