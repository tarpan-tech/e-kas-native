<?php
require 'connect.php';
 
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$level    = $_POST['level'];
 
if ( !empty($username) && !empty($email) && !empty($password) && !empty($level) ) {
    echo 'Validasi berhasil!';
 
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $jumlah_record = mysqli_num_rows($query);
    if ( $jumlah_record == 0 ) {
        if ( $hashed_password = password_hash($password, PASSWORD_BCRYPT) ) {
            $query = mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$hashed_password', '$level')");
            if ( $query == TRUE ) {
                echo "Akun anda berhasil didaftarkan! silahkan login <a href='login.php'>disini</a>";
            } else {
                echo "Gagal mendaftarkan akun!";
            }
        } else {
            echo 'Gagal melakukan hash pada password';
        }
       
    } else {
        echo "Akun sudah ada, silahkan pilih username yang lain!";
    }
 
 
} else {
    die('Semua data harus diisi! periksa kembali data yang anda masukkan');
}
 
 
?>