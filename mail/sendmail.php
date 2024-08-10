<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendStatusOrder($recipientEmail, $recipientName, $subject, $bodyContent) {
$mail = new PHPMailer(true);

try {
    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'traubudz@gmail.com';                     //SMTP username
    $mail->Password   = 'cojt hykr ddys bkna';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
    $mail->Port       = 587;
    // $mail->SMTPDebug = 2;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('traubudz@gmail.com', 'MVT Shop');   
    $mail->addAddress($recipientEmail, $recipientName);     //Add a recipient
                 //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject; //Tiêu đề email
    $mail->Body    = $bodyContent; // nội dung
    $mail->AltBody =  strip_tags($bodyContent); // nội dung
    $mail->CharSet = 'UTF-8';
    $mail->send();

} catch (Exception $e) {
    echo "Tin nhắn gửi đi bị lỗi: {$mail->ErrorInfo}";
}
}