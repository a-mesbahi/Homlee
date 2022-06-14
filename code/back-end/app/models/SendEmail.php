<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

class SendEmail
{
    public function admin($subject,$body,$name,$email)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "aminmsb2003@gmail.com";
        $mail->Password = "vendredi1120deux!";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";


        $mail->isHTML(true);
        $mail->setFrom("aminmsb2003@gmail.com",$name);//from
        $mail->addAddress($email);//to
        $mail->Subject = ("$subject");
        $mail->Body = $body;

        return $mail->send();
    }
}