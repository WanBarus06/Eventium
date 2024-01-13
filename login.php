<?php
session_start();
require "koneksi.php";
if (isset($_POST['login']))   {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $password = md5($pass);

  $query = $koneksi->query("SELECT * FROM akun WHERE email='$email' AND password = '$password'");
  $cek = $query->num_rows;
  //Nanti dalam variabel $cek akan dijalankan query tadi kemudian akan ditentukan baris keberapa akun user
  //dalam database 

  if ($cek > 0) {
    $verif = $query->fetch_assoc();
    if ($verif['cek_kode_aktivasi'] == 1) {
      if ($verif['level'] == 1) {
        $_SESSION['name'] = $verif['name'];
        $_SESSION['password'] = $verif['password'];
        $_SESSION['level'] = $verif['level'];
        $_SESSION['email'] = $verif['email'];
        $_SESSION['phoneNumber'] = $verif['phoneNumber'];
        echo ("Login berhasil");
        header("Location:index.php");
      } else if ($verif['level'] == 2) {
        $_SESSION['name'] = $verif['name'];
        $_SESSION['level'] = $verif['level'];
        $_SESSION['email'] = $verif['email'];
        echo "Login Berhasil";
        header("Location:admin-user.php");
      } else if($verif['level'] == 3){
        header("Location:banned.php");
      }
    } else {
      echo $email;
      echo $pass;
      echo ("Login gagal");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=\, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="logo.jpg"/>
  <title>EVENTIUM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

  <!--font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap" rel="stylesheet">

  <!--External css-->
  <link rel="stylesheet" href="new-style-login.css">
  <link rel="stylesheet" href="style.css">

  <!--Icons-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    
</head>
<body>
 <?php
  include 'main-navbar.php';
 ?>
	<div class="sub-container-login">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center align-self-center" id="byk">
					<div class="section pb-5 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-top">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
                      <form action="" method ="POST">
                        <div class="form-group">
                          <input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="email" required>
                          <i class="input-icon"><span class="material-symbols-outlined">
                            alternate_email
                            </span></i>
                        </div>	
                        <div class="form-group mt-2">
                          <input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="password" required>
                          <i class="input-icon"><span class="material-symbols-outlined">
                            lock
                            </span></i>
                        </div>
                        <a><button type = "submit" name = "login" class="btn mt-4" >submit</button></a>
                      </form>
											


                            <p class="mb-0 mt-4 text-center"><a href="switchPassword.php" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>		
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
      



</body>
</html>