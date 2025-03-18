<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Mail Send - Envio de E-mails</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./src/assets/images/logo/logo.png" alt="Logo do App Mail Send" width="72" height="72">
                <h1 class="mb-3">Send Mail</h1>
                <p class="lead text-muted">Seu app de envio de e-mails particular!</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form aria-label="Formulário de envio de e-mail">
                                <div class="mb-3">
                                    <label for="para" class="form-label fw-semibold">Destinatário</label>
                                    <input type="email" class="form-control form-control-lg" id="para" 
                                           placeholder="joao@dominio.com.br" required
                                           aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Insira um endereço de e-mail válido</div>
                                </div>

                                <div class="mb-3">
                                    <label for="assunto" class="form-label fw-semibold">Assunto</label>
                                    <input type="text" class="form-control form-control-lg" id="assunto" 
                                           placeholder="Assunto do e-mail" required>
                                </div>

                                <div class="mb-4">
                                    <label for="mensagem" class="form-label fw-semibold">Mensagem</label>
                                    <textarea class="form-control" id="mensagem" rows="5" 
                                              aria-label="Campo de texto para mensagem do e-mail"
                                              required></textarea>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                                        Enviar Mensagem
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>