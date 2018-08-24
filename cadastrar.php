<?php

session_start();

require_once 'conexao.php';

$mensagem = "";

if (isset($_SESSION['avaliador'])) {

	// está logado
	header('Location: trabalhos.php');

} else if (isset($_POST['nomeAvaliador'])) {
	
	$conexao = conectar();

    $nomeAvaliador = $_POST['nomeAvaliador'];
	$sql = "INSERT INTO avaliador (nome) VALUES ('$nomeAvaliador')";
    
    $sucesso = $conexao->query($sql);

	if ($sucesso) {
		// logando o usuario
        $sql = "SELECT id FROM avaliador WHERE nome = '$nomeAvaliador'";
        $comando = $conexao->prepare($sql);
        $sucesso = $comando->execute([ $nomeAvaliador] );
        
        $_SESSION['avaliador'] = $comando->fetch(PDO::FETCH_OBJ)->id;
        $_SESSION['nomeaval'] = $nomeAvaliador;
        
        $mensagem = "Seu código é " . $_SESSION['avaliador'] . ", anote e não perca! <a href=trabalhos.php>Clique aqui para avaliar um trabalho!</a>";
	} else {
		$mensagem = "Usuário já existe!";
	}
}

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VII SIC - Sabará</title>

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
              <h3 class="masthead-brand">VII SIC - Avaliação</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="trabalhos.php">Trabalhos</a></li>
                  
                  
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover" align="center">
            <h2 class="cover-heading">Digite seu nome completo:</h2>
			<br>
            <form action="cadastrar.php" method="post">
				<div class="input-group input-group-lg">
                    <input name="nomeAvaliador" type="text" class="form-control" placeholder="Digite aqui seu nome completo...">
					<span class="input-group-btn">
						<button href="index.php" class="btn btn-default" type="submit">Me cadastre!</button>
					</span>
				</div>
				<br>
					<p><?= $mensagem ?></p>
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