<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure this path is correct

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';    // Mailtrap SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = '91e9b325c13ccf';      // Replace with your Mailtrap username
    $mail->Password   = '21bd1f4b37b520';      // Replace with your Mailtrap password
    $mail->SMTPSecure = 'tls';                         // Encryption
    $mail->Port       = 2525;                          // Mailtrap port

    // Sender and recipient
    $mail->setFrom('noreply@example.com', 'Mailtrap Test');
    $mail->addAddress('test@example.com', 'Recipient'); // Can be any email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email via Mailtrap SMTP';
    $mail->Body    = '<h3>Hello from Mailtrap!</h3><p>This is a test email sent using SMTP in PHP.</p>';
    $mail->AltBody = 'This is a plain-text version of the email body.';

    $mail->send();
    echo '✅ Message has been sent successfully!';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
