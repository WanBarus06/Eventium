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
              <a class="nav-link nlist" href="index-pricing.php">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="index.php#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="index-gallery.php">Gallery</a>
            </li>
            <li class = "nav-item">
						<a href = "" class="nav-link nlist" style="display: flex;" ><span class="material-symbols-rounded" style="margin-right:10px;" >
person
</span><?php echo $data['name'] ?></a>  
					</li>
					<li class="nav-item" style="text-align:center;">
          <form action = "logout.php" method = "POST" style="height=100%;">
						<button type = "submit" name = "logout" class="btn newbtn">Logout</button>
						</form>
						
					</li>
        </div>
      </div>
    </nav>
</body>
</html>