<?php
if ( isset($_GET['id_kas']) ) {
    $id_kas = $_GET['id_kas'];
    $query   = mysqli_query($conn, "SELECT * FROM kas WHERE id_kas = '$id_kas'");
    $kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '{$_SESSION['id_kelas']}'");

    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kas</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Edit Kas</div>
    <div class="card-body">
      <form action="proses_edit_kas.php" method="post">
        <div class="form-group">
            <label for="id_kas">ID Kas</label>
            <input name="id_kas" type="Number" class="form-control"  value="<?= $result['id_kas']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="id_kelas">Nama Kelas</label>
            <select name="id_kelas" class="form-control">
              <?php while($data_kelas = mysqli_fetch_array($kelas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kelas['id_kelas']; ?>" <?php if ($result['id_kelas'] == $data_kelas['id_kelas']) { echo "selected"; }?> ><?= $data_kelas['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama anda..." value="<?= $result['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input name="tanggal_pembayaran" type="date" class="form-control" value="<?= $result['tanggal_pembayaran']; ?>">
        </div>
        <div class="form-group">
          <label for="Keterangan">Keterangan</label>
            <textarea name="keterangan"  cols="30" rows="10"class="form-control"placeholder="Keterangan..."><?=$result['keterangan'];?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>