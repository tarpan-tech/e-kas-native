<?php
require 'connect.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$level    = $_POST['level'];

if ( !empty($username) && !empty($email) && !empty($password) && !empty($level) ) {


    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $jumlah_record = mysqli_num_rows($query);
    if ( $jumlah_record == 0 ) {

        if ( $hashed_password = password_hash($password, PASSWORD_BCRYPT) ) {

            $query = mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$hashed_password', '$level')");
            if ( $query == TRUE ) {
                echo "Berhasil menambahkan data user<br>Kembali ke<a href='admin.php?page=user'>halaman user</a>";
            } else {
                die('Gagal menambahkan data!').mysqli_error($conn);
            }
        }
    } else {
        die('Username sudah terdaftar, silahkan gunakan username lain');
    }

} else {
    die('Tidak boleh ada data yang kosong!');
}

?>