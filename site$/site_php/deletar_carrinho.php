<?php

    require "conexao.php";

    $idProduto = $_GET["idProduto"];
    $idUsuario = $_GET["idUsuario"];

    $comando = "delete from Carrinho where idProduto=$idProduto and idUsuario=$idUsuario";
    mysqli_query($conexao, $comando);

    header('Location: '.'../html/carrinho.php')

?>