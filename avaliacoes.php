<?php

require_once 'conexao.php';

$conexao = conectar();
$sql = <<<EOF
select s.tid, s.titulo, AVG(s.media) as media FROM (
SELECT (a.c1 + a.c2 + a.c3 + a.c4 + a.c5 + a.c6 + a.c7 + a.c8 + a.c9 + a.c10) / 10 as media, t.id as tid, t.titulo, av.id as aid, av.nome FROM avaliacao_poster a
inner join trabalho t on (t.id = a.trabalho_id)
inner join avaliador av on (av.id = avaliador_id)
order by t.titulo, av.nome) s group by s.tid, s.titulo order by media desc 
EOF;

$comando = $conexao->query($sql);
$resultado = $comando->fetchAll(PDO::FETCH_OBJ);

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
									<td><?= $linha->media ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

                </div>
              
            </div>
          </div>

        </div>

      </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
