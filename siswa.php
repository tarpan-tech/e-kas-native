<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $query = mysqli_query($conn, "SELECT siswa.id_siswa, siswa.nama, siswa.no_hp, user.username, kelas.nama as nama_kelas FROM siswa INNER JOIN user ON siswa.id_user = user.id_user INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $query = mysqli_query($conn, "SELECT siswa.id_siswa, siswa.nama, siswa.no_hp, user.username, kelas.nama as nama_kelas FROM siswa INNER JOIN user ON siswa.id_user = user.id_user INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
}
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Siswa</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="?page=form_tambah_siswa" class="btn btn-sm btn-success text-light">Tambah Data</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID Siswa</th>
                <th>Username</th>
                <th>Kelas</th>
                <th>Nama</th>
                <th>No.HP</th>
                <th style="min-width: 175px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $result['id_siswa']; ?></td>
                <td><?= $result['username']; ?></td>
                <td><?= $result['nama_kelas']; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['no_hp']; ?></td>
                <td>
                    <a href="?page=form_edit_siswa&id_siswa=<?= $result['id_siswa']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_siswa.php?id_siswa=<?= $result['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>