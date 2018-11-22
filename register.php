<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Register</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="proses_register.php" method="POST">
      <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Halaman Register</h1>
      <label class="sr-only">Username</label>
      <input type="text"name="username" class="form-control" placeholder="Username" required autofocus>
      <label class="sr-only">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
      <label class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <label class="sr-only">Hak Akses</label>
      <select name="level" class="form-control">
            <option value="2">Wali Kelas</option> 
            <option value="3">Bendahara</option> 
            <option value="4">Siswa/Siswa</option> 
        </select>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
