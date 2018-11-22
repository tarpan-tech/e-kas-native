<?php
session_start();

if ( !isset($_SESSION['is_logged_in']) ) {
    die("Anda belum login! silahkan login <a href='login.php'>disini</a>");
}

if ( isset($_GET['page']) ) {
    $page = $_GET['page'];

    if ( file_exists("{$page}.php") ) {
        require 'connect.php';
        require 'modules/db.php';
        require 'template/header.php';
        require "{$page}.php";
        require 'template/footer.php';        
    } else {
        require '404.php';
    }

} else {
    require '404.php';
}

?>