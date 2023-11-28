<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet"  href="../css/index.css" />
    <?php require "header.php"?>

    </head>

    <body>

            <div id="sla">
                <?php

                    $pesquisa = $_POST["pesquisa"];

                    require "../site_php/conexao.php";
                    $id = 0;

                    $comando = "select p.*, i.* from Produto p inner join Imagem i on p.idProduto = i.idProduto where p.nomeProd like '%$pesquisa%';";
                    $resultado = mysqli_query($conexao, $comando);
                    while($linha = mysqli_fetch_assoc($resultado)){
                        if($id != $linha["idProduto"]){
                            echo '<div class="produto"><a href="descricao_produto.php?id=' . $linha["idProduto"] . '"><img src="' . $linha["link"] . '" alt="imagem" class= "imgprod"></a>';
                            echo $linha["nomeProd"] . "<br>";
                            echo "R$ " . $linha["preco"] . "</div>";
                        }
                        $id = $linha["idProduto"];
                    }

                ?>
            </div>
        <?php require "footer.php"?>
    </body>
    
</html>