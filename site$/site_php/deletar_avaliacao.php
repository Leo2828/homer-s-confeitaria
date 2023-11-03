<?php

    require "conexao.php";

    $idAvaliacao = $_GET["idAvaliacao"];
    $idProduto = $_GET["idProduto"];

    $comando = "delete from Resposta where idAvaliacao = $idAvaliacao;";
    mysqli_query($conexao, $comando);
    $comando = "delete from Avaliacao where idAvaliacao = $idAvaliacao;";
    mysqli_query($conexao, $comando);
    header('Location: '."../html/descricao_produto.php?id=$idProduto")

?>