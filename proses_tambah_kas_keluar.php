<?php
session_start();
require'connect.php';
require 'modules/db.php';
    
$id_kelas    = $_POST['id_kelas'];
$jumlah = $_POST['jumlah'];
$keterangan   = $_POST['keterangan'];
$tanggal_keluar = date('Y-m-d');


$query=mysqli_query($conn,"INSERT INTO kas_keluar VALUES (
'',
'$id_kelas',
'$jumlah',
'$keterangan',
'$tanggal_keluar'
)");
if($query==TRUE){
    updateUangKas();
    echo'berhasil mengelola pengeluaran data uang kas';
    echo'<a href="admin.php?page=kas_keluar">Kembali</a>';
}else{
    echo'gagal mengelola pengeluaran data uang kas'.mysqli_error($conn);
}