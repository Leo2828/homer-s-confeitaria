<?php

    require "conexao.php";

    $idProduto = $_GET["idProduto"];
    
    $comando = "select * from Produto where idProduto=$idProduto;"; 
    $resposta = mysqli_query($conexao, $comando);
    while($linha = mysqli_fetch_assoc($resposta)){
        $idUsuario = $linha["idUsuario"];
    }

    $comando = "delete from Resposta where idUsuario=$idUsuario;"; 
    mysqli_query($conexao, $comando);
    $comando = "delete from Avaliacao where idProduto=$idProduto;"; 
    mysqli_query($conexao, $comando);
    $comando = "delete from Imagem where idProduto=$idProduto;"; 
    mysqli_query($conexao, $comando);
    $comando = "delete from Produto where idProduto=$idProduto;"; 
    mysqli_query($conexao, $comando);

    header('Location: '."../html/index.php")

?>