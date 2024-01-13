<?php
require 'koneksi.php';
$nama      = "";
$email          = "";
$password       = "";
$telepon        = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}
if ($op == 'delete') {
  $id         = $_GET['id'];
  $sql1       = "delete from akun where id = '$id'";
  $q1         = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "data successfully deleted";
  } else {
    $error  = "data successfully deleted";
  }
}
if ($op == 'edit') {
  $id         = $_GET['id'];
  $sql1       = "select * from akun where id = '$id'";
  $q1         = mysqli_query($koneksi, $sql1);
  $r1         = mysqli_fetch_array($q1);
  $nama       = $r1['name'];
  $email      = $r1['email'];
  $password   = $r1['password'];
  $pass       = md5($password);
  $telepon    = $r1['phoneNumber'];

  if ($nama == '') {
    $error = "Data tidak ditemukan";
  }
}
if (isset($_POST['simpan'])) { //untuk create
  $nama        = $_POST['name'];
  $email       = $_POST['email'];
  $pass        = md5($password);
  $telepon     = $_POST['phoneNumber'];

  if ($nama && $email && $telepon) {
    if ($op == 'edit') { //untuk update
      $sql1       = "update akun set name = '$nama', email = '$email', phoneNumber = '$telepon' where id = '$id'";
      $q1         = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "data successfully updated";
      } else {
        $error  = "failed to update data";
      }
    } else { //untuk insert
      $sql1   = "insert into akun(name,email,password,phoneNumber) values ('$nama','$email','$pass','$telepon')";
      $q1     = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses     = "data successfully inserted";
      } else {
        $error      = "failed to insert data";
      }
    }
  } else {
    $error = "Silakan masukkan semua data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Akun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>


  <!--font-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap" rel="stylesheet" />

  <!--External css-->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style-table.css">
  <style>
    .form-floating {
      background-color: blanchedalmond;
    }

    .form-control {
      background-color: #1f1b17 !important;
    }

    .mx-auto {
      padding-top: 4vw;
      padding-left: 4vw;
      padding-right: 4vw;
      padding-bottom: 8vw;
    }

    .sub-container-crud {
      padding: 1.5vw 6vw;
    }
  </style>
</head>

<body>
  <nav class="navbar-dark navbar navbar-expand-lg newnav sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="logo.jpg" alt="" class="logo" /> EVENTIUM</a>
      <button class="navbar-toggler hambur" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link nlist" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nlist" href="#">Moderasi Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nlist" href="#">CRUD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nlist" href="index.html#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="mx-auto">
    <h1 class="judul-tabel">CRUD</h1>
    <div class="sub-container-crud">
      <h2 class="sub-judul-tabel">Create / Edit Data</h2>
      <div class="card-body">
        <?php
        if ($error) {
        ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
        <?php
          header("refresh:5;url=admin-user.php"); //5 : detik
        }
        ?>
        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
        <?php
          header("refresh:5;url=admin-user.php");
        }
        ?>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="floatingInput">Name</label>
            <input type="text" class="form-control text-white" id="nama" name="name" value="<?php echo $nama ?>">
          </div>
          <div class="mb-3">
            <label for="floatingInput">Email</label>
            <input type="email" class="form-control text-white" id="email" name="email" value="<?php echo $email ?>">
          </div>
          <div class="mb-3">
            <label for="floatingInput">Phone Number</label>
            <input type="number" class="form-control text-white" id="telepon" name="phoneNumber" value="<?php echo $telepon ?>">
          </div>
          <form>
            <div class="col-12 text-center">
              <input type="submit" name="simpan" value="Save Data" class="btn btn-success" />
            </div>

          </form>
      </div>
    </div>



    <h2 class="sub-judul-tabel">Account Data</h2>
    <table class='table table-bordered table-striped mt-3'>
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Action</th>
        </tr>
      <tbody>
        <?php
        $sql2   = "select * from akun order by id desc";
        $q2     = mysqli_query($koneksi, $sql2);
        $urut   = 1;
        while ($r2   = mysqli_fetch_array($q2)) {
          $id         = $r2['id'];
          $nama   = $r2['name'];
          $email      = $r2['email'];
          $password   = $r2['password'];
          $telepon    = $r2['phoneNumber'];

        ?>
          <tr>
            <td scope="row"><?php echo $urut++ ?></td>
            <td scope="row"><?php echo $nama ?></td>
            <td scope="row"><?php echo $email ?></td>
            <td scope="row"><?php echo $password ?></td>
            <td scope="row"><?php echo $telepon ?></td>
            <td scope="row">
              <a href="admin-edit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
              <a href="admin-user.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Are you sure want to delete this data')"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      </thead>
  </div>
</body>

</html>