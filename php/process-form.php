<?php

error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);
  $to = "formhandler@mitchs-stitches.com";
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'devtestsforemails@gmail.com';                     // SMTP username
    $mail->Password   = 'dabb dhmy vvza vqch';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress($to);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    echo 'Message has been sent';
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>

<!-- hostpapa stuff should i need -->
<!-- Host: 'mail.papamail.net'
Port: 993
Ay]BV#KK-sn;js#
Username: Your full email address (i.e: name@domain.com) 

gmp--dabb dhmy vvza vqch
-->