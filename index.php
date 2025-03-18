<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Mail Send - Envio de E-mails</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
 <header class="py-5 text-center">
  <img class="logo d-block mx-auto mb-4" 
       src="./src/assets/images/logo/logo.png" 
       alt="Logo do App Mail Send">
    <h1 class="mb-3">Send Mail</h1>
    <p class="lead text-muted">Seu app de envio de e-mails particular!</p>
 </header>
 <main class="container">
  <section class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-md">
        <div class="card-body">
          <form action="./src/assets/scripts/process_submission.php" method="post" 
                aria-label="Formulário de envio de e-mail">

          </form>
        </div>
      </div>
    </div>
  </section>
 </main>
    
</body>
</html>