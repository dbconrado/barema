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
    <link rel="stylesheet" href="/barema/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css">

    <link rel="stylesheet" href="/barema/assets/css/trabalhos.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="/barema/assets/js/bootstrap.min.js"></script>
    <script src="/barema/assets/js/bootstrap-select-modified.js"></script>
    
    <script>
        $(document).ready( function()
        {
            $("#avaliar-mais").on('click', function(e)
                {
                    e.preventDefault();
                    window.location.href = '/barema';
                });
        });
    </script>
  </head>
  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cover</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="/barema">Home</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h2 class="cover-heading"> Você já avaliou este projeto! </h2>
            
            <button id="avaliar-mais" type="button" class="btn btn-default">Avaliar mais projetos</button>
          </div>

        </div>

      </div>

    </div>
</body>
</html>