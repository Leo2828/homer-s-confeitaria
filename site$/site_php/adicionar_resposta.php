<?php

    require "conexao.php";

    $resposta = $_POST["resposta"];
    $idAvaliacao = $_POST["idAvaliacao"];
    $idProduto = $_POST["idProduto"];
    $idUsuario = $_POST["idUsuario"];

    $comando = "insert into Resposta(resposta, idAvaliacao, idUsuario) values('$resposta', '$idAvaliacao', '$idUsuario');";
    mysqli_query($conexao, $comando);
    header('location: ' . "../html/descricao_produto.php?id=$idProduto");

?>