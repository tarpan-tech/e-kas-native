<?php
if ( isset($_GET['id_kas_masuk']) ) {
    $id_kas_masuk = $_GET['id_kas_masuk'];
    $query   = mysqli_query($conn, "SELECT * FROM kas_masuk WHERE id_kas_masuk = '$id_kas_masuk'");
    $kas   = mysqli_query($conn, "SELECT * FROM kas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
    $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_kelas = '{$_SESSION['id_kelas']}'"); 
    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kas Masuk</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Edit Kas Masuk</div>
    <div class="card-body">
      <form action="proses_edit_kas_masuk.php" method="post">
        <div class="form-group">
            <label for="id_kas_masuk">ID Kas Masuk</label>
            <input name="id_kas_masuk" type="Number" class="form-control" value="<?= $result['id_kas_masuk']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="id_kas">Pilih Kas</label>
            <select name="id_kas" class="form-control">
              <?php while($data_kas = mysqli_fetch_array($kas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kas['id_kas']; ?>" <?php if ($result['id_kas'] == $data_kas['id_kas']) { echo "selected"; }?> ><?= $data_kas['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_siswa">ID Siswa</label>
            <select name="id_siswa" class="form-control">
              <?php while($data_siswa = mysqli_fetch_array($siswa, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_siswa['id_siswa']; ?>" <?php if ($result['id_siswa'] == $data_siswa['id_siswa']) { echo "selected"; }?> ><?= $data_siswa['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input name="jumlah" type="number" class="form-control" placeholder="Masukkan jumlah..." value="<?= $result['jumlah']; ?>">
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input name="tanggal_masuk" type="date" class="form-control" value="<?= $result['tanggal_masuk']; ?>">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
            <textarea name="keterangan"  cols="30" rows="5" class="form-control"placeholder="Masukkan Keterangan..."><?=$result['keterangan'];?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>