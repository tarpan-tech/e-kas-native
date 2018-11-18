<?php
require 'connect.php';

if ( isset($_GET['id_user']) ) {
    $id_user = $_GET['id_user'];
}

$query = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
if ( $query == TRUE ) {
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=user'>halaman user</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>