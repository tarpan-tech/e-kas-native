<?php
require 'connect.php';

$nama       = $_POST['nama'];
$deskripsi  = $_POST['deskripsi'];

if ( !empty($nama) && !empty($deskripsi) ) {

    $query = mysqli_query($conn, "INSERT INTO kelas VALUES('', '$nama', '$deskripsi')");
    if ( $query == TRUE ) {
        echo "Berhasil menambahkan data kelas<br>Kembali ke<a href='admin.php?page=kelas'>halaman kelas</a>";
    } else {
        die('Gagal menambahkan data!').mysqli_error($conn);
    }
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>