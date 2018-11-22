<?php
session_start();
require'connect.php';
require 'modules/db.php';

if ( isset($_GET['id_kas_keluar']) ) {
    $id_kas_keluar = $_GET['id_kas_keluar'];
}

$query = mysqli_query($conn, "DELETE FROM kas_keluar WHERE id_kas_keluar = '$id_kas_keluar'");
if ( $query == TRUE ) {
    updateUangKas();
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=kas_keluar'>halaman kas</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>