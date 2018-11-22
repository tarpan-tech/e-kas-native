<?php

function query($query)
{
    global $conn;

    $query = mysqli_query($conn, $query);
    $result = [];
    while( $data = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
        $result[] = $data;
    endwhile;
    return $result;
}

function updateUangKas()
{
    global $conn;

    $kas_masuk = mysqli_query($conn, "SELECT SUM(jumlah) AS total_masuk FROM kas_masuk INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}'");
    $total_kas_masuk = mysqli_fetch_array($kas_masuk, MYSQLI_ASSOC)['total_masuk'];
    $kas_keluar = mysqli_query($conn, "SELECT SUM(jumlah) AS total_keluar FROM kas_keluar WHERE id_kelas = '{$_SESSION['id_kelas']}'");
    $total_kas_keluar = mysqli_fetch_array($kas_keluar, MYSQLI_ASSOC)['total_keluar'];

    $jumlah_total = $total_kas_masuk - $total_kas_keluar;
    $update = mysqli_query($conn, "UPDATE uang_kas SET jumlah_uang_kas = '$jumlah_total' WHERE id_kelas='{$_SESSION['id_kelas']}'");
    if ( mysqli_affected_rows($conn) > 0 ) {
        return TRUE;
    } else {
        return FALSE;
    }
}

