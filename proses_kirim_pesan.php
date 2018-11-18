<?php

require 'modules/sms_gateway.php';

$no_hp = $_POST['no_hp'];
$pesan = $_POST['pesan'];

$send_message = sendMessage($no_hp, $pesan);

if ( $send_message == TRUE ) {
    echo 'Pesan sudah terkirim!';
    echo 'Kembali ke halaman <a href="admin.php?page=kirim_pesan">pesanan</a>';
} else {
    echo 'Pesan gagal terkirim!';
}