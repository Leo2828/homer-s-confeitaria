<?php

    require "conexao.php";

    $nome = $_POST["nomeProd"];
    $descricao = $_POST["descricaoProd"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];
    $idUsuario = $_POST["idUsuario"];

    $comando = "insert into Produto(nomeProd, descricaoProd, preco, estoque, idUsuario) values('$nome', '$descricao', '$preco', '$estoque', '$idUsuario');";
    mysqli_query($conexao, $comando);
    $comando = "select idProduto from Produto";
    $resultado = mysqli_query($conexao, $comando);
    while($linha = mysqli_fetch_assoc($resultado)){
        $id = $linha["idProduto"];
    }
    for($i=0;$i<count($_FILES['arquivo']['name']);$i++){ 
        $nome = $_FILES['arquivo']['name'][$i]; 
        $destino = '../img/' . $_FILES['arquivo']['name'][$i];
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'][$i];
        move_uploaded_file($arquivo_tmp, $destino);
        $comando = "insert into Imagem(nomeImg, link, idProduto) values('$nome', '$destino', '$id');";
        mysqli_query($conexao, $comando);
    }
    header('Location: '."../html/index.php");

?>