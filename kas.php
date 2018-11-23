<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $query = mysqli_query($conn, "SELECT * FROM kas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM kas");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Kas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <?php if( $_SESSION['level'] <= 3 ): ?>
        <a href="?page=form_tambah_kas" class="btn btn-sm btn-success text-light">Tambah Data</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Tanggal Pembayaran</th>
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <th style="min-width: 175px;">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['keterangan']; ?></td>
                <td><?= $result['tanggal_pembayaran']; ?></td>
                <?php if( $_SESSION['level'] <= 3 ): ?>
                <td>
                    <a href="?page=form_edit_kas&id_kas=<?= $result['id_kas']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_kas.php?id_kas=<?= $result['id_kas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>