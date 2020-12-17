<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp()
    {
        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = getenv("SMTP_HOST");
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("MAIL_USERNAME");
        $this->mail->Password = getenv("MAIL_PASS");
        $this->mail->Port = getenv("SMTP_PORT");

        $this->mail->isHtml(true);
        $this->mail->singleTo = true;
        
        $this->mail->From = getenv("ADMIN_EMAIL");
        $this->mail->FromName = "Also Min Thike Kyaw";

    }

        public function send($data)
    {
        $this->mail->addAddress($data['mail'],$data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['filename'], $data);
        return $this->mail->send();
    }
}