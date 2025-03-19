<?php

require "./src/assets/lib/PHPMailer/Exception.php";
require "./src/assets/lib/PHPMailer/OAuth.php";
require "./src/assets/lib/PHPMailer/PHPMailer.php";
require "./src/assets/lib/PHPMailer/POP3.php";
require "./src/assets/lib/PHPMailer/SMTP.php";

class Message {
  private $to = null;
  private $subject = null;
  private $message = null;

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


if ($message->validMessage()){
  echo 'Mensagem Valida';
} else {
  echo 'Mensagem não é valida';
}




?>