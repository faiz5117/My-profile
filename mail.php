

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name= $_POST['name'];
$visitor_email= $_POST['email'];
$subject=$_POST['subject'];
$message= $_POST['message'];

$email_to='faiz5117@gmail.com';
$email_from='sayyanm@gmail.com';
$pwd='non245117';                                         //ildugzbiyoninbmi

$email_subject="New Form Submission";

$email_body= "User Name: $name.\n".
"User Email: $visitor_email.\n"."User Subject: $subject.\n"
"User Message: $message.\n";

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $email_from;                     // SMTP username
    $mail->Password   = $pwd; // Your Password;                               // SMTP password  // Use App password in the case of error.
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email_from, 'Faizudheen');
    $mail->addAddress($email_to);     // Add a recipient
    $mail->addReplyTo($email_from);
    
    // // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $email_subject;
    $mail->Body    = $email_body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	header("Location: index.html");    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>