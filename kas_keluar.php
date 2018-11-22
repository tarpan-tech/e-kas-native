<?php
if ( $_SESSION['id_kelas'] !== NULL) {
    $query = mysqli_query($conn, "SELECT * FROM kas_keluar INNER JOIN kelas ON kas_keluar.id_kelas = kelas.id_kelas WHERE kas_keluar.id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM kas_keluar INNER JOIN kelas ON kas_keluar.id_kelas = kelas.id_kelas");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Kas Keluar</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <?php if( $_SESSION['level'] <= 3 ): ?>
        <a href="?page=form_tambah_kas_keluar" class="btn btn-sm btn-success text-light">Tambah Data</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>ID Kas Keluar</th>
                <th>Nama Kelas</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Tanggal Keluar</th>
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <th style="min-width: 175px;">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['id_kas_keluar']; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['jumlah']; ?></td>
                <td><?= $result['keterangan']; ?></td>
                <td><?= $result['tanggal_keluar']; ?></td>'
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <td>
                    <a href="?page=form_edit_kas_keluar&id_kas_keluar=<?= $result['id_kas_keluar']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_kas_keluar.php?id_kas_keluar=<?= $result['id_kas_keluar']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>