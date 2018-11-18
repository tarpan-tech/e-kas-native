<?php
$kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Form Tambah Kas</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Kas</div>
    <div class="card-body">
      <form action="proses_tambah_kas.php" method="post">
        <div class="form-group">
          <label for=" id_kelas">Nama Kelas</label>
            <select name="id_kelas"class="form-control">
              <?php while($data_kelas = mysqli_fetch_array($kelas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kelas['id_kelas']; ?>"><?= $data_kelas['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
            <input name="nama" type="nama" class="form-control" placeholder="Masukkan nama kas...">
        </div>
        <div class="form-group">
          <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input name="tanggal_pembayaran" type="date" class="form-control" placeholder="Masukkan nama anda...">
        </div>
            <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" cols="30" rows="10" class="form-control"placeholder="Keterangan..."></textarea>
        </div>
       <!-- UNTUK TANGGAL MASUK -->

        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>