<?php
$query = mysqli_query($conn, "SELECT id_siswa, nama, no_hp FROM siswa");
$no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kirim Pesan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th style="min-width: 175px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nama']; ?></td>
                <td><?= $result['no_hp']; ?></td>
                <td>
                    <a href="?page=form_kirim_pesan&id_siswa=<?= $result['id_siswa']; ?>" class="btn btn-primary">Pilih</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  
</main>