<?php
if ( isset($_GET['id_kelas']) ) {
    $id_kelas = $_GET['id_kelas'];
    $query   = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kelas</h1>
  </div>
  <div class="card text-dark bg-light mb-3"">
    <div class="card-header">Form Edit Kelas</div>
    <div class="card-body">
      <form action="proses_ubah_kelas.php" method="post">
        <div class="form-group">
            <label for="id_kelas">ID Kelas</label>
            <input name="id_kelas" type="text" class="form-control" placeholder="ID Kelas" value="<?= $result['id_kelas']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama" value="<?= $result['nama']; ?>">
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi" cols="5" rows="10"><?= $result['deskripsi']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
</main>
        