<?php

session_start();

require_once 'conexao.php';

$mensagem = "";

if (isset($_SESSION['avaliador'])) {

	// está logado
	header('Location: trabalhos.php');

} else if (isset($_POST['codigo'])) {
	
	$conexao = conectar();

	$sql = "SELECT * FROM avaliador WHERE id=?";
	
	$comando = $conexao->prepare($sql);
	$sucesso = $comando->execute([ $_POST['codigo'] ]);

	if ($comando->rowCount() > 0) {
		// logando o usuario
		$_SESSION['avaliador'] = $_POST['codigo'];
		$_SESSION['nomeaval'] = $comando->fetch(PDO::FETCH_OBJ)->nome;
		header('Location: trabalhos.php');
	} else {
		$mensagem = "Usuário não existe";
	}
}

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
	    <h1>Avaliador</h1>

		<form action="index.php" method="post">
			<label>
				Código de Avaliador
				<input name="codigo" type="number">
			</label>
			<button>Entrar</button>
			<p><?= $mensagem ?></p>
		</form>

		<!--div class="row">
			<div class="col">
				<label for="crit1">Critério 1</label>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="range" class="custom-range" min="0" max="10" step="1" id="crit1" data-valor="c1">
				<p id="c1"></p>
			</div>
		</div-->
	</div>
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/barema.js"></script>
</body>
</html>
