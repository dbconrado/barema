<?php

session_start();

require_once 'conexao.php';

$mensagem = "";

if (isset($_SESSION['avaliador'])) {

	// está logado
	header('Location: trabalhos.php');

} else if (isset($_SESSION['admin'])) {

  // está logado como administrador
  header('Location: admin.php');

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

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SIC - IFMG</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="assets/css/trabalhos.css">
    
  </head>
  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SIC - Avaliação</h3>
            </div>
          </div>

          <div class="inner cover" align="center">
            <h2 class="cover-heading">Digite seu código de avaliador:</h2>
			      <br>
            <form action="index.php" method="post">
              <div class="input-group input-group-lg">
                <input name="codigo" type="number" class="form-control" placeholder="Digite aqui seu código..." autofocus>
                <span class="input-group-btn">
                  <button href="index.php" class="btn btn-default" type="submit">Entrar!</button>
                </span>
              </div>
              <br>
              <p><?= $mensagem ?></p>
            </form>

            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Painel do Administrador</h3>
                <p class="card-text">Escolha esta opção se você é administrador do sistema.</p>
                <a href="admin.php" class="btn btn-primary">Acessar Painel do Administrador</a>
              </div>
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