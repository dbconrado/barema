<?php

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
echo '<pre>';
var_dump($resultado);
echo '</pre>';
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
          </div>

          <div class="inner cover">
            <h2 class="cover-heading">Resultados </h2>
            <div class="row" align="center">
                <div class="col">

					<table class="table">
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
                    <button class="btn abrir_dlg"
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
            <h2 id="titulo">Titulo</h2>
            <table class="table text-info">
              <tbody id="avaliadores">
              </tbody>
            </table>
            <button class="btn fechar_dlg">Fechar</button>
          </dialog>

                </div>
              
            </div>
          </div>

        </div>

      </div>

    </div>

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
      });

      $('.fechar_dlg').click(function (e) {
        $('#dlg_avaliadores').removeAttr('open');
      });
    </script>

</body>
</html>
