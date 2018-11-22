<?php
session_start();
require 'connect.php';
require 'vendor/autoload.php';
use League\Csv\Writer;

if ( $_SESSION['id_kelas'] !== NULL ) {
    $query = mysqli_query($conn, "SELECT kas_masuk.id_kas_masuk, kas.nama AS nama_kas, siswa.nama AS nama_siswa, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk INNER JOIN kas ON kas.id_kas = kas_masuk.id_kas INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $query = mysqli_query($conn, "SELECT kas_masuk.id_kas_masuk, kas.nama AS nama_kas, siswa.nama AS nama_siswa, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk INNER JOIN kas ON kas.id_kas = kas_masuk.id_kas INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa");
}

$data = [];
while( $result = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
    $data[] = $result;
endwhile;

//we create the CSV into memory
$csv = Writer::createFromFileObject(new SplTempFileObject());

$csv->insertOne(['IDKasMasuk', 'Kas', 'NamaSiswa', 'Jumlah', 'Keterangan', 'TanggalMasuk']);

// $csv->insertAll($data);

$csv->output('kas_masuk.csv');
// echo $csv->getContent();
die;