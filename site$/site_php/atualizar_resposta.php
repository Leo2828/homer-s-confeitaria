<?php

    require "conexao.php";

    $resposta = $_POST["resposta"];
    $idResposta = $_POST["idResposta"];
    $idProduto = $_POST["idProduto"];

    $comando = "update Resposta set resposta='$resposta' where idResposta=$idResposta;";
    mysqli_query($conexao, $comando);
    header('location: ' . "../html/descricao_produto.php?id=$idProduto");

?>