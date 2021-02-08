<?php

require_once "php-mailer/PHPMailer.php";
require_once "php-mailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "rahmmed.bd24@gmail.com";
$mail->FromName = "Rasel Ahmmed";

//To address and name
$mail->addAddress("jalombd1@gmail.com", "Ahmmed Rasel");

//Address to which recipient will reply
$mail->addReplyTo("rahmmed.bd24@gmail.com", "Reply");


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}









?>