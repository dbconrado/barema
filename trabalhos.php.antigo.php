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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="/barema/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/barema/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css">

    <script src="/barema/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="/barema/assets/js/bootstrap-select-modified.js"></script>

    <title>Barema</title>
  </head>
  <body>
	<div class="container">
		<p>Avaliador: <?= $_SESSION['nomeaval'] ?></p>
	    <h1>Trabalhos</h1>
    <div class="row">
    <select class="selectpicker" data-live-search="true">
			<?php foreach ($resultado as $trab) { ?>
			  <option data-tokens="d"><?= $trab->titulo ?></option>
			<?php } ?>
    </select>
    </div>

	</div>
  
  <script src="/barema/assets/js/bootstrap.min.js"></script>
  <script src="/barema/assets/js/barema.js"></script>
</body>
</html>