<?php
require 'connect.php';

$id_kas  = $_POST['id_kas'];
$id_kelas = $_POST['id_kelas'];
$nama = $_POST['nama'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$keterangan   = $_POST['keterangan'];

if ( !empty($nama) && !empty($keterangan)  ) {

    $query = mysqli_query($conn, "UPDATE kas SET id_kas='$id_kas', id_kelas='$id_kelas', nama='$nama', tanggal_pembayaran='$tanggal_pembayaran', keterangan='$keterangan' WHERE id_kas='$id_kas'");
    if ( $query == TRUE ) {
        echo "Berhasil mengubah data kas<br>Kembali ke<a href='admin.php?page=kas'>halaman kas</a>";
    } else {
        die('Gagal mengubah data!').mysqli_error($conn);
    }
        
} else {
    die('Tidak boleh ada data yang kosong!');
}

?>