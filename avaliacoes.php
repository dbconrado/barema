<?php

session_start();

if (!isset($_SESSION['admin'])) {

  // BNÃO está logado
  header('Location: index.php');
}

require_once 'conexao.php';

$conexao = conectar();
$sql = <<<EOF
SELECT (a.c1 + a.c2 + a.c3 + a.c4 + a.c5 + a.c6 + a.c7 + a.c8 + a.c9 + a.c10) / 10 as media,
t.id as tid, t.titulo, av.id as aid, av.nome FROM avaliacao_poster a
inner join trabalho t on (t.id = a.trabalho_id)
inner join avaliador av on (av.id = avaliador_id)
order by tid, av.nome 
EOF;

$comando = $conexao->query($sql);
$medias = $comando->fetchAll(PDO::FETCH_OBJ);

$resultado = [];

foreach ($medias as $media) {
  if (!$resultado[$media->tid]) {
    $obj = new stdClass;
    $obj->tid = $media->tid;
    $obj->titulo = $media->titulo;

    $obj->avaliacao = [];
    $aval = new stdClass;
    $aval->aid = $media->aid;
    $aval->nome = $media->nome;
    $aval->media = $media->media;
    $obj->avaliacao[] = $aval;

    $resultado[$media->tid] = $obj;
  } else {
    $aval = new stdClass;
    $aval->aid = $media->aid;
    $aval->nome = $media->nome;
    $aval->media = $media->media;
    $resultado[$media->tid]->avaliacao[] = $aval;
  }
}

foreach ($resultado as $linha) {
  $avaliadores = count($linha->avaliacao);
  $media = 0.0;
  foreach($linha->avaliacao as $aval) {
    $media += $aval->media;
  }
  $media /= $avaliadores;
  $linha->media = $media;
  $linha->avaliadores = $avaliadores;
}

/* calcular trabalhos não avaliados */
$sql = <<<EOF
SELECT t.id, t.titulo, a.trabalho_id
  FROM trabalho t
  LEFT JOIN avaliacao_poster a ON (t.id = a.trabalho_id)
  WHERE trabalho_id IS NULL
  ORDER BY t.titulo
EOF;

$naoAvaliados = $conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);

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

    <link rel="stylesheet" href="assets/css/trabalhos.css">
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SIC - Avaliação</h3>
              <nav>
                  <ul class="nav masthead-nav">
                    <li><a href="admin.php">Ir para Painel</a></li>
                  </ul>
                </nav>
            </div>
          </div><!--- masthead -->

          <div class="inner cover">
            <p><a href="#nao-avaliados">Ir para trabalhos sem avaliação</a></p>
            <h2 class="cover-heading">Resultados </h2>
            <div class="row" align="center">
              <div class="col">

                <?php if (count($resultado) == 0): ?>

                <p>Nenhum trabalho foi avaliado ainda.</p>

                <?php else: ?>

                <p><input id="ipesquisa" type="search" placeholder="Procure por título..." class="form-control" onkeyup="filtrar()"></p>

                <table id="resultados" class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titulo</th>
                      <th>Média</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($resultado as $linha) { ?>
                      <tr>
                        <td><?= $linha->tid ?></td>
                        <td><?= $linha->titulo ?></td>
                        <td><?= $linha->media ?>
                          <button class="btn btn-info abrir_dlg"
                            data-avaliadores='<?= json_encode($linha->avaliacao) ?>'
                            data-titulo="<?= $linha->titulo ?>"
                          >
                            <?= $linha->avaliadores ?> aval.
                          </button></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <dialog id="dlg_avaliadores">
                  <p id="titulo" style="font-weight: bold">Titulo</p>
                  <table class="table text-info">
                    <tbody id="avaliadores">
                    </tbody>
                  </table>
                  <button class="btn fechar_dlg">Fechar</button>
                </dialog>
                
                <?php endif; ?>
                
              </div><!-- col -->
            </div><!-- row -->
            <div class="row">
              <div class="col">

                <h2 id="nao-avaliados" class="cover-heading">
                  Trabalhos sem Avaliações
                </h2>
                
                <?php if (count($naoAvaliados) == 0): ?>

                <p>Todos os trabalhos possuem pelo menos uma avaliação!</p>

                <?php else: ?>

                <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Título</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php foreach ($naoAvaliados as $t): ?>
                        <tr>
                          <td><?= $t->id ?></td>
                          <td><?= $t->titulo ?></td>
                        </tr>
                      <?php endforeach; ?>

                      </tbody>
                </table>
                
                <?php endif; ?>
              </div><!-- col -->
            </div><!-- row -->

          </div><!-- inner -->

        </div><!-- cover-container -->

      </div><!-- site-wrapper-inner -->

    </div><!-- site-wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
      $('.abrir_dlg').click(function (e) {
        var avaliadores = $(this).data().avaliadores;
        
        $('#avaliadores').empty();
        avaliadores.forEach(function (e) {
          var tr = $('<tr>');
          tr.append( $("<td class=\"text-dark\">").text(e.nome) );
          tr.append( $("<td>").text(e.media) );
          $('#avaliadores').append(tr);
        });

        $('#dlg_avaliadores #titulo').text($(this).data().titulo);
        
        $('#dlg_avaliadores').attr('open', true);

        var popper = new Popper(e.target, $('#dlg_avaliadores')[0], {
          placement: 'auto'
        });

      });

      $('.fechar_dlg').click(function (e) {
        $('#dlg_avaliadores').removeAttr('open');
      });

			var accentMap = {
			  'á':'a', 'é':'e', 'í':'i','ó':'o','ú':'u',
			  'â':'a', 'ê':'e', 'ô':'o',
			  'ã':'a', 'õ':'o',
			  'ç':'c'
			};

			function accent_fold (s) {
  				if (!s) { return ''; }
  				var ret = '';
  				for (var i = 0; i < s.length; i++) {
    				ret += accentMap[s.charAt(i)] || s.charAt(i);
  				}
  				return ret;
			};

			function filtrar() {

				var ipesquisa = document.getElementById('ipesquisa');
				var filtro = accent_fold( ipesquisa.value.toLowerCase() );
				var trs = document.querySelectorAll('#resultados tr');

				for (var i = 0; i < trs.length; i++) {

					td = trs[i].getElementsByTagName('td')[1];
					if (td) {
						var valor = td.textContent || td.innerText;
						if (accent_fold( valor.toLowerCase() ).indexOf(filtro) > -1) {
							trs[i].style.display = '';
						} else {
							trs[i].style.display = 'none';
						} // fim if
					} // fim if

				} // fim for

			} // fim funcao
    </script>
  </body>
</html>
