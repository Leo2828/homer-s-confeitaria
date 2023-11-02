<?php

    require "conexao.php";

    $idProduto = $_POST["idProduto"];
    $nome = $_POST["nomeProd"];
    $descricao = $_POST["descricaoProd"];
    $preco = $_POST["preco"];
    
    $comando = "update Produto set nomeProd='$nome', descricaoProd='$descricao', preco='$preco' where idProduto=$idProduto;";
    mysqli_query($conexao, $comando);

    for($i=0;$i<count($_FILES['arquivo']['name']);$i++){ 
        $nome = $_FILES['arquivo']['name'][$i]; 
        $destino = '../img/' . $_FILES['arquivo']['name'][$i];
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'][$i];
        move_uploaded_file($arquivo_tmp, $destino);
        $comando = "insert into Imagem(nomeImg, link, idProduto) values('$nome', '$destino', '$idProduto');";
        mysqli_query($conexao, $comando);
    }

    header('Location: '."../html/pagina_usuario.php");

?>