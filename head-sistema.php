<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIASEF</title>
    <link rel="shortcut icon" href="./img/icon-white.png" type="image/x-icon">

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!--CSS-->
    <link rel="stylesheet" href="./style.css">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">

    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="script.js" defer></script>

</head>
<body>
    <!--NAVBAR POR CATEGORIA-->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="./img/logo-h-black.png" alt="logo do siasef" class="navbar-brand" width= 120px>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="./sistema.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./adicionar.php">Adicionar Materiais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./discentes.php">Adicionar Discentes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./historico.php">Histórico</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./encerrar.php">Sair</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>


      <!--JS BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>