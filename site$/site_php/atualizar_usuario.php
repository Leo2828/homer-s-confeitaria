<?php

    require "conexao.php";

    $idUsuario = $_POST["idUsuario"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];
    $emailUsuario = $_POST["emailUsuario"];

    $comando = "update Usuario set nomeUsuario = '$nomeUsuario', senhaUsuario = '$senhaUsuario', emailUsuario = '$emailUsuario' where idUsuario = $idUsuario;";
    mysqli_query($conexao, $comando);
    session_start();
    $_SESSION["usuario"] = $nomeUsuario;
    header('Location: '."../html/pagina_usuario.php")

?>