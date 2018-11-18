<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'e_kas';

$conn = mysqli_connect($host, $user, $pass, $db);

if ( mysqli_connect_errno() ) {
    die('Koneksi gagal!<br>').mysqli_connect_errno($conn);
}

?>