<?php
if ( isset($_GET['id_kas_keluar']) ) {
    $id_kas_keluar = $_GET['id_kas_keluar'];
    $query   = mysqli_query($conn, "SELECT * FROM kas_keluar WHERE id_kas_keluar = '$id_kas_keluar'");
    $kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kas Keluar</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Edit Kas</div>
    <div class="card-body">
      <form action="proses_edit_kas_keluar.php" method="post">
        <div class="form-group">
            <label for="id_kas_keluar">ID Kas Keluar</label>
            <input name="id_kas_keluar" type="Number" class="form-control" value="<?= $result['id_kas_keluar']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="id_kelas">ID Kelas</label>
            <select name="id_kelas" class="form-control">
              <?php while($data_kelas = mysqli_fetch_array($kelas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kelas['id_kelas']; ?>" <?php if ($result['id_kelas'] == $data_kelas['id_kelas']) { echo "selected"; }?> ><?= $data_kelas['nama']; ?></option>
              <?php endwhile; ?>
            </select>   
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input name="jumlah" type="number" class="form-control" value="<?= $result['jumlah']; ?>">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" cols="10" rows="5" class="form-control"><?= $result['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>