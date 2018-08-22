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
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Barema</title>
  </head>
  <body>
	<div class="container">
		<p>Avaliador: <?= $_SESSION['nomeaval'] ?></p>
	    <h1>Trabalhos</h1>

		<ul>

			<?php foreach ($resultado as $trab) { ?>
			<li><?= $trab->titulo ?></li>
			<?php } ?>

		</ul>

	</div>
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/barema.js"></script>
</body>
</html>