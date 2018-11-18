<?php
$query = mysqli_query($conn, "SELECT * FROM kelas");
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Kelas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="?page=form_tambah_kelas" class="btn btn-sm btn-success text-light">Tambah Data</a>
      </div>
      </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID Kelas</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th style="min-width: 175px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $result['id_kelas']; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['deskripsi']; ?></td>
                <td>
                    <a href="?page=form_edit_kelas&id_kelas=<?= $result['id_kelas']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_kelas.php?id_kelas=<?= $result['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>