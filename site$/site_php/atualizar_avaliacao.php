<?php

    require "conexao.php";

    $comentario = $_POST["comentario"];
    $idProduto = $_POST["idProduto"];
    $idAvaliacao = $_POST["idAvaliacao"];

    $comando = "update Avaliacao set comentario='$comentario' where idAvaliacao=$idAvaliacao;";
    mysqli_query($conexao, $comando);
    header('location: ' . "../html/descricao_produto.php?id=$idProduto");
    
?>