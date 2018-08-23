<?php
    session_start();
    require_once 'conexao.php';

    if (!isset($_SESSION['avaliador'])) {

        // BNÃO está logado
        header('Location: index.php');
    }

    $criterio = (int) $_GET['c'];

    $categoria = $_GET['op'];
    $resposta = $_GET['resp'];
    $codTrabalho = $_GET['cod'];

    $conexao = conectar();

    if($categoria == "O") $sql = "SELECT * FROM avaliacao_oral WHERE avaliador_id = ". $_SESSION['avaliador'] ." AND trabalho_id = ". $codTrabalho .";";
    else $sql = "SELECT * FROM avaliacao_poster WHERE avaliador_id = ". $_SESSION['avaliador'] ." AND trabalho_id = ". $codTrabalho .";";

    $comando = $conexao->query($sql);

    switch($categoria)
    {
        case "O":
            if($comando->rowCount() == 0)
                $sql = "INSERT INTO avaliacao_oral (avaliador_id, trabalho_id, c". $criterio .") VALUES ( ".$_SESSION['avaliador'].", ".$codTrabalho.", ".$resposta.");";
            else
                $sql = "UPDATE avaliacao_oral SET c". $criterio ." = ".$resposta." WHERE avaliador_id = ". $_SESSION['avaliador'] ." AND trabalho_id = ". $codTrabalho .";";
            break;
        case "P":
            if($comando->rowCount() == 0)
                $sql = "INSERT INTO avaliacao_poster (avaliador_id, trabalho_id, c". $criterio .") VALUES ( ".$_SESSION['avaliador'].", ".$codTrabalho.", ".$resposta.");";
            else
                $sql = "UPDATE avaliacao_poster SET c". $criterio ." = ".$resposta." WHERE avaliador_id = ". $_SESSION['avaliador'] ." AND trabalho_id = ". $codTrabalho .";";
            break;
    }
    
    $comando = $conexao->prepare($sql);
    $resultado = $comando->execute();

    $criterio = $criterio+1;
    if($criterio == 11)
    {
        if($categoria == "P") $sql = "UPDATE avaliacao_poster SET finalizou_avaliacao = 'V';";
        else $sql = "UPDATE avaliacao_oral SET finalizou_avaliacao = 'V';";
        $comando = $conexao->prepare($sql);
        $resultado = $comando->execute();
        header('Location: thanks.php');
    }
    else
    {
        $url = "avaliar.php?criterio=". $criterio ."&&cod=". $codTrabalho ."";
        header('Location: '.$url);
    }