<?php
include 'dbh.php';
include 'header.php';
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'prosjektwebdev@gmail.com';                 // SMTP username
$mail->Password = 'ProjectWebDev';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('prosjektwebdev@gmail.com', 'Project Evjen WebDev');
$mail->addAddress($_SESSION['email'], 'Jan-Kristian');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('prosjektwebdev@gmail.com', 'Prosjekt Evjen WebDev');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Project: Webdev account confirmation';
$mail->Body    = 'Click this link to activate your account: http://localhost:8888/www/dblogin/activate.php';
$mail->AltBody = 'Click this link to activate your account: http://localhost:8888/www/dblogin/activate.php';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}