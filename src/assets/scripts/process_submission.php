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

    $message->status['status_code'] = 1;
    $message->status['description'] = 'E-mail enviado com sucesso!';

} catch (Exception $e) {
    
    $message->status['status_code'] = 2;
    $message->status['description'] = 'Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <!-- Metadados  essenciais -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- SEO Básico -->
  <title>App Mail Send - Envio de E-mails</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Danilo Antunes">

  <!-- Controle de indexação -->
  <meta name="robots" content="index, follow">

  <!-- Web Manifest e Configurações PWA -->
  <link rel="manifest" href="../images/favicon/site.webmanifest">
  <meta name="theme-color" content="#ffffff">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">

  <!-- Framework CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Folha de estilo principal -->
  <link rel="stylesheet" href="../css/style.css">
   
</head>
<body>
<header class="py-5 text-center">
  <img class="logo d-block mx-auto mb-4" 
       src="../images/logo/logo.png" 
       alt="Logo do App Mail Send">
  <h1 class="mb-3">Send Mail</h1>
  <p class="lead text-muted">Seu app de envio de e-mails particular!</p>
</header>
<main class="container mb-2">
  <section class="row justify-content-center">
    <div class="col-md-12">
      <?php if($message->status['status_code'] == 1) { ?>
        <div class="container">
          <h1 class="display-4 text-success">Sucesso</h1>
          <p><?= $message->status['description'] ?></p>
          <a href="../../../index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
        </div>
      <?php } ?>
    </div>
  </section>
</main>

</body>
</html>