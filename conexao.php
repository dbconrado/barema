<?php
function conectar() {
	$nomeBanco = "barema";
	$usuarioBanco = "barema";
	$senhaBanco = "amerab";

	$stringConexao = "mysql:dbname={$nomeBanco};host=localhost";

	$conexao = new PDO($stringConexao, $usuarioBanco, $senhaBanco);
	return $conexao;
}