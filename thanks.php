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
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                </nav>
            </div>
            </div>

            <div class="inner cover" align="center">
            <h1 class="cover-heading"> O IFMG Campus Sabará agradece sua participação! </h1>
            
            <a href="trabalhos.php" class="btn btn-default">Avaliar mais projetos</a>            
            </div>

        </div>

        </div>

    </div>

    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
?>