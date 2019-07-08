<?php
  session_start();

  require_once 'conexao.php';

  if (!isset($_SESSION['admin'])) {

    // BNÃO está logado
    header('Location: index.php');
  }

  $conexao = conectar();

  $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';

  if (!empty($_POST) && empty($_POST['id'])) {
      // cadastrar o trabalho

      $sql = "INSERT INTO trabalho (titulo, area, campus, categoria) VALUES (?,?,?,?)";
      $comando = $conexao->prepare($sql);
      $sucesso = $comando->execute([
        $_POST['titulo'],
        $_POST['area'],
        $_POST['campus'],
        $_POST['categoria']
      ]);
  
      if ($sucesso)
        $mensagem = "Cadastrado com sucesso!";
      else
        $mensagem = 'ERRO: ' . $comando->errorInfo()[2];
    
        // POST-Redirect-GET
        header('Location: cadtrabalho.php?mensagem=' . $mensagem);
        return;
  }
  else if (!empty($_POST) && !empty($_POST['id'])) {
      // remover

      $sql = "DELETE FROM trabalho WHERE id=?";
      $comando = $conexao->prepare($sql);
      $sucesso = $comando->execute([ $_POST['id'] ]);
      if ($sucesso)
        $mensagem = "Trabalho removido!";
      else
        $mensagem = 'ERRO: não posso remover trabalho que já foi avaliado.' ;
      
        // POST-Redirect-GET
        header('Location: cadtrabalho.php?mensagem=' . $mensagem);
        return;
  }

  $sql = "SELECT id, titulo, campus, area, categoria FROM trabalho ORDER BY titulo";
  $comando = $conexao->query($sql);
  $trabalhos = $comando->fetchAll(PDO::FETCH_OBJ);

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


        <style type="text/css">
            details {
                color: #000;
                width: 100%;
                margin-bottom: 10px;
                padding-bottom: 5px;
            }

            summary {
                background-color: #9fb6ce;
                border: 1px solid #9fb6ce;
                outline: none;
                padding: 20px;
                margin-bottom: 5px;
            }

            details[open] summary {
                background-color: lightslategray;
                border: 1px solid lightslategray;
            }

            details[open] {
                background: #fff;
            }
        </style>      
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

              <h2 class="cover-heading">Cadastro de Trabalhos</h2>

                <button id="novo" class="btn">Cadastrar</button>
                <section id="cadastro" style="display: none">
                    <form action="cadtrabalho.php" method="POST">
                        <div class="form-group">
                            <label for="ittitulo">Título</label>
                            <input id="ittitulo" class="form-control" type="text" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="itarea">Área</label>
                            <input id="itarea" class="form-control" type="text" name="area" required list="areas">
                        </div>
                        <datalist id="areas">
                            <option value="Ciências Agrárias">
                            <option value="Ciências Biológicas">
                            <option value="Ciências da Saúde">
                            <option value="Ciências Exatas e da Terra">
                            <option value="Ciências Sociais Aplicadas">
                            <option value="Ciências Humanas">
                            <option value="Engenharias">
                            <option value="Linguística, Letras e Artes">
                            <option value="Multidisciplinar">
                            <option value="Submissões Gerais">
                        </datalist>
                        <div class="form-group">
                            <label for="itcampus">Campus</label>
                            <input id="itcampus" class="form-control" type="text" name="campus" required list="campuses">
                        </div>
                        <datalist id="campuses">
                            <option value="Arcos">
                            <option value="Bambuí">
                            <option value="Betim">
                            <option value="Congonhas">
                            <option value="Formiga">
                            <option value="Ibirité">
                            <option value="Ipatinga">
                            <option value="Itabirito">
                            <option value="Lafaiete">
                            <option value="Ouro Branco">
                            <option value="Ouro Preto">
                            <option value="Piumhi">
                            <option value="Ponte Nova">
                            <option value="Reitoria">
                            <option value="Ribeirão das Neves">
                            <option value="IFMG">
                            <option value="Santa Luzia">
                            <option value="São João Evangelista">
                            <option value="Valadares">
                        </datalist>
                        <div class="form-group">
                            <label for="itcategoria">Categoria</label>
                            <select id="itcategoria"name="categoria" required class="form-control">
                                <option value="P" selected>POSTER</option>
                                <option value="O">ORAL</option>
                            </select>
                        </div>
                        <p><button type="submit" class="btn btn-primary">Cadastrar</button></p>
                    </form>
                </section>

                <section>
                    <h3>Trabalhos Cadastrados</h3>
                    <?php foreach ($trabalhos as $t): ?>
                    <details>
                        <summary><?= $t->titulo ?></summary>
                        <p><?= $t->categoria == 'P' ? 'POSTER' : 'ORAL' ?></p>
                        <p><?= $t->campus ?></p>
                        <p><?= $t->area ?></p>
                        <p>
                            <form action="cadtrabalho.php" method="POST">
                                <input type="hidden" name="id" value="<?= $t->id ?>">
                                <button class="btn btn-danger" type="submit">REMOVER</button>
                            </form>
                        </p>
                    </details>
                    <?php endforeach; ?>
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
            $("#cadastro #ittitulo").focus();
        });
      </script>

  </body>
  </html>