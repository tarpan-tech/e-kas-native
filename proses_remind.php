<?php
session_start();
require 'connect.php';
require 'modules/db.php';
require 'modules/sms_gateway.php';

if ( isset($_GET['data']) ) {
    $data = $_GET['data'];
}

// Ambil data siswa yang belum membayar
$siswa_telat = query("SELECT siswa.nama, siswa.no_hp FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}' AND siswa.id_siswa NOT IN ({$data})");

// Kirim SMS apabila tidak ada siswa yang telat
if ( count($siswa_telat) !== 0 ) {

    //loop jumlah siswa yang telat dan kirim SMS pada siswa tersebut
    foreach($siswa_telat as $siswa):

        $pesan = "Halo, {$siswa['nama']}. Anda belum atau terlambat bayar uang kas. Segera lunasi uang kas anda";

        $message = sendMessage($siswa['no_hp'], $pesan);

        if ( $message ) {
            echo "Berhasil mengirim pesan pada {$siswa['nama']} dengan nomor HP {$siswa['no_hp']}<br>";
        } else {
            echo "Gagal mengirim pesan..";
        }

    endforeach;

    echo "Kembali ke <a href='admin.php?page=laporan_kas'>halaman sebelumnya</a>";

} else {
    echo "Tidak ada siswa yang telat membayar uang kas.<br>";
    echo "Kembali ke <a href='admin.php?page=laporan_kas'>halaman sebelumnya</a>";
}