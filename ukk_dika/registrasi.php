<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config/koneksi.php';

if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // lebih aman pakai password_hash()
    $telp = $_POST['telp'];
    $level = 'masyarakat';

    // Gunakan nama kolom eksplisit
    $query = mysqli_query($koneksi, "INSERT INTO masyarakat (nik, nama, alamat, username, password, telp, level) 
                                     VALUES ('$nik', '$nama', '$alamat', '$username', '$password', '$telp', '$level')");

    if ($query) {
        header('location:index.php?page=login');
        exit;
    } else {
        echo "<script>alert('Gagal registrasi: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!-- FORM HTML -->
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header" style="background-color:#AFEEEA;">
                <strong>REGISTRASI</strong>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <script>
                            function numberOnly(input) {
                                var regex = /[^0-9 ]/gi;
                                input.value = input.value.replace(regex, "");
                            }
                        </script>
                        <label class="form-label">NIK</label>
                        <input maxlength="16" class="form-control" name="nik" placeholder="Masukkan NIK" pattern="^(?=.*[0-9]).{16,}$" title="NIK Seharusnya memiliki 16 Angka." onkeyup="numberOnly(this)" required>
                    </div>

                    <div class="mb-3">
                        <script>
                            function lettersOnly(input) {
                                var regex = /[^a-z space ]/gi;
                                input.value = input.value.replace(regex, "");
                            }
                        </script>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" onkeyup="lettersOnly(this)" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" pattern="^(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{7,}$" title="Minimal 7 karakter, harus ada simbol, huruf kecil, dan angka." required>
                    </div>

                    <div class="mb-3">
                        <script>
                            function telpon(input) {
                                var regex = /[^0-9 ]/gi;
                                input.value = input.value.replace(regex, "");
                            }
                        </script>
                        <label class="form-label">No. Telp</label>
                        <input maxlength="13" class="form-control" name="telp" placeholder="Masukkan No. Telp" pattern="^(?=.*[0-9]).{12,}$" title="Nomor Telepon Setidaknya memiliki 12-13 Angka." required onkeyup="telpon(this)">
                    </div>

                    <div class="card-footer" style="background-color:#AFEEEA;">
                        <button type="submit" name="kirim" class="btn btn-primary">DAFTAR</button>
                        <a href="index.php?page=login" class="m-3">Sudah memiliki akun? Login disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
