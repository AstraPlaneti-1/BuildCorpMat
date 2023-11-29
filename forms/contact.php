<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = 'lucas.rus.dojo@gmail.com';
$mail->Password = 'fyslihtgqwbfgawy';

$mail->setFrom($email , "BuildCorpMat"); // Set your Gmail address and your name
$mail->addAddress("lucas.rus.dojo@gmail.com" , "BuildCorpMat");



$mail->addReplyTo($email, $name); // Set the reply-to address to the user's email and name

$mail->Subject = "Comanda Site BuildCorpMat";
$mail->Body = "name:" . $name .  "\n" . "email: " . $email . "\n" . "Telefon:" . $subject . "\n" . "Comanda:" ."\n" . $message;

$mail->send();

if($mail->send()){
    $succes = "Mesajul a fost transmis cu succes!";
} else{
    $failed = "A aparut o eroare! Va rugam sa reveniti mai tarziu";
}
?>
