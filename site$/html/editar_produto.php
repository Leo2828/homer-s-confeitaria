<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
    <link rel="stylesheet"  href="../css/editar_produto.css" />
    <?php
        require "../site_php/conexao.php";
        require "header.php";

        $idProduto = $_GET["idProduto"];

        $comando = "select * from Produto where idProduto=$idProduto";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $nomeProd = $linha["nomeProd"];
            $descricaoProd = $linha["descricaoProd"];
            $preco = $linha["preco"];
        }
    ?>
</head>
<body>
    <h1>Cadastro de produto</h1>
    <form action="../site_php/atualizar_produto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idProduto" value="<?=$idProduto?>">
        Nome do produto: <input type="text" name="nomeProd" value="<?=$nomeProd?>"><br><br>
        Descrição: <input type="text" name="descricaoProd" value="<?=$descricaoProd?>"><br><br>
        Preço: <input type="text" name="preco" value="<?=$preco?>"><br><br>
        Imagem: <input type="file" name="arquivo[]" multiple="multiple"><br><br>
        <button type="submit">Atualizar</button>
    </form>
    <h1>Imagens do produto</h1>
    <?php

        $comando = "select * from Imagem where idProduto=$idProduto";
        $resultado = mysqli_query($conexao, $comando);  
        while($linha = mysqli_fetch_assoc($resultado)){   
            echo "<a><img src='" . $linha["link"] . "' width='200' height='200'></a>";           
            echo "<a href='../site_php/deletar_imagem.php?idImg=" . $linha["idImg"] . "'>remove</a><br><br>";
        }

    ?>
    <?php require "footer.php"?>
</body>
</html>
