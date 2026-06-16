<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['email']) || empty($_POST['email'])) {
    exit("Email required");
}

$email = trim($_POST['email']);

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['otp_email'] = $email;

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // Gmail
    $mail->Username   = 'santusau2006@gmail.com';

    // Gmail App Password
    $mail->Password   = 'lohn qfyw axmi cqti';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('yourgmail@gmail.com', 'FellowFinds');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification OTP';

    $mail->Body = "
        <h2>FellowFinds Email Verification</h2>
        <p>Your OTP is:</p>
        <h1>$otp</h1>
        <p>This OTP will expire in 10 minutes.</p>
    ";

    $mail->send();

    echo "success";

} catch (Exception $e) {

    echo "Mailer Error: " . $mail->ErrorInfo;

}