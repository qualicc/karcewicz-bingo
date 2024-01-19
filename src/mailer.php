<?php
namespace Vendor\KarcewiczBingo;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'env.php';

class Mailer{
    public function __construct($adresat,$tresc,$tytuł) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send usingMAIL_HOST' SMTP
        $mail->Host       = getenv('MAILHOST');                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = getenv('MAILUSERNAME');                     //SMTP username
        $mail->Password   = getenv('MAILPASSWORD');                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        $mail->setFrom(getenv('MAILUSERNAME'));
        $mail->addAddress($adresat);
        $mail->addBCC('kontakt@jakubmoszynski.pl');               //Name is optional

    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $tytuł;
        $mail->Body    = $tresc;
    
        $mail->send();
        
    }
}