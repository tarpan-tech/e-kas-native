<?php
if ( isset($_GET['id_user']) ) {
    $id_user = $_GET['id_user'];
    $query   = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    $result  = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Edit User</div>
    <div class="card-body">
      <form action="proses_ubah_user.php" method="post">
        <div class="form-group">
            <label for="id_user">ID User</label>
            <input name="id_user" type="text" class="form-control" placeholder="ID User" value="<?= $result['id_user']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Masukkan username" value="<?= $result['username']; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
            <input name="email" type="email" class="form-control" placeholder="Masukkan email" value="<?= $result['email']; ?>">
        </div>
        <div class="form-group">
          <label for="level">Hak Akses</label>
            <select name="level" class="form-control">
              <option value="1" <?php if ($result['level'] == 2){ echo 'selected'; }?>>Wali Kelas</option>
              <option value="2" <?php if ($result['level'] == 3){ echo 'selected'; }?>>Bendahara</option>
              <option value="3" <?php if ($result['level'] == 4){ echo 'selected'; }?>>Siswa/Siswi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>