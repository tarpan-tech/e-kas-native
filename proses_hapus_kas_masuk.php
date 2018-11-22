<?php
session_start();
require'connect.php';
require 'modules/db.php';

if ( isset($_GET['id_kas_masuk']) ) {
    $id_kas_masuk = $_GET['id_kas_masuk'];
}

$query = mysqli_query($conn, "DELETE FROM kas_masuk WHERE id_kas_masuk = '$id_kas_masuk'");
if ( $query == TRUE ) {
    updateUangKas();
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=kas_masuk'>halaman kas masuk</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>