<?php

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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css">

    <link rel="stylesheet" href="assets/css/trabalhos.css">
    
  </head>
  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="mas<h3 class="masthead-brand">VII SIC - Avaliação</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="trabalhos.php">Trabalhos</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Contact</a></li>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select-modified.js"></script>
    
</body>
</html>