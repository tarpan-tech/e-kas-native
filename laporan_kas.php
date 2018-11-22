<?php
if ( $_SESSION['id_kelas'] !== NULL ) {
    $all_siswa = query("SELECT siswa.id_siswa, siswa.nama as nama_siswa, kelas.nama as nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}'");
    $all_kas = query("SELECT * FROM kas WHERE id_kelas = '{$_SESSION['id_kelas']}'");
} else {
    $all_siswa = query("SELECT siswa.id_siswa, siswa.nama as nama_siswa, kelas.nama as nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
    $all_kas = query("SELECT * FROM kas");
}
  $no = 1;
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Uang Kas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <p>Tanggal Hari Ini: <b><?= date('Y-m-d'); ?></b></p>
      </div>
    </div>
  </div>
  
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php foreach($all_kas as $key => $kas): ?>
      <?php if($key == 0): ?>
        <li class="nav-item">
          <a class="nav-link active" id="<?= $kas['id_kas']; ?>" data-toggle="tab" href="#kas-<?= $kas['id_kas']; ?>" role="tab" aria-controls="kas-<?= $kas['id_kas']; ?>" aria-selected="true"><?= $kas['nama']; ?></a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" id="<?= $kas['id_kas']; ?>" data-toggle="tab" href="#kas-<?= $kas['id_kas']; ?>" role="tab" aria-controls="kas-<?= $kas['id_kas']; ?>" aria-selected="false"><?= $kas['nama']; ?></a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>

  <div class="tab-content mt-3" id="myTabContent">
    <?php foreach($all_kas as $key => $kas): ?>
      <div class="tab-pane fade <?php if($key == 0){ echo "show active"; } ?>" id="kas-<?= $kas['id_kas']; ?>" role="tabpanel" aria-labelledby="<?= $kas['id_kas']; ?>">
      <p>Tanggal Pembayaran: <b><?= $kas['tanggal_pembayaran']; ?></b> </p>
      <!-- Start Table -->
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $all_kas_masuk = query("SELECT kas_masuk.id_kas_masuk, kas_masuk.keterangan, kas_masuk.jumlah, kas_masuk.tanggal_masuk, siswa.nama as nama_siswa FROM kas_masuk INNER JOIN siswa ON kas_masuk.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '{$_SESSION['id_kelas']}' AND kas_masuk.id_kas = '{$kas['id_kas']}' ORDER BY kas_masuk.tanggal_masuk ASC");
                foreach( $all_kas_masuk as $kas_masuk ):
                ?>
                <tr>
                    <td><?= $kas_masuk['nama_siswa']; ?></td>
                    <td><?= $kas_masuk['jumlah']; ?></td>
                    <td><?= $kas_masuk['keterangan']; ?></td>
                    <td><?= $kas_masuk['tanggal_masuk']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
      <!-- End Table-->
      </div>
    <?php endforeach; ?>
  </div>

  </div>
  
</main>