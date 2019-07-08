<?php
  session_start();

  require_once 'conexao.php';

  if (!isset($_SESSION['avaliador'])) {

    // BNÃO está logado
    header('Location: index.php');
  }

  $conexao = conectar();
  $sql = "SELECT id, nome FROM avaliador ORDER BY nome";
  $comando = $conexao->query($sql);
  $avaliadores = $comando->fetchAll(PDO::FETCH_OBJ);

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
                
                <div class="alert alert-dark" role="alert">
                    <?= $mensagem ?>
                </div>

              <h2 class="cover-heading">Lista de Avaliadores</h2>

                <section>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome do Avaliador</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($avaliadores as $a): ?>

                            <tr>
                                <td><?= $a->id ?></td>
                                <td><?= $a->nome ?></td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </section>

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