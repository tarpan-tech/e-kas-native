<?php
require 'connect.php';

if ( isset($_GET['id_kelas']) ) {
    $id_kelas = $_GET['id_kelas'];
}

$query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '$id_kelas'");
if ( $query == TRUE ) {
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=kelas'>halaman kelas</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>