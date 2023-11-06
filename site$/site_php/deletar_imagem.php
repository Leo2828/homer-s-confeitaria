<?php

    require "conexao.php";

    $id = $_GET["idImg"];
    $idProduto = $_GET["idProduto"];
    
    $comando = "delete from Imagem where idImg=$id;";
    mysqli_query($conexao, $comando);
    header('Location: '."../html/editar_produto.php?idProduto=$idProduto");

?>
