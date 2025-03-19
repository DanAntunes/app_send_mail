<?php

class Message {
  private $to = null;
  private $assunto = null;
  private $mensagem = null;

  public function __get($atributo) {
    return $this->$atributo;
  }

  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
  }

  public function mensagemValida(){
    if(empty($this->to) || empty($this->assunto) || empty($this->mensagem)){
      return false;
    }

    return true;
  }
}

$mensagem = new Message();
$mensagem-> __set('to', $_POST['to']);
$mensagem-> __set('assunto', $_POST['assunto']);
$mensagem-> __set('mensagem', $_POST['mensagem']);


if ($mensagem->mensagemValida()){
  echo 'Mensagem Valida';
} else {
  echo 'Mensagem não é valida';
}




?>