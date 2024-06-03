<!-- <?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'ayangnovaanggraeni371@gmail.com';

$email_subject = 'New FormSubmission';

$email_body ="User Name: $name.\n".
             "User Email: $visitor_email.\n".
             "Subject: $subject.\n".
             "User Message: $message.\n";

$to = 'ayangnovadolour@gmail.com';

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

sendmail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");
?> -->


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_body = "User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Ganti dengan SMTP server Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // Ganti dengan username SMTP Anda
    $mail->Password = 'your-email-password'; // Ganti dengan password SMTP Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('your-email@example.com', 'Mailer');
    $mail->addAddress('ayangnovadolour@gmail.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Form Submission';
    $mail->Body = nl2br($email_body);
    $mail->AltBody = $email_body;

    $mail->send();
    header("Location: contact.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
