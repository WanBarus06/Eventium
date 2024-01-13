<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTIUM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!--font-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--External css-->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style-table.css">
  <link rel ="stylesheet" href="message.css">

</head>
<body>

<?php
    include 'admin-navbar.php';
?>
      <div class = "message-container">
        <h2 class="judul-tabel" stlye = >Ban User </h2>
       

    <table class='table table-bordered table-striped mt-3'>
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Level</th>
          <th scope="col">Action</th>
        </tr>
      <tbody>
        <?php

        require 'koneksi.php';
        $sql2   = "select * from akun order by id desc";
        $q2     = mysqli_query($koneksi, $sql2);
        while ($r2   = mysqli_fetch_array($q2)) {
          $id         = $r2['id'];
          $nama   = $r2['name'];
          $email      = $r2['email'];
          $password   = $r2['password'];
          $telepon    = $r2['phoneNumber'];
          $level      = $r2['level'];

            if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = $koneksi->query("SELECT * FROM akun WHERE id = $id");
            $result = mysqli_fetch_array($query);
            $email = $result['email'];
            $q1 = "UPDATE akun SET level = 3 WHERE id = $id";
            $koneksi->query($q1);
            
            
          
            }
          

        ?>
          <tr>
              <td scope="row"><?php echo $nama ?></td>
              <td scope="row"><?php echo $email ?></td>
              <td scope="row"><?php echo $password ?></td>
              <td scope="row"><?php echo $telepon ?></td>
              <td scope="row"><?php echo $level ?></td>
            <td scope="row">
             <a href="admin-ban.php?id=<?php echo$id;?>"> <button type="button" class="btn btn-danger" name = "ban" data-toggle="modal" data-target="#exampleModal">Ban</button></a>

      </div>
    </div>
  </div>
</div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      </thead>
  </div>
      </div>
</body>
</html>