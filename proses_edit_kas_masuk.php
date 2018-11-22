<?php
session_start();
require 'connect.php';
require 'modules/db.php';

$id_kas_masuk = $_POST['id_kas_masuk'];
$id_kas   = $_POST['id_kas'];
$id_siswa   = $_POST['id_siswa'];
$jumlah   = $_POST['jumlah'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$keterangan   = $_POST['keterangan'];

if ( !empty($id_kas) && !empty($id_siswa) && !empty($jumlah) && !empty($tanggal_masuk) && !empty($keterangan) ) {

    $query = mysqli_query($conn, "UPDATE kas_masuk SET id_kas_masuk='$id_kas_masuk', id_kas='$id_kas',
     id_siswa='$id_siswa', jumlah='$jumlah', tanggal_masuk='$tanggal_masuk', keterangan='$keterangan' WHERE id_kas_masuk='$id_kas_masuk'");
    if ( $query == TRUE ) {
        updateUangKas();
        echo "Berhasil mengubah data kas<br>Kembali ke<a href='admin.php?page=kas_masuk'>halaman kas</a>";
    } else {
        echo('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>