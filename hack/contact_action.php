
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

if(isset($_POST['contact_submit']))
{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        $mail->Username   = 'santusau2006@gmail.com';
        $mail->Password   = 'lohn qfyw axmi cqti';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('santusau2006@gmail.com', 'FellowFinds Contact Form');

        // Where messages will arrive
        $mail->addAddress('santusau2006@gmail.com');

        $mail->isHTML(true);

        $mail->Subject = "New Contact Form Message";

        $mail->Body = "
            <h3>New Contact Message</h3>

            <p><strong>Name:</strong> {$name}</p>

            <p><strong>Email:</strong> {$email}</p>

            <p><strong>Subject:</strong> {$subject}</p>

            <p><strong>Message:</strong></p>

            <p>{$message}</p>
        ";

        $mail->send();

        header("Location: contact_us.php?success=1");
        exit();

    } catch (Exception $e) {

        header("Location: contact_us.php?error=1");
        exit();

    }
}
?>