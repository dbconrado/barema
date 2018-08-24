<?php
function conectar() {
	$nomeBanco = "barema";
	$usuarioBanco = "root";
	$senhaBanco = "root";

	$stringConexao = "mysql:dbname={$nomeBanco};host=localhost";

	$conexao = new PDO($stringConexao, $usuarioBanco, $senhaBanco);
	return $conexao;
}