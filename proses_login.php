<?php
session_start();
require 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $jumlah_record = mysqli_num_rows($query);
    if ( $jumlah_record == 1 ) {
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ( password_verify($password, $result['password']) ) {
            $_SESSION = [
                'id_user'      => $result['id_user'],
                'username'     => $result['username'],
                'level'        => $result['level'],
                'is_logged_in' => TRUE
            ];
            $data  = mysqli_query($conn, "SELECT id_kelas FROM siswa WHERE id_user = '{$_SESSION['id_user']}'");
            $id_kelas = mysqli_fetch_array($data, MYSQLI_ASSOC);
            $_SESSION['id_kelas'] = $id_kelas['id_kelas'];
            echo "Login Berhasil!<br> Silahkan masuk ke <a href='admin.php?page=dashboard'>Halaman Admin</a>";
        } else {
            echo 'Password tidak cocok';
        }
    } else {
        die('Username yg anda masukkan tidak terdaftar di website kami');

    }