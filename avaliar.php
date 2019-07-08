<?php

    session_start();

    require_once 'conexao.php';

    if (!isset($_SESSION['avaliador'])) {

        // NÃO está logado
        header('Location: index.php');
    }

    $conexao = conectar();
    $sql = "SELECT categoria FROM trabalho WHERE id = ". $_GET['cod'] .";";
    $comando = $conexao->query($sql);
    $resultado = $comando->fetchAll(PDO::FETCH_OBJ);

    if($resultado[0]->categoria == "P")
        $sql = "SELECT finalizou_avaliacao FROM avaliacao_poster WHERE trabalho_id = ". $_GET['cod'] ." AND avaliador_id = ". $_SESSION['avaliador'] .";";
    else
        $sql = "SELECT finalizou_avaliacao FROM avaliacao_oral WHERE trabalho_id = ". $_GET['cod'] ." AND avaliador_id = ". $_SESSION['avaliador'] .";";

    $comando = $conexao->query($sql);
    $resultado = $comando->fetchAll(PDO::FETCH_OBJ);

    function amIActive($opcaoTestada)
    {
        if(isset($_SESSION['respostas']) && isset($_SESSION['codProjeto']) && $_GET["cod"] == $_SESSION['codProjeto'])
        {
            $respostaDada =  $_SESSION['respostas'][(int) $_GET['criterio']];
            if($respostaDada == $opcaoTestada)
            {
                return true;
            }
        }
    }

    function leRespostaDada() {
        if (isset($_SESSION['respostas'])) {
            return $_SESSION['respostas'][(int) $_GET['criterio']];
        }
        return "";
    }

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
                    <li>Avaliador: <?= $_SESSION['nomeaval'] ?></li>
                    <li>Seu código: <?= $_SESSION['avaliador'] ?></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h2 class="cover-heading"><?= $questao ?> </h2>
            <p>Critério <?= $_GET['criterio'] ?> de 10</p>
            <div class="row" align="center">
                <div class="col">
                <form id="avalie" action="salvaResposta.php" method="GET">
                <input type="hidden" name="op" value="<?=$resultado[0]->categoria?>">
                <input type="hidden" name="c" value="<?=$_GET['criterio']?>">
                <input type="hidden" name="cod" value="<?=$_GET['cod']?>">
                <input id="resp" type="hidden" name="resp" value="<?= leRespostaDada()?>">
                <input type="hidden" name="salt" value="<?= time() ?>">
                <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li id="op1" class=<?php echo amIActive(1) ? 'active' : '' ?>><a href="#" data-resp="1"">1</a></li>
                    <li id="op2" class=<?php echo amIActive(2) ? 'active' : '' ?>><a href="#" data-resp="2"">2</a></li>
                    <li id="op3" class=<?php echo amIActive(3) ? 'active' : '' ?>><a href="#" data-resp="3"">3</a></li>
                    <li id="op4" class=<?php echo amIActive(4) ? 'active' : '' ?>><a href="#" data-resp="4"">4</a></li>
                    <li id="op5" class=<?php echo amIActive(5) ? 'active' : '' ?>><a href="#" data-resp="5"">5</a></li>
                    <li id="op6" class=<?php echo amIActive(6) ? 'active' : '' ?>><a href="#" data-resp="6"">6</a></li>
                    <li id="op7" class=<?php echo amIActive(7) ? 'active' : '' ?>><a href="#" data-resp="7"">7</a></li>
                    <li id="op8" class=<?php echo amIActive(8) ? 'active' : '' ?>><a href="#" data-resp="8"">8</a></li>
                    <li id="op9" class=<?php echo amIActive(9) ? 'active' : '' ?>><a href="#" data-resp="9"">9</a></li>
                    <li id="op10" class=<?php echo amIActive(10) ? 'active' : '' ?>><a href="#" data-resp="10"">10</a></li>
                </ul>
                </nav>
                </form>
                </div>
              
                <br>
                <br>

                    <a href="avaliar.php?criterio=<?=$_GET['criterio'] - 1 === 0 ? 1 : $_GET['criterio'] - 1 ?>&&cod=<?=$_GET['cod']?>" id="prev" class="btn btn-default">Anterior</a>
                    <button form="avalie" type="submit" class="btn btn-default">Próximo</button>
            </div>
          </div>

        </div>

      </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        function registrar(e) {
            e.preventDefault();
            document.querySelector('#resp').value = e.target.dataset.resp;
            var ops = document.querySelectorAll('li[id^=op]');
            for (var i = 0; i < ops.length; i++)
                ops[i].classList.remove('active');
            e.target.parentElement.classList.add('active');
        }

        var as = document.querySelectorAll('li[id^=op] a');
        for (var i = 0; i < as.length; i++)
            as[i].addEventListener('click', registrar);
    </script>
</body>
</html>