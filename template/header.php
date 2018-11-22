<?php
$id_user = $_SESSION['id_user'];
$siswa   = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'");
$account = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$data_account = mysqli_fetch_array($account, MYSQLI_ASSOC);
$jumlah_data_siswa = mysqli_num_rows($siswa);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman Admin | E-Kas</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom/admin.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-primary text-light flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center" href="index.php">E-Kas by Tarpan Tech</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link text-light text-center" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <p class="nav-link mb-0"><?= "Halo, {$_SESSION['username']}"; ?></p>
              <li class="nav-item">
                <a class="nav-link" href="?page=dashboard">
                  <span data-feather="home"></span>
                  Halaman Admin
                </a>
              </li>

              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Akun</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="user"></span>
                </a>
              </h6>
              <li class="nav-item">
                <div>
                  <a class="nav-link" href="admin.php?page=profil">
                    <span data-feather="user"></span>
                    Perbarui Profil
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=form_ubah_password">
                  <span data-feather="lock"></span>
                  Ubah Password
                </a>
              </li>

              <?php if( $jumlah_data_siswa != 0 || $data_account['level'] == 1 ): ?>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Manajemen Data</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="file-text"></span>
                </a>
              </h6>
              <?php if($_SESSION['level'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=user">
                  <span data-feather="lock"></span>
                  Data User
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=kelas">
                  <span data-feather="users"></span>
                  Data Kelas
                </a>
              </li>
              <?php endif; ?>
              <?php if($_SESSION['level'] <= 2): ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=siswa">
                  <span data-feather="user"></span>
                  Data Siswa
                </a>
              </li>
              <?php endif; ?>
              <?php if($_SESSION['level'] <= 4): ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=uang_kas">
                  <span data-feather="dollar-sign"></span>
                  Data Uang Kas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=kas">
                  <span data-feather="file"></span>
                  Data Kas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=kas_masuk">
                  <span data-feather="file-plus"></span>
                  Data Kas Masuk
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=kas_keluar">
                  <span data-feather="file-minus"></span>
                  Data Kas Keluar
                </a>
              </li>
              <?php endif; ?>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Laporan</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="printer"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="?page=laporan_kas">
                  <span data-feather="file"></span>
                  Laporan Kas
                </a>
              </li>
            </ul>

            <?php if($_SESSION['level'] <= 3): ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Pesanan</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="message-square"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="?page=kirim_pesan">
                  <span data-feather="message-square"></span>
                  Kirim Pesan
                </a>
              </li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
          </div>
        </nav>