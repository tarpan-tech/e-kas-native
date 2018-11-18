<?php
session_start();
require 'connect.php';

$password_baru = password_hash($_POST['password'], PASSWORD_BCRYPT);

$query = mysqli_query($conn, "UPDATE user SET password='$password_baru' WHERE id_user = '{$_SESSION['id_user']}'");

if($query == TRUE){
    echo'berhasil mengubah password pada akun anda';
    echo'<a href="admin.php?page=profil">Kembali</a>';
}else{
    echo'gagal mengubah password'.mysqli_error($conn);
}