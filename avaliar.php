<?php

session_start();

require_once 'conexao.php';

if (!isset($_SESSION['avaliador'])) {

	// BNÃO está logado
	header('Location: index.php');
}

$conexao = conectar();
$sql = "SELECT categoria FROM trabalho WHERE id = ". $_GET['cod'] .";";
$comando = $conexao->query($sql);
$resultado = $comando->fetchAll(PDO::FETCH_OBJ);

if($resultado[0]->categoria == "P") $sql = "SELECT finalizou_avaliacao FROM avaliacao_poster WHERE trabalho_id = ". $_GET['cod'] ." AND avaliador_id = ". $_SESSION['avaliador'] .";";
else $sql = "SELECT finalizou_avaliacao FROM avaliacao_oral WHERE trabalho_id = ". $_GET['cod'] ." AND avaliador_id = ". $_SESSION['avaliador'] .";";

$comando = $conexao->query($sql);
$resultado = $comando->fetchAll(PDO::FETCH_OBJ);

if($resultado && $resultado[0]->finalizou_avaliacao == 'V') header('Location: jaAvaliou.php');
else
{
    $criterio = $_GET['criterio'];
    
    $sql = "SELECT categoria FROM trabalho WHERE id = '". $_GET['cod'] ."'";

    $comando = $conexao->query($sql);
    $resultado = $comando->fetchAll(PDO::FETCH_OBJ);

    switch($criterio)
    {
        case 1:
            $questao = "Capacidade do <strong>Título</strong> expressar o trabalho como um todo";
            break;
        case 2:
            $questao = "A <strong>introdução</strong> como contexto da pesquisa";
            break;
        case 3:
            $questao = "Clareza nos <strong>objetivos</strong> apresentados";
            break;
        case 4:
            $questao = "Coerência entre <strong>metodologia</strong> e os objetivos propostos";        
            break;
        case 5:
            $questao = "Volume dos <strong>resultados</strong> e coerência das <strong>discussões</strong> apresentadas";
            break;
        case 6:
            $questao = "Concisão das <strong>conclusões</strong> alcançadas";
            break;
        case 7:
            $questao = "Qualidade e variedade dos meios de comunicação não textuais (gráficos, tabelas, figuras, fluxogramas etc.)";
            break;
        case 8:
            $questao = "Organização do conteúdo no pôster (autoexplicativo?)";
            break;
        case 9:
            $questao = "Qualidade geral da apresentação do pôster";
            break;
        case 10:
            $questao = "Mérito da pesquisa apresentada";
            break;
    }
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <h2 class="cover-heading"><?= $questao ?> </h2>

            <div class="row" align="center">
            <form action="/avaliar" method="POST">
                <div class="col">
                <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=1">1</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=2">2</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=3">3</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=4">4</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=5">5</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=6">6</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=7">7</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=8">8</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=9">9</a></li>
                    <li><a href="/barema/salvaResposta.php?op=<?=$resultado[0]->categoria?>&&c=<?=$_GET['criterio']?>&&cod=<?=$_GET['cod']?>&&resp=10">10</a></li>
                </ul>
                </nav>
                </div>
              
                <br>
                <br>

              <button type="submit" class="btn btn-default">Próximo</button>
              </form>
            </div>
          </div>

        </div>

      </div>

    </div>
</body>
</html>