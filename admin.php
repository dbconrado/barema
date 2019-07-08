<?php
  session_start();

  require_once 'conexao.php';

  if (!isset($_SESSION['avaliador'])) {

    // BNÃO está logado
    header('Location: index.php');
  }

  ?>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>VII SIC - Sabará</title>
  
      <!-- Bootstrap -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
  
      <link rel="stylesheet" href="assets/css/trabalhos.css">
    </head>
    <body>
  
      <div class="site-wrapper">
  
        <div class="site-wrapper-inner">
  
          <div class="cover-container">
  
            <div class="masthead clearfix">
              <div class="inner">
                <h3 class="masthead-brand">VII SIC - Avaliação</h3>
                <nav>
                  <ul class="nav masthead-nav">
                    <li class="active"><a href="trabalhos.php">Trabalhos</a></li>
                  </ul>
                </nav>
              </div>
            </div>
  
            <div class="inner cover" align="center">
                
              <h2 class="cover-heading">Opções de Administrador</h2>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Trabalhos</h3>
                        <p class="card-text">Gerencie o cadasrto de trabalhos a serem avaliados.</p>
                        <a href="cadtrabalho.php" class="btn btn-info">Ver Trabalhos</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Avaliadores</h3>
                        <p class="card-text">Veja os avaliadores já cadastrados.</p>
                        <a href="cadavaliador.php" class="btn btn-info">Ver Avaliadores</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Resultados</h3>
                        <p class="card-text">Veja os resultados das avaliações já feitas.</p>
                        <a href="avaliacoes.php" class="btn btn-info">Ver Resultados</a>
                    </div>
                </div>

            </div>
  
          </div>
  
        </div>
  
      </div>
  
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      
  </body>
  </html>