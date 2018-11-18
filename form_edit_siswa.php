<?php
if ( isset($_GET['id_siswa']) ) {
    $id_siswa = $_GET['id_siswa'];
    $query   = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
    $kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
    $user  = mysqli_query($conn, 'SELECT * FROM user');
    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Siswa</h1>
  </div>
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Edit Siswa</div>
    <div class="card-body">
      <form action="proses_ubah_siswa.php" method="post">
        <div class="form-group">
            <label for="id_siswa">ID Siswa</label>
            <input name="id_siswa" type="text" class="form-control" placeholder="ID Siswa" value="<?= $result['id_siswa']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="id_user">Username</label>
            <select name="id_user" class="form-control">
              <?php while($data_user = mysqli_fetch_array($user, MYSQLI_ASSOC)): ?>
                <option value="<?= $data_user['id_user']; ?>" <?php if ($result['id_user'] == $data_user['id_user']) { echo "selected"; } ?> ><?= $data_user['username']; ?></option>
              <?php endwhile; ?>
            </select>
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
            <input name="nama" type="text" class="form-control" placeholder="Nama" value="<?= $result['nama']; ?>">
        </div>
        <div class="form-group">
          <label for="no_hp">No HP</label>
            <input name="no_hp" type="number" class="form-control" placeholder="No HP" value="<?= $result['no_hp']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
</main>