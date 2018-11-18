<?php
$query = mysqli_query($conn, "SELECT * FROM user");
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman User</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="?page=form_tambah_user" class="btn btn-sm btn-success text-light">Tambah Data</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>ID User</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th style="min-width: 175px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['id_user']; ?></td>
                <td><?= $result['username']; ?></td>
                <td><?= $result['email']; ?></td>
                <td><?= $result['level']; ?></td>
                <td>
                    <a href="?page=form_edit_user&id_user=<?= $result['id_user']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="proses_hapus_user.php?id_user=<?= $result['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>