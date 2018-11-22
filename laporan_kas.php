<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $siswa = mysqli_query($conn, "SELECT siswa.id_siswa, siswa.nama as nama_siswa, kelas.nama as nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $siswa = mysqli_query($conn, "SELECT siswa.id_siswa, siswa.nama as nama_siswa, kelas.nama as nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Uang Kas</h1>
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
                <th class="text-center">No.</th>
                <th class="text-center">Nama Siswa</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($data = mysqli_fetch_array($siswa, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_siswa']; ?></td>
                <td><?= $data['nama_kelas']; ?></td>
                <td>
                    <a href="?page=detail_laporan_kas&id_siswa=<?= $data['id_siswa']?>" class="btn btn-primary">Lihat Detail</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>