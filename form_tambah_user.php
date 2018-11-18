<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
  </div>
  <!-- Mulai konten -->
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Tambah User</div>
    <div class="card-body">
      <form action="proses_tambah_user.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Masukkan username">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
            <input name="email" type="email" class="form-control" placeholder="Masukkan email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Masukkan password">
        </div>
        <div class="form-group">
          <label for="level">Hak Akses</label>
            <select name="level" class="form-control">
              <option value="2">Wali Kelas</option>
              <option value="3">Bendahara</option>
              <option value="4">Siswa/Siswi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>  
    </div>
  </div>
  
  <!-- Akhir konten -->
</main>