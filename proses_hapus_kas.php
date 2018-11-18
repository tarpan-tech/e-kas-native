<?php
require'connect.php';

if ( isset($_GET['id_kas']) ) {
    $id_kas = $_GET['id_kas'];
}

$query = mysqli_query($conn, "DELETE FROM kas WHERE id_kas = '$id_kas'");
if ( $query == TRUE ) {
    echo "Berhasil menghapus data!<br>";
    echo "Kembali ke <a href='admin.php?page=kas'>halaman kas</a>";
} else {
    echo "Gagal menghapus data!<br>";
    echo mysqli_error($conn);
}

?>