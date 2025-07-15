<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer autoload

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                      // Use SMTP
    $mail->Host       = 'smtp.gmail.com';                 // SMTP server
    $mail->SMTPAuth   = true;                             // Enable authentication
    $mail->Username   = 'your_email@gmail.com';           // Your email
    $mail->Password   = 'your_app_password';              // Use App Password if 2FA enabled
    $mail->SMTPSecure = 'tls';                            // Encryption: tls or ssl
    $mail->Port       = 587;                              // Port (587 for TLS, 465 for SSL)

    // Recipients
    $mail->setFrom('your_email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'User Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = '<strong>Hello,</strong><br>This is a test email sent using <b>PHPMailer</b>.';
    $mail->AltBody = 'Hello, This is a test email sent using PHPMailer.';

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Email failed to send. Mailer Error: {$mail->ErrorInfo}";
}
?>
