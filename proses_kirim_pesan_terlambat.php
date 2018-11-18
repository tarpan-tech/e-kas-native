<?php
session_start();
require 'connect.php';
require 'modules/sms_gateway.php';
$id_kas = $_GET['id_kas'];

$query = mysqli_query($conn, "SELECT siswa.nama, siswa.no_hp, kas.tanggal_pembayaran, kas_masuk.tanggal_masuk FROM kas_masuk INNER JOIN kas ON kas_masuk.id_kas = kas.id_kas RIGHT JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}' AND kas.id_kas ='$id_kas'");

while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)):
// print_r($result);
// $tanggal_masuk = $result['tanggal_masuk'] || date_create(date('Y-m-d'));
if( $result['tanggal_masuk'] ) {
    $tanggal_masuk = date_create($result['tanggal_masuk']);
} else {
    $tanggal_masuk = date_create(date('Y-m-d'));
}
    $selisih = date_diff( date_create($result['tanggal_pembayaran']), $tanggal_masuk );
    // print_r($selisih->days);
    if ( $selisih->days >= 7 ) {
        $no_hp = (string) $result['no_hp'];
        // echo $no_hp;
        $message = sendMessage($result['no_hp'], 'Anda terlambat bayar uang kas!');  
        echo "Berhasil mengirim pesan pada orang yang terlambat!"; 
    } else {
        $no_hp = (string) $result['no_hp'];
        // echo $no_hp;
    }

endwhile;