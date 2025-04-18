<?php
include '../config/koneksi.php';
		if(isset($_POST['edit']))
		{	
			$id_pengaduan=$_POST['id_pengaduan'];
			$judul_laporan=$_POST['judul_laporan'];
			$isi_laporan=$_POST['isi_laporan'];
$folder = "../assets/img/";
$image_file=$_FILES['foto']['name'];
 $file = $_FILES['foto']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if($file!=''){
//Set image upload size 
    if ($_FILES["foto"]["size"] > 500000) {
   $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
//Allow only JPG, JPEG, PNG & GIF 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}
if(!isset($error))
{
	if($file!='')
	{
		$res=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan=$id_pengaduan ");
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['foto']; 
}
unlink($folder.$deleteimage);
move_uploaded_file($file,$target_file); 
$result=mysqli_query($koneksi,"UPDATE pengaduan SET judul_laporan='$judul_laporan', isi_laporan='$isi_laporan',foto='$image_file' WHERE id_pengaduan=$id_pengaduan"); 
	}
	else 
	{
	$result=mysqli_query($koneksi,"UPDATE pengaduan SET judul_laporan='$judul_laporan',isi_laporan='$isi_laporan' WHERE id_pengaduan=$id_pengaduan"); 	
	} 
if($result)
{
 header("location:index.php");
}
else 
{
	echo 'Something went wrong'; 
}
}
		}


if(isset($error)){ 

foreach ($error as $error) { 
	echo '<div class="message">'.$error.'</div><br>'; 	
}

}
$res=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan=$id_pengaduan");
if($row=mysqli_fetch_array($res)) 
{
	$judul_laporan=$row['judul_laporan']; 
	$isi_laporan=$row['isi_laporan']; 
$image=$row['foto']; 

}
	?> 