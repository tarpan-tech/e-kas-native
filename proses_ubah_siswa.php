<?php
require 'connect.php';

$id_siswa  = $_POST['id_siswa'];
$id_user   = $_POST['id_user'];
$id_kelas  = $_POST['id_kelas'];
$nama      = $_POST['nama'];
$no_hp     = $_POST['no_hp'];

if ( !empty($id_user) && !empty($id_kelas) && !empty($nama)&& !empty($no_hp) ) {

    $query = mysqli_query($conn, "UPDATE siswa SET id_user='$id_user', id_kelas='$id_kelas', nama='$nama', no_hp='$no_hp' WHERE id_siswa='$id_siswa'");
    if ( $query == TRUE ) {
        echo "Berhasil mengubah data siswa<br>Kembali ke<a href='admin.php?page=siswa'>halaman siswa</a>";
    } else {
        die('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>