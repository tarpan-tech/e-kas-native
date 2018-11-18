<?php
require 'connect.php';

if ( isset($_GET['id_siswa']) ) {
    $id_siswa = $_GET['id_siswa'];
}

$query = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");
if ( $query == TRUE ) {
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=siswa'>halaman siswa</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>