<?php
require'connect.php';

$id_kelas = $_POST['id_kelas'];
$nama    = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$tanggal_pembayaran=$_POST['tanggal_pembayaran'];

$query=mysqli_query($conn,"INSERT INTO kas VALUES (
'',
'$id_kelas',
'$nama',
'$keterangan',
'$tanggal_pembayaran'
)");
if($query==TRUE){
    echo'berhasil menambahkan data uang kas';
    echo'<a href="admin.php?page=kas">Kembali</a>';
}else{
    echo'gagal menambahkan data uang kas'.mysqli_error($conn);
}