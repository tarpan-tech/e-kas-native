<?php
session_start();
require 'connect.php';

$id_user  = $_SESSION['id_user'];
$nama     = $_POST['nama'];
$no_hp    = $_POST['no_hp'];
$id_kelas = $_POST['id_kelas'];

if ( !empty($id_kelas) && !empty($nama) && !empty($no_hp) ) {

    $query = mysqli_query($conn, "UPDATE siswa SET id_kelas='$id_kelas', nama='$nama', no_hp='$no_hp' WHERE id_user = '$id_user'");
    if ( $query == TRUE ) {
        echo "Berhasil memperbarui profil<br>Kembali ke<a href='admin.php?page=profil'>halaman profil</a>";
    } else {
        echo('Gagal memperbarui profil!').mysqli_error($conn);
    }
} else {
    die('Tidak boleh ada data yang kosong!');
}

