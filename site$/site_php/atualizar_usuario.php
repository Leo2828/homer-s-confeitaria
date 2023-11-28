<?php

    require "conexao.php";

    $idUsuario = $_POST["idUsuario"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];
    $emailUsuario = $_POST["emailUsuario"];

    $comando = "select nomeUsuario from Usuario where nomeUsuario = '$nomeUsuario';";
    $resultado = mysqli_query($conexao, $comando);

    if(mysqli_num_rows($resultado)==0){
        $comando = "update Usuario set nomeUsuario = '$nomeUsuario', senhaUsuario = '$senhaUsuario', emailUsuario = '$emailUsuario' where idUsuario = $idUsuario;";
        mysqli_query($conexao, $comando);
        session_start();
        $_SESSION["usuario"] = $nomeUsuario;
        header('Location: '."../html/pagina_usuario.php");
    }else{
        $msg = "Nome já existente";
        header('Location: '."../html/editar_usuario.php?msg=$msg&&idUsuario=$idUsuario");
    }  

?>