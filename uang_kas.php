<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $query = mysqli_query($conn, "SELECT kelas.id_kelas, kelas.nama, uang_kas.jumlah_uang_kas, uang_kas.tanggal_update_terakhir FROM uang_kas INNER JOIN kelas ON uang_kas.id_kelas = kelas.id_kelas WHERE kelas.id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $query = mysqli_query($conn, "SELECT kelas.id_kelas, kelas.nama, uang_kas.jumlah_uang_kas, uang_kas.tanggal_update_terakhir FROM uang_kas INNER JOIN kelas ON uang_kas.id_kelas = kelas.id_kelas");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Uang Kas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <!-- <a href="?page=form_tambah_uang_kas" class="btn btn-sm btn-success text-light">Tambah Data</a> -->
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Nama Kelas</th>
                <th>jumlah Uang Kas</th>
                <th>Tanggal Update Terakhir</th>
                <!-- <th style="min-width: 175px;">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['jumlah_uang_kas']; ?></td>
                <td><?= $result['tanggal_update_terakhir']; ?></td>
                <!-- <td>
                    <a href="?page=form_edit_uang_kas&id_kelas=<?= $result['id_kelas']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_uang_kas.php?id_kelas=<?= $result['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td> -->
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>