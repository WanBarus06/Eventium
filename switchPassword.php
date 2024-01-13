<?php
  require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="logo.jpg"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link 
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap"
      rel="stylesheet"
    />

    <!--External css-->
    <link rel="stylesheet" href="contact.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link 
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap"
      rel="stylesheet"
    />

    <!--External css-->
    <link rel="stylesheet" href="contact.css" />
    <link rel="stylesheet" href="style-login.css" />
    <link rel="stylesheet" href="style.css" />


    <!--Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css" />


    <!--Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>
<body>
  <?php
  include 'main-navbar.php';
  ?>

	<div class="sub-container-login">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center align-self-center">
					<div class="section pb-5 pt-sm-2 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper"  id="card-confir" >
								<div class="card-front" style="position: relative;">
									<div class="">
										<div class="subconfir section text-center">
											<h4 class="mb-4 pb-3">Reset Password</h4>
                      <form action="forgotPassword.php" method = "POST">
                        <div class="form-group mt-2">
                            <input type="email" name="email" class="form-style" placeholder="Your Email" id="logpass" autocomplete="off" required>
                            <i class="input-icon"><span class="material-symbols-outlined">
                              lock
                              </span></i>
                          </div>
                        <button type = "submit" class="btn mt-4">submit<button>
                      </form>						
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
