<?php
require 'connect.php';
$siswa = mysqli_query($conn, "SELECT siswa.id_siswa, siswa.nama as nama_siswa, kelas.nama as nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = 4");
$data_siswa = [];
while( $result = mysqli_fetch_array($siswa, MYSQLI_ASSOC) ):
    $data_siswa[] = $result;
endwhile;

$kas = mysqli_query($conn, "SELECT kas_masuk.id_kas_masuk, kas_masuk.id_kas, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk, siswa.id_siswa, siswa.id_kelas, siswa.nama as nama_siswa, siswa.no_hp FROM kas_masuk INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE id_kelas = 4");
$data_kas = [];
while( $result = mysqli_fetch_array($kas, MYSQLI_ASSOC) ):
    $data_kas[] = $result;
endwhile;

// function array_merge_recursive_distinct(array &$array1, array &$array2)
// {
//     $merged = $array1;
//     foreach ($array2 as $key => &$value) {
//         if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
//             $merged[$key] = array_merge_recursive_distinct($merged[$key], $value);
//         } else {
//             $merged[$key] = $value;
//         }
//     }
//     return $merged;
// }


// $gabungan = array_merge_recursive_distinct($data_siswa, $data_kas);
echo "<pre>";
print_r($data_kas);
echo "</pre>";