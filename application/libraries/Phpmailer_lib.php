<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Phpmailer_lib{
    public function __construct()
    {
        // log_message('debug','PHPMailer class is loaded');
    }

    public function load(){
        require_once APPPATH.'third_party/composer/vendor/autoload.php';
        $mail=new PHPMailer(true);
          // smtp configuration
          $mail->isSMTP();
        //   $mail->Mailer = "smtp";
        //   $mail->SMTPDebug  = 1;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
          $mail->Host = 'smtp.googlemail.com';
        //   $mail->SMTPAuth = TRUE;
          $mail->Username = 'raghavendra@prologictechnologies.in';
          $mail->Password = 'type your password here';
          $mail->isHTML(True);
          return $mail;
    }

}


?>