<?php

    require "conexao.php";

    $idProduto = $_GET["idProduto"];
    $idUsuario = $_GET["idUsuario"];

    $comando = "select * from Carrinho where idProduto=$idProduto and idUsuario=$idUsuario";
    $resultado = mysqli_query($conexao, $comando);
    if(mysqli_num_rows($resultado)==0){
        $comando = "insert into Carrinho(idProduto, idUsuario) values('$idProduto', '$idUsuario')";
        mysqli_query($conexao, $comando);
    }    

    header('Location: '.'../html/descricao_produto.php?id=' . $idProduto . '')

?>