<?php
$id_user = $_SESSION['id_user'];
$siswa   = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'");
$result = mysqli_fetch_array($siswa, MYSQLI_ASSOC);
$kelas   = mysqli_query($conn, "SELECT * FROM kelas");
$jumlah_siswa = mysqli_num_rows($siswa);
if ( $jumlah_siswa == 0 ):
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Perbarui Profil</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Tambahkan data profil</div>
    <div class="card-body">
      <form action="proses_tambah_profil.php" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
          <label for="no_hp">No. HP</label>
            <input name="no_hp" type="no_hp" class="form-control" placeholder="Masukkan nomor hp">
        </div>
        <div class="form-group">
          <label for="id_kelas">Pilih Kelas</label>
            <select name="id_kelas"class="form-control">
              <?php while($data_kelas = mysqli_fetch_array($kelas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kelas['id_kelas']; ?>" ><?= $data_kelas['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </form>  
    </div>
  </div>
  <!-- Akhir konten -->
</main>
<?php else: ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Perbarui Profil</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Perbarui data profil</div>
    <div class="card-body">
      <form action="proses_ubah_profil.php" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama" value="<?= $result['nama']; ?>">
        </div>
        <div class="form-group">
          <label for="no_hp">No. HP</label>
            <input name="no_hp" type="no_hp" class="form-control" placeholder="Masukkan nomor hp" value="<?= $result['no_hp']; ?>">
        </div>
        <div class="form-group">
          <label for="id_kelas">Pilih Kelas</label>
            <select name="id_kelas"class="form-control">
              <?php while($data_kelas = mysqli_fetch_array($kelas, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_kelas['id_kelas']; ?>" <?php if ($result['id_kelas'] == $data_kelas['id_kelas']) { echo "selected"; }?> ><?= $data_kelas['nama']; ?></option>
              <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </form>  
    </div>
  </div>
  <!-- Akhir konten -->
</main>
<?php endif; ?>