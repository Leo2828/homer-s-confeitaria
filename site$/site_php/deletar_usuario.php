<?php

    require "conexao.php";

    $idUsuario = $_GET["idUsuario"];

    $comando = "select * from Produto where idUsuario=$idUsuario;";
    $resultado = mysqli_query($conexao, $comando);
    if(mysqli_num_rows($resultado)!=0){
        while($linha = mysqli_fetch_assoc($resultado)){
            $idProduto = $linha["idProduto"];
        }
        require "deletar_produto.php";
    }

    $comando = "delete from Carrinho where idUsuario=$idUsuario";
    mysqli_query($conexao, $comando);
    $comando = "delete from Avaliacao where idUsuario=$idUsuario;"; 
    mysqli_query($conexao, $comando);
    $comando = "delete from Usuario where idUsuario = $idUsuario;";
    mysqli_query($conexao, $comando);
    session_start();
    unset($_SESSION["usuario"]);
    session_destroy();
    header('Location: '."../html/index.php")

?>