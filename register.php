<?php
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

  <!-- Validation jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</head>
<body>


<?php
ob_start();
session_start();
    include 'main-navbar.php';
    
    // if (isset($_SESSION['notification'])) {
    //   echo $_SESSION['notification'];
    //   session_unset();
      
      
       
    // } else if(isset($_SESSION['fail'])){
    //   echo $_SESSION['fail'];
    //   session_unset();
      
    // }
    ob_end_flush();
          
    ?>


	<div class="sub-container-login">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center align-self-center" id="byk">
					<div class="section pb-5 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
                      <?php
                      ?>
											<h4 class="mb-4 pb-3">Sign Up</h4>
                      <form method = "POST">
                        <div class="form-group">
                          <input type="text" name="name" class="form-style" placeholder="Your Full Name" id="name" autocomplete="name">
                          <i class="input-icon uil"><span class="material-symbols-outlined">
                            person
                            </span></i>
                            <span id = "nameMsg"></span>
                        </div>	
                        <div class="form-group mt-2">
                          <input type="email" name="email" class="form-style" placeholder="Your Email" id="email" autocomplete="email" required>
                          <i class="input-icon"><span class="material-symbols-outlined">
                            alternate_email
                            </span></i>
                            <span id = "emailMsg"></span>
                        </div>
                        	
                        <div class="form-group mt-2">
                          <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="password" required>
                          <i class="input-icon"><span class="material-symbols-outlined">
                            lock
                            </span></i>
                            <span id = "passMsg"></span>
                        </div>

                        <div class="form-group mt-2">
                          <input type="number" name="phoneNumber" class="form-style" placeholder="Your Phone Number" id="phoneNumber" autocomplete="phoneNumber" required>
                          <i class="input-icon"><span class="material-symbols-outlined">
                            call
                            </span></i>
                            <span id = "phoneMsg"></span>
                        </div>	
                        <span id = "btn">
                        <a><button class="btn mt-4" type = "submit" name = "register">submit</button></a>
                      </span>
                          </div>
                        </div>
                      </form>
											
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

<?php
//Koneksi awal ke database karena kita butuh untuk mengolah data di dalamnya
$koneksi = mysqli_connect("localhost", "root", "", "tubes");
//Dari inputan register kita mengambil data sesuai inputan
if(isset($_POST['register'])){
$email = $_POST['email'];
$pass = $_POST['password'];
$password = md5($pass);
$code = md5($email . date('Y-m-d H-i-s'));
$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
}
//Ini dari code github PHP Mailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Load Composer's autoloader
require 'vendor/autoload.php';
if(isset($_POST['register'])){
  $query = $koneksi->query("SELECT * FROM akun WHERE email='$email'");
  $cek = $query->num_rows;

 if (!$cek) {


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //.gmail diganti sesuai kebutuhan//Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'eventium00@gmail.com';                     //SMTP username
        $mail->Password = 'yjwx apef nzzc ncfg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Eventium');
        $mail->addAddress($email, $name);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Account Activation';
        $mail->Body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body style = "color: maroon; ">
     <div class="title">
    </div> 
    <div class="main">   
        <h1>Account Activation</h1>
        <p>Dear ' . $name . '</p>
            <p >Thank you for signing up with us. To activate your Gmail account, please click on the following link:</p>   
            <a href="http://localhost/Sem1/setActivation.php?code=' . $code . '">Activate Now</a>
        <p>If you did not request an account, please ignore this email.</p>   
    </div>
    <div class="footer">
            <p>&copy; [Eventium] [2023. All  rights reserved.]</p>
    </div>
    </div> 
    </body>
    </html>';

        //Jika mail terkirim maka akan jalan query INSERT ke Database.
        if ($mail->send()) {
            $koneksi->query("INSERT INTO akun(name, email, password, phoneNumber, kode_aktivasi, level) values('$name', '$email', '$password', '$phoneNumber', '$code', '1')");
            $_SESSION['notification'] = "<div class='sub-container'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Register Berhasil</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
        </div>";
        
       
        
        } 

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else if($cek > 0) {
  
  $_SESSION['fail'] = "<div class='sub-container'>
  <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Email has already exist </strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
</div>";

}

}

?>
<script type="text/javascript">
  $(document).ready(function () {
    $("#email").on("input", function () {
      if (validateEmail()) {
        $("#emailMsg").html("<p>Valid</p>");
      } else {
        if (validateMail()) {
          $("#emailMsg").html("<p>Email must be valid</p>");
        } else
        $("#emailMsg").html("<p>Must be filled</p>");
      }
      buttonState();
    });

    $("#password").on("input", function () {
      if (validatePassword()) {
        $("#passMsg").html("<p>Valid</p>");
      } else {
        if (validatePass()) {
          $("#passMsg").html("<p>Minimal 8 characters</p>");
        } else {
          $("#passMsg").html("<p>This must be filled</p>");
        }
      }
      buttonState();
    });

    $("#phoneNumber").on("input", function () {
      if (validatePhone()) {
        $("#phoneMsg").html("<p>Valid</p>");
      } else {
        $("#phoneMsg").html("<p>This must be filled</p>");
      }
      buttonState();
    });

    $("#name").on("input", function () {
      if (validateName()) {
        $("#nameMsg").html("<p>Valid</p>");
      } else {
        $("#nameMsg").html("<p>This must be filled</p>");
      }
      buttonState();
    });
    buttonState();
  });

  function validateEmail() {
    var email = $("#email").val();
    var valEmail = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    return valEmail.test(email);
  }

  function validatePassword() {
    var password = $("#password").val();
    return password.length >= 8;
  }

  function validatePhone() {
    var phoneNumber = $("#phoneNumber").val();
    return phoneNumber !== "";
  }

  function validatePass() {
    var password = $("#password").val();
    return password !== "";
  }

  function validateName() {
    var name = $("#name").val();
    return name !== "";
  }

  function validateMail() {
    var email = $("#email").val();
    return email !== "";
  }

  function buttonState(){
		if(validateEmail() && validatePassword() && validateMail && validateName && validatePass && validatePhone){
	
			$("#btn").show();
		}else{
			
			$("#btn").hide();
		}
  }

  
</script>
