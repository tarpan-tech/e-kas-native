<?php
require 'connect.php';

$id_kelas  = $_POST['id_kelas'];
$nama      = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

if ( !empty($nama) && !empty($deskripsi) ) {

    $query = mysqli_query($conn, "UPDATE kelas SET nama='$nama', deskripsi='$deskripsi' WHERE id_kelas='$id_kelas'");
    if ( $query == TRUE ) {
        echo "Berhasil mengubah data kelas<br>Kembali ke<a href='admin.php?page=kelas'>halaman kelas</a>";
    } else {
        die('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>