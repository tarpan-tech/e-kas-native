<?php
require 'connect.php';

$id_user  = $_POST['id_user'];
$id_kelas = $_POST['id_kelas'];
$nama     = $_POST['nama'];
$no_hp    = $_POST['no_hp'];

if ( !empty($id_user) && !empty($id_kelas) && !empty($nama) && !empty($no_hp) ) {

    $query = mysqli_query($conn, "INSERT INTO siswa VALUES('', '$id_user', '$id_kelas', '$nama', '$no_hp')");
    if ( $query == TRUE ) {
        echo "Berhasil menambahkan data siswa<br>Kembali ke<a href='admin.php?page=siswa'>halaman siswa</a>";
    } else {
        die('Gagal menambahkan data!').mysqli_error($conn);
    }
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>       