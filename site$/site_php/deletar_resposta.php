<?php

    require "conexao.php";

    $idResposta = $_GET["idResposta"];
    $idProduto = $_GET["idProduto"];

    $comando = "delete from Resposta where idResposta = $idResposta;";
    mysqli_query($conexao, $comando);

    header('Location: '."../html/descricao_produto.php?id=$idProduto")

?>