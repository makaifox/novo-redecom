<?php

require_once __DIR__.'/../src/PHPMailer.php';
require_once __DIR__.'/../src/SMTP.php';
require_once __DIR__.'/../src/Exception.php'; 

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    private $mail;

    public $titulo;
    public $mensagem;
    public $assunto;
    public $userName;
    public $password;


    public function __construct($setFrom, $address, $mensagem, $titulo, $anexo = 0) {
        try {
            
            $this->mail = new PHPMailer(true);

            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Port = 587;
            $this->mail->SMTPDebug = 3;
            $this->SMTPAutoTLS = false; 
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
            $this->mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
            $this->mail->isHTML(true);
            $this->mail->Username = 'governodemesquita@gmail.com';
            $this->mail->Password = 'mesq#pmm@%ccs';
            $this->mail->setFrom($setFrom);
            $this->mail->addAddress($address);
            $this->mail->Subject = $titulo;
            $this->mail->Body = $mensagem;
            $this->mail->AltBody = $this->titulo; 
            if($anexo) {
                $this->mail->AddAttachment(__DIR__.'/../arquivos/'.$anexo);
            } 
            if($this->mail->send()) {
                echo "Email enviado com sucesso";
            } else {
                echo "email não enviado";
            }
        } catch(Exception $e) {
            echo "Erro ao enviar mensagem:  {$this->mail->ErrorInfo}";
        }
    }


}