<?php
  session_start();

  require_once 'conexao.php';

  $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
  
  $logado = true;
  if (!isset($_SESSION['admin'])) {
    $logado = false;
  }

  if (!empty($_POST)) {

    $conexao = conectar();
    $sql = "SELECT * FROM administrador WHERE usuario=? AND senha=?";
    $comando = $conexao->prepare($sql);
    $sucesso = $comando->execute([
        $_POST['usuario'],
        $_POST['senha']
    ]);

    if ($sucesso) {
        $resultado = $comando->fetchAll(PDO::FETCH_OBJ);
        if (count($resultado) > 0) {
            $_SESSION['admin'] = $resultado[0]->usuario;
            header('Location: admin.php');
            return;
        } else {
            $mensagem = "Usuário/senha não conferem";
        }
    } else {
        $mensagem = "ERRO: " . $conexao->errorInfo()[2];
    }

  }

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
                
<?php if ($logado): ?>
                <div id="login">
                  <p>Administrador: <b><?= $_SESSION['admin'] ?></b>
                  <a href="sair.php" class="btn btn-warning btn-sm">Sair</a>
                </div>
<?php endif; ?>

                <h3 class="masthead-brand">SIC - Avaliação</h3>
                <?php if (!$logado): ?>
                <nav>
                  <ul class="nav masthead-nav">
                    <li><a href="index.php">Ir para Home</a></li>
                  </ul>
                </nav>
                <?php endif; ?>
                </div>
            </div>
  
            <div class="inner cover" align="center">
                
                <div class="alert alert-dark" role="alert">
                    <?= $mensagem ?>
                </div>

              <?php if ($logado): ?>
              <h2 class="cover-heading">Painel do Administrador</h2>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Trabalhos</h3>
                        <p class="card-text">Gerencie o cadastro de trabalhos a serem avaliados.</p>
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
            
<?php else: ?>

                <form action="admin.php" method="POST">
                    <div class="form-group">
                        <label for="itusuario">Usuário</label>
                        <input id="itusuario" name="usuario" type="text" required class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="itsenha">Senha</label>
                        <input id="itsenha" name="senha" type="password" required class="form-control">
                    </div>
                    <button class="btn btn-primary">Entrar</button>
                </form>

<?php endif; ?>

            </div>
  
          </div>
          
          <footer>
            <p>Desenvolvido pelo IFMG campus IFMG</p>
          </footer>
  
        </div>
  

      </div>
    
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      
  </body>
  </html>