<?php
  session_start();

  require_once 'conexao.php';

  if (!isset($_SESSION['admin'])) {

    // BNÃO está logado
    header('Location: index.php');
  }

  $conexao = conectar();


  $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';

  if (!empty($_POST)) {

    $sql = "INSERT INTO avaliador (nome) VALUES (?)";
    $comando = $conexao->prepare($sql);
    $sucesso = $comando->execute([ $_POST['nome'] ]);

    if ($sucesso)
      $mensagem = "Cadastrado com sucesso!";
    else
      $mensagem = 'ERRO: ' . $comando->errorInfo()[2];

    // POST-Redirect-GET
    header('Location: cadavaliador.php?mensagem=' . $mensagem);
    return;
  }

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
      <title>SIC - IFMG</title>
  
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
              <div id="login">
                  <p>Administrador: <b><?= $_SESSION['admin'] ?></b>
                  <a href="sair.php" class="btn btn-warning btn-sm">Sair</a>
                </div>
                <h3 class="masthead-brand">SIC - Avaliação</h3>
                <nav>
                  <ul class="nav masthead-nav">
                  <li><a href="admin.php">Ir para Painel</a></li>
                  </ul>
                </nav>
              </div>
            </div>
  
            <div class="inner cover" align="center">
                
                <div class="alert alert-dark" role="alert">
                    <?= $mensagem ?>
                </div>

              <h2 class="cover-heading">Lista de Avaliadores</h2>

                <div>
                  <button id="novo" class="btn btn-info">Novo Avaliador</button>
                </div>
                <section id="cadastro" style="display:none">
                  <form action="cadavaliador.php" method="POST">
                    <div class="form-group">
                      <label for="itnome">Nome do Avaliador</label>
                      <input id="itnome" name="nome" type="text" class="form-control" required>
                    </div>
                    <div>
                      <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                  </form>
                </section>

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

      <script>
        $("#novo").click(function() {
          $("#cadastro").show();
          $("#cadastro #itnome").focus();
        });
      </script>
  </body>
  </html>