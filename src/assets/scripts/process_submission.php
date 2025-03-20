<?php

require "./src/assets/lib/PHPMailer/Exception.php";
require "./src/assets/lib/PHPMailer/OAuth.php";
require "./src/assets/lib/PHPMailer/PHPMailer.php";
require "./src/assets/lib/PHPMailer/POP3.php";
require "./src/assets/lib/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Message {
  private $to = null;
  private $subject = null;
  private $message = null;
  public $status = array( 'codigo_status' => null, 'descricao_status' => '');

  public function __get($attribute) {
    return $this->$attribute;
  }

  public function __set($attribute, $value) {
    $this->$attribute = $value;
  }

  public function validMessage(){
    if(empty($this->to) || empty($this->subject) || empty($this->message)){
      return false;
    }

    return true;
  }
}

$message = new Message();
$message-> __set('to', $_POST['to']);
$message-> __set('subject', $_POST['subject']);
$message-> __set('message', $_POST['message']);


if(!$mensagem->mensagemValida()) {
  echo 'Mensagem não é válida';
  header('Location: ./index.php  ');
}

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('', '');
    $mail->addAddress($mensagem-> __get('para'));     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $message-> __get('subject');
    $mail->Body    = $message-> __get('message');
    $mail->AltBody = 'É necessario utiilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde.";
    echo 'Detalhes do erro: ' . $mail->ErrorInfo;
}

?>