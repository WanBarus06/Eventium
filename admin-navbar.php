<?php
session_start();
require 'koneksi.php';
if (!isset($_SESSION['email'])) {
	header('Location: login.php');
	exit;
}
$email = $_SESSION['email'];
$query = "SELECT * FROM akun WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

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
<nav class="navbar-dark navbar navbar-expand-lg newnav sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"
          ><img src="logo.jpg" alt="" class="logo" /> EVENTIUM</a
        >
        <button
          class="navbar-toggler hambur"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link nlist" aria-current="page" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-pesanan.php">Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-ban.php">Ban User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-user.php">CRUD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-contact.php">Contact</a>
            </li>
            <li>
            <form action = "logout.php" method = "POST" style="height=100%;">
						<button type = "submit" name = "logout" class="btn newbtn">Logout</button>
						</form>
						
</li>
          </ul>
        </div>
      </div>
    </nav>

</body>
</html>