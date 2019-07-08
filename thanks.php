<?php

session_start();

require_once 'conexao.php';

if (!isset($_SESSION['avaliador'])) {

    // BNÃO está logado
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SIC - IFMG</title>

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
            <div id="login">
              <p>Avaliador <b><?= $_SESSION['avaliador'] ?></b>: <?= $_SESSION['nomeaval'] ?>
              <a href="sair.php" class="btn btn-warning btn-sm">Sair</a>
            </div>
              <h3 class="mas<h3 class="masthead-brand">SIC - Avaliação</h3>
            </div>
            </div>

            <div class="inner cover" align="center">
            <h1 class="cover-heading"> O IFMG Campus IFMG agradece sua participação! </h1>
            <br>
            <a href="trabalhos.php" class="btn btn-default">Avaliar mais projetos</a>            
            </div>

        </div>

        </div>

    </div>

    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
?>