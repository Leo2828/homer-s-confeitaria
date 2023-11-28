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
            $estoque = $linha["estoque"];
        }
    ?>
</head>
<body>
    
    <div class="page">

    <form action="../site_php/atualizar_produto.php" method="post" enctype="multipart/form-data" class="formLogin">

        <h1>Cadastro de produto</h1>
        <input type="hidden" name="idProduto" value="<?=$idProduto?>">
        <label for="nome">Nome do produto</label>
        <input type="text" name="nomeProd" value="<?=$nomeProd?>"><br><br>
        <label for="Descri">Descrição</label>
        <input type="text" name="descricaoProd" value="<?=$descricaoProd?>"><br><br>
        <label for="preco">Preço</label>
        <input type="text" name="preco" value="<?=$preco?>"><br><br>
        <label for="estoque">Estoque</label>
        <input type="text" name="estoque" value="<?=$estoque?>"><br><br>
        <label for="Img">Imagem</label>
        <input type="file" name="arquivo[]" multiple="multiple"><br><br>
        
        <input type="submit" value="Atualizar" class="btn" />

    </form>
    </div>
    
    <h1>Imagens do produto</h1>
    <?php

        $comando = "select * from Imagem where idProduto=$idProduto";
        $resultado = mysqli_query($conexao, $comando);  
        while($linha = mysqli_fetch_assoc($resultado)){   
            echo "<a><img src='" . $linha["link"] . "' width='200' height='200'></a>";           
            echo "<a href='../site_php/deletar_imagem.php?idImg=" . $linha["idImg"] . "&idProduto=$idProduto'>remover</a><br><br>";
        }

    ?>
    
    <?php require "footer.php"?>
</body>
</html>
