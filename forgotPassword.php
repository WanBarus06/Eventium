<?php
//Koneksi awal ke database karena kita butuh untuk mengolah data di dalamnya
$koneksi = mysqli_connect("localhost", "root", "", "tubes");
//Dari inputan register kita mengambil data sesuai inputan
$email = $_POST['email'];
$code = md5($email.date('Y-m-d H-i-s'));
//Ini dari code github PHP Mailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //.gmail diganti sesuai kebutuhan//Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eventium00@gmail.com';                     //SMTP username
    $mail->Password   = 'yjwx apef nzzc ncfg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Eventium');
    $mail->addAddress($email,);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recovery Account';
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body style = "color: maroon; ">
     <div class="header">
    </div> 
    <div class="main">   
        <h1>Account Recovery</h1>
        <p>Dear User</p>
            <p >We have heard that you try to recover your account at our website. To recover your account please follow the link down below:</p>   
            <a href="http://localhost/Sem1/setForgot.php?code=' . $code . '">Recover Now</a>
        <p>If you did not request an account, please ignore this email.</p>   
    </div>
    <div class="footer">
            <p>&copy; [Eventium] [2023. All rights reserved.]</p>
    </div>
    </div> 
    </body>
    </html>';
    $mail->AltBody = '';

   //Jika mail terkirim maka akan jalan query INSERT ke Database.
   if ( $mail->send()) {
    $query = $koneksi->query("SELECT * FROM akun WHERE email = '$email'");
    $result = $query->fetch_assoc();

    $koneksi->query("UPDATE akun SET kode_ganti_password='$code' WHERE id ='".$result['id']."'");
    header("Location: login.php");
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}