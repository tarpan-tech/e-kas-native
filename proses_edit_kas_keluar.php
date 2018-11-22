<?php
session_start();
require'connect.php';
require 'modules/db.php';

$id_kas_keluar = $_POST['id_kas_keluar'];
$id_kelas   = $_POST['id_kelas'];
$jumlah   = $_POST['jumlah'];
$keterangan   = $_POST['keterangan'];

if ( !empty($id_kelas) && !empty($id_kelas) && !empty($jumlah) && !empty($keterangan) ) {

    $query = mysqli_query($conn, "UPDATE kas_keluar SET id_kas_keluar='$id_kas_keluar', id_kelas='$id_kelas',
      jumlah='$jumlah', keterangan='$keterangan' WHERE id_kas_keluar='$id_kas_keluar'");
    if ( $query == TRUE ) {
        updateUangKas();
        echo "Berhasil mengubah data kas<br>Kembali ke<a href='admin.php?page=kas_keluar'>halaman kas keluar</a>";
    } else {
        ECHO('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>