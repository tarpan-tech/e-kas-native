<?php
$id_siswa = $_GET['id_siswa'];
if ( $_SESSION['id_kelas'] !== NULL ) {
  $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_kelas = '{$_SESSION['id_kelas']}' AND id_siswa = '$id_siswa'");
  $kas = mysqli_query($conn, "SELECT * FROM kas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
  $kas_siswa = mysqli_query($conn, "SELECT kas.nama, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk JOIN kas ON kas.id_kas = kas_masuk.id_kas JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}' AND siswa.id_siswa = '$id_siswa'");  
} else {
  $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
  $kas = mysqli_query($conn, "SELECT * FROM kas");
  $kas_siswa = mysqli_query($conn, "SELECT kas.nama, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk JOIN kas ON kas.id_kas = kas_masuk.id_kas JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_siswa = '$id_siswa'");  
}
$data_siswa = mysqli_fetch_array($siswa, MYSQLI_ASSOC);
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Uang Kas - <?= $data_siswa['nama']; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <p>Tanggal Hari Ini: <b><?= date('Y-m-d'); ?></b></p>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Nama Kas</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($data_kas_siswa = mysqli_fetch_array($kas_siswa, MYSQLI_ASSOC)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data_kas_siswa['nama']; ?></td>
                        <td><?= $data_kas_siswa['tanggal_masuk']; ?></td>
                        <td><?= $data_kas_siswa['keterangan']; ?></td>
                    </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>