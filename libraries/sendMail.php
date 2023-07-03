<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
function send_mail($send_to_mail,$send_to_fullname,$subject,$content,$option=array()){
    global $config;
    $config_email =$config['email'];
    $mail = new PHPMailer(true);  
  // print_r($mail);
    try {
       //Server settings
       $mail->SMTPDebug = 0;                                 // Enable verbose debug output
       $mail->isSMTP();                                      // Set mailer to use SMTP
       $mail->Host = $config_email['smtp_host'];  // Specify main and backup SMTP servers
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
       $mail->Username = $config_email['smtp_user'];                 // SMTP username
       $mail->Password = $config_email['smtp_pass'];                           // SMTP password
       $mail->SMTPSecure = $config_email['smtp_sercure'];                            // Enable TLS encryption, `ssl` also accepted
       $mail->Port = $config_email['smtp_port'];                                    // TCP port to connect to
       $mail -> charSet = $config_email['charset']; 
 
       //Recipients
       $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
       $mail->addAddress($send_to_mail, $send_to_fullname);     // Add a recipient
       // $mail->addAddress('ellen@example.com');               // Name is optional
       $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);
       $mail->addCC($config_email['smtp_user']);
       // $mail->addBCC('bcc@example.com');
 
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
       //Content
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = $subject;
       $mail->Body    = $content;
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
       $mail->send();
       echo 'Gửi thành công';
    } catch (Exception $e) {
       echo 'email chưa được gửi xem chi tiết lỗi Error: ', $mail->ErrorInfo;
    }

}
?>