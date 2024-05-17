<?php 
session_start();

$usernameErr = $passwordErr = $authenticatedErr = '';
$username = $password = '';
$users = [
    ['username' => 'admin', 'name' => 'Renti Apriyani', 'password' => 'admin123', 'role' => 'admin'],
    ['username' => 'ti123', 'name' => 'Renti Apriyani', 'password' => 'ti123', 'role' => 'Teknik Informatika'],
    ['username' => 'si123', 'name' => 'Renti Apriyani', 'password' => 'si123', 'role' => 'Sistem Informasi'],
    ['username' => 'bd123', 'name' => 'Renti Apriyani', 'password' => 'bd123', 'role' => 'Bisnis Digital'],
];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'])) {
        $usernameErr = 'Username tidak boleh kosong!';
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password tidak boleh kosong!';
    } else {
        $password = test_input($_POST['password']);
    }
    
    $authenticated = false;
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $authenticated = true;
            break;
        }    
    }
    
    if ($authenticated) {
        switch ($_SESSION['role']) {
            case 'admin':
                header("Location: index.php");
                break;
            case 'Teknik Informatika':
                header("Location: ti.php");
                break;
            case 'Sistem Informasi':
                header("Location: si.php");
                break;
            case 'Bisnis Digital':
                header("Location: bd.php");
                break;
        }
        exit();
    } else {
        $authenticatedErr = 'Username atau Password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIM-Pegawai | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h1"><b>Admin</b>LTE</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
          <div class="input-group">
            <input name="username" type="text" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-alt"></span>
              </div>
            </div>
          </div>
          <span class="text-red"><?= $usernameErr ?></span>
        </div>
        <div class="mb-3">     
          <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <span class="text-red"><?= $passwordErr ?></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        <span class="d-block text-red text-center"><?= $authenticatedErr ?></span>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
