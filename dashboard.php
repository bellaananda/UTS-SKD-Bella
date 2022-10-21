<?php

session_start();

if (!isset($_SESSION['id'])) {
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('Anda belum login');
  window.location.href='login.php';
  </script>");
} else {
  include 'database/connection.php';
  include 'process/vigenere.php';
  $id = $_SESSION['id'];
  $query = "SELECT * FROM `student_nominee` WHERE `id` = '$id' LIMIT 1";
  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);
  $username = $result['username'];
  $password_enc = $result['password'];
  $password_dec = decryptPassword($password_enc);
  $shown_pass = explode($username, strtolower($password_dec));
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UTS SKD Bella Ananda Putri | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="asset/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">UTS SKD</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link bg-dark shadow-none px-3" data-bs-toggle="modal" data-bs-target="#showLogoutModal">Logout</a>
      </div>
    </div>
  </header>

  <div class="modal fade" id="showLogoutModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showLogoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showLogoutModalLabel">Logout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Anda yakin untuk logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a type="submit" class="btn btn-danger logoutModalButton" id="logoutModalButton" href="process/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Selamat Datang!</h2>
          <table style="font-size:large;">
            <tr>
              <td><b>NISN</b></td>
              <td>&nbsp;</td>
              <td><?php echo $result['nisn']; ?></td>
            </tr>
            <tr>
              <td><b>Nama Lengkap</b></td>
              <td>&nbsp;</td>
              <td><?php echo $result['fullname']; ?></td>
            </tr>
            <tr>
              <td><b>Asal</b></td>
              <td>&nbsp;</td>
              <td><?php echo $result['school']; ?></td>
            </tr>
            <tr>
              <td><b>Username</b></td>
              <td>&nbsp;</td>
              <td><?php echo $result['username']; ?></td>
            </tr>
          </table>
          <br>
          <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#showPasswordModal">Lihat password</button>
          <div class="modal modal-sm fade" id="showPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="showPasswordModalLabel">Info Login</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table>
                    <tr>
                      <td><b>Username</b></td>
                      <td>&nbsp;</td>
                      <td><?php echo $result['username']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Password</b></td>
                      <td>&nbsp;</td>
                      <td><?php echo $shown_pass[0]; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="asset/dashboard.js"></script>
</body>

</html>