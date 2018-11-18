<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kelas</h1>
  </div>
  <div class="card text-dark bg-light mb-3">
    <div class="card-header">Form Tambah Kelas</div>
    <div class="card-body">
      <form action="proses_tambah_kelas.php" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <br>
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <br>
            <textarea name="deskripsi"  class="form-control" placeholder="Masukkan deskripsi" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>  
    </div>
  </div>
  
</main>