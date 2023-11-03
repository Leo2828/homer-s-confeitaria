<?php

    require "conexao.php";

    $comentario = $_POST["comentario"];
    $idProduto = $_POST["idProduto"];
    $idUsuario = $_POST["idUsuario"];

    $comando = "insert into Avaliacao(comentario, idUsuario, idProduto) values('$comentario', '$idUsuario', '$idProduto');";
    mysqli_query($conexao, $comando);
    header('location: ' . "../html/descricao_produto.php?id=$idProduto");
    
?>