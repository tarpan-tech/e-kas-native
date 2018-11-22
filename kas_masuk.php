<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $query = mysqli_query($conn, "SELECT kas_masuk.id_kas_masuk, kas.nama AS nama_kas, siswa.nama AS nama_siswa, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk INNER JOIN kas ON kas.id_kas = kas_masuk.id_kas INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}' ORDER BY kas.nama ASC");
} else {
    $query = mysqli_query($conn, "SELECT kas_masuk.id_kas_masuk, kas.nama AS nama_kas, siswa.nama AS nama_siswa, kas_masuk.jumlah, kas_masuk.keterangan, kas_masuk.tanggal_masuk FROM kas_masuk INNER JOIN kas ON kas.id_kas = kas_masuk.id_kas INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa ORDER BY kas.nama ASC");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Kas Masuk</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <?php if( $_SESSION['level'] <= 3 ): ?>
        <a href="?page=form_tambah_kas_masuk" class="btn btn-sm btn-success text-light">Tambah Data</a>
        <a href="export_kas_masuk.php" class="btn btn-sm btn-primary text-light">Export ke CSV</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Nama Kas</th>
                <th>Nama Siswa</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Tanggal Masuk</th>
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <th style="min-width: 175px;">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nama_kas']; ?></td>
                <td><?= $result['nama_siswa']; ?></td>
                <td><?= $result['jumlah']; ?></td>
                <td><?= $result['keterangan']; ?></td>
                <td><?= $result['tanggal_masuk']; ?></td>
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <td>
                    <a href="?page=form_edit_kas_masuk&id_kas_masuk=<?= $result['id_kas_masuk']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_kas_masuk.php?id_kas_masuk=<?= $result['id_kas_masuk']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>