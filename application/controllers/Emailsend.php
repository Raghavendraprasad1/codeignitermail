<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailsend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('mailform');
    }

    public function send()
    {

        $arr = $this->input->post();

        try {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();

            $mail->setFrom('raghavendrakumar1520@gmail.com', '14565220');
            // add a recipient
            $mail->addAddress('raghavendrakumar1520@gmail.com');

            // add subject
            $mail->Subject = "This is a test mail";

            $mailContent = "<html lang='en'>
        <head>

        </head>
        <body>
         Hello :" . $arr['uname'] . "<br><br>
         your Contact number is :" . $arr['contact'] . "<br><br>
         Your Email is  :" . $arr['email'] . "



        </body>
        </html>";
            $mail->Body = $mailContent;

            if ($mail->send()) {
                echo "mail has been sent !";
            }
        } catch (Exception $e) {
            echo $mail->ErrorInfo;

        }

    }
}
