<?php
require 'connect.php';

$id_user  = $_POST['id_user'];
$username = $_POST['username'];
$email    = $_POST['email'];
$level    = $_POST['level'];

if ( !empty($username) && !empty($email) && !empty($level) ) {

    $query = mysqli_query($conn, "UPDATE user SET username='$username', email='$email', level='$level' WHERE id_user='$id_user'");
    if ( $query == TRUE ) {
        echo "Berhasil mengubah data user<br>Kembali ke<a href='admin.php?page=user'>halaman user</a>";
    } else {
        die('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>