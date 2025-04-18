<div class="container">
	<div class="row">
		<div class="col-md-12" mt-3>
			<p>Selamat Datang <?php echo $_SESSION['nama'] ?></p>
			<div class="card">
			<div class="card-header">
				FORM PENGADUAN
			</div>
			<div class="card-body">
			<form action=""method="POST" enctype="multipart/form-data">
				<div class="mb-3">
					<label  class="form-label">Judul Laporan</label>
					<input type="text" class="form-control" name="judul_laporan" placeholder="Masukan judul" required>
				</div>
				<div class="mb-3">
					<label  class="form-label">Isi Laporan</label>
					<textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required></textarea>
				</div>	
				<div class="mb-3">
					<label  class="form-label">Foto</label>
					<input type="file" class="form-control" name="foto" required>
				  </div>
				</div>		
				<div class="card-footer">
				  <button type="submit" name="kirim" class="btn btn-primary">KIRIM</button>
			 </div>
		  </form>
		  <?php
           include '../config/koneksi.php';
           $tanggal = date("Y-m-d");
           if (isset($_POST['kirim'])) {
           	$nik = htmlspecialchars($_SESSION['nik']);
           	$judul_laporan =htmlspecialchars( $_POST['judul_laporan']);
           	$isi_laporan =htmlspecialchars($_POST['isi_laporan']);
           	$status = 0;
           	$foto = $_FILES['foto']['name'];
           	$tmp = $_FILES['foto']['tmp_name'];
           	$lokasi = '../assets/img/';
           	$nama_foto = rand(0,999).'-'.$foto;

           	move_uploaded_file($tmp, $lokasi.$nama_foto);
           	$query = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('','$tanggal','$nik','$judul_laporan', '$isi_laporan','$nama_foto', '$status')");
           	echo " <script>
alert('Data Berhasil Dikirim!');
window.location='index.php';

</script>
           	";
           }

		  ?>
	    </div>

	  </div> 
	</div>

	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="card-header">
					RIWAYAT PENGADUAN
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>NO</th>
								<th>JUDUL</th>
								<th>ISI</th>
								<th>POTO</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$nik = $_SESSION['nik'];
							$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE $nik='$nik' ORDER BY id_pengaduan DESC");
							while ($data =mysqli_fetch_array($query)) {?>
                         <tr>
                         	<td><?php echo $no++; ?></td>
                         	<td><?php echo $data['judul_laporan'] ?></td>
                         	<td><?php echo $data['isi_laporan'] ?></td>
                         	<td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
                         	<td>
                         		<?php 
                         		if ($data['status'] == 'proses') {
                         			echo "<span class='badge bg-warning'>Proses</span>";
                         		}elseif ($data['status'] == 'selesai') {
                                echo "<span class='badge bg-success'>Selesai</span>";
                                echo "<br><a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]'>Lihat Tanggapan</a>";
                         		}else{
                         			echo "<span class='badge bg-danger'>Menunggu</span>";
                         		}

                                ?>
                         	</td>
                         	<td>
                         	
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $data['id_pengaduan'] ?>">
											Edit
										</button>

										<!-- Modal Edit -->
										<div class="modal fade" id="editModal<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengaduan</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="update.php" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
															<div class="row mb-3">
																<label class="col-md-4">Judul</label>
																<div class="col-md-8">
																	<input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" required>
																</div>
															</div> 
															<div class="row mb-3">
																<label class="col-md-4">Isi</label>
																<div class="col-md-8">
																	<textarea name="isi_laporan" class="form-control" required><?php echo $data['isi_laporan'] ?> </textarea>
																</div>
															</div> 
															<div class="row mb-3">
																<label class="col-md-4">Foto</label>
																<div class="col-md-8">
																	<img src="../assets/img/<?php echo $data['foto'] ?>"width="100">

																	<input type="file" id="fileToUpload" name="foto" >
																	<input type="hidden" name="fotobaru" value="<?php echo $data['foto'] ?>" >

																</div>
																<div class="modal-footer">
																	<button type="submit" name="edit" class="btn btn-primary">Edit</button>
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