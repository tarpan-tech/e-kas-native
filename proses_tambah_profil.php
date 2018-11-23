<?php
session_start();
require 'connect.php';

$id_user  = $_SESSION['id_user'];
$nama     = $_POST['nama'];
$no_hp    = $_POST['no_hp'];
$id_kelas = $_POST['id_kelas'];

if ( !empty($id_kelas) && !empty($nama) && !empty($no_hp) ) {

    $query = mysqli_query($conn, "INSERT INTO siswa VALUES('', '$id_user', '$id_kelas', '$nama', '$no_hp')");
    if ( $query == TRUE ) {
        echo "Berhasil menambahkan data profil<br>Silahkan <a href='logout.php'>logout</a> terlebih dahulu kemudian login kembali";
    } else {
        echo('Gagal menambahkan data profil!').mysqli_error($conn);
    }
} else {
    die('Tidak boleh ada data yang kosong!');
}

