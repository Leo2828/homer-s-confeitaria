<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet"  href="../css/carrinho.css"/>
    <?php require "header.php"?>

</head>
<body>
    <?php
    
        $comando = "select idUsuario from Usuario where nomeUsuario='" . $_SESSION["usuario"] . "';";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $idUsuario = $linha["idUsuario"];
        }

        $comando = "select idProduto from Carrinho where idUsuario='" . $idUsuario . "';";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $idProduto = $linha["idProduto"];
        }

        echo '<div class = "produtos">';

        if(isset($idProduto)){
            $id = 0;
            $comando = "select p.*, i.*, c.* from Produto p inner join Imagem i on p.idProduto = i.idProduto inner join Carrinho c on p.idProduto = c.idProduto where c.idUsuario=$idUsuario";
            $resultado = mysqli_query($conexao, $comando);
            while($linha = mysqli_fetch_assoc($resultado)){
                if($id != $linha["idProduto"]){
                    echo '<div class = "produto"><a href="descricao_produto.php?id=' . $linha["idProduto"] . '"><div class= "img"><img src="' . $linha["link"] . '" alt="imagem" class= "imgprod" height="50px" width="50px"></div></a>';
                    echo '<div class="nomed">'.$linha["nomeProd"].'<br>';
                    echo  $linha["descricaoProd"].'</div>';
                    echo '<div class="preco">'.$linha["preco"].'</div>';
                    echo "<a href='../site_php/deletar_carrinho.php?idProduto=" . $linha["idProduto"] . "&idUsuario=" . $linha["idUsuario"] . "'>Deletar</a><br></div>";
                  
                }
                $id = $linha["idProduto"];
            }
            echo '<input type="submit" value="Finalizar compra!" class="btn" />';
            echo '</div>';
            
        }else{
            echo "<h1>Nenhum produto no carrinho </h1>";
        }

    ?>
    <?php require "footer.php"?>
</body>
</html>