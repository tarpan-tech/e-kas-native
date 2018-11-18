<?php
if ( isset($_GET['id_siswa']) ) {
    $id_siswa = $_GET['id_siswa'];
    $query = mysqli_query($conn, "SELECT id_siswa, nama, no_hp FROM siswa WHERE id_siswa = '$id_siswa'");
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Kirim Pesan</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Kirim Pesan</div>
    <div class="card-body">
      <form action="proses_kirim_pesan.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Penerima</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan username" value="<?= $result['nama']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="no_hp">No. HP</label>
            <input name="no_hp" type="no_hp" class="form-control" placeholder="Masukkan No. HP" value="<?= $result['no_hp']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="pesan">Pesan</label>
          <textarea name="pesan" class="form-control" rows="5" placeholder="Masukkan pesan yang akan anda kirim"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim!</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>