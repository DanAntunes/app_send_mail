<?php

class Message {
  private $to = null;
  private $subject = null;
  private $mensagem = null;

  public function __get($atributo) {
    return $this->$atributo;
  }

  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
  }

  public function validMessage(){
    if(empty($this->to) || empty($this->subject) || empty($this->mensagem)){
      return false;
    }

    return true;
  }
}

$mensagem = new Message();
$mensagem-> __set('to', $_POST['to']);
$mensagem-> __set('subject', $_POST['subject']);
$mensagem-> __set('mensagem', $_POST['mensagem']);


if ($mensagem->validMessage()){
  echo 'Mensagem Valida';
} else {
  echo 'Mensagem não é valida';
}




?>