<?php
  header('Content-Type: text/html; charset=iso-8859-1');

  session_start();

  require_once 'conexao.php';

  if (!isset($_SESSION['avaliador'])) {

    // BNÃO está logado
    header('Location: index.php');
  }

  $conexao = conectar();

  $sql = "SELECT * FROM trabalho ORDER BY titulo";

  $comando = $conexao->query($sql);
  $resultado = $comando->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
            <h2 class="cover-heading">Selecione o trabalho a ser avaliado:</h2>
              
            <form action="avaliar.php" method="GET">
              <select name="cod" class="selectpicker selBox" data-live-search="true" data-dropup-auto="false">
                <?php foreach ($resultado as $trab) { ?>
                  <option data-tokens="<?= $trab->titulo ?>" value="<?= $trab->id ?>" ><?= $trab->titulo ?></option>
                <?php } ?>
              </select>
              <br>
              <br>
				<input type="hidden" name="criterio" value="1">
              <button id="next" type="submit" class="btn btn-default">Próximo</button>
              </form>
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