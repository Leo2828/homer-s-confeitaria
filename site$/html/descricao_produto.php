<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição produto</title>
    <link rel="stylesheet"  href="../css/descricao_produto.css" />
    <?php require "header.php"?>
</head>
<body>
    <div id="sla">

        <?php
            
            $idProduto = $_GET["id"];
            require "../site_php/conexao.php";

            $comando = "select * from Produto where idProduto=$idProduto";
            $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    $comando2 = "select link from Imagem where idProduto=$idProduto";
                    $resultado2 = mysqli_query($conexao, $comando2);
                    echo "<div>";
                    while($linha2 = mysqli_fetch_assoc($resultado2)){
                        echo '<div class="produto"><img class="imgprod" src="'.$linha2['link'].'" alt="imagem"></div>';
                    }
                    echo $linha["nomeProd"] . "</div>";
                }
            if(isset($_SESSION["usuario"])){
                $comando = "select * from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "';";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    $idUsuario = $linha["idUsuario"];
                } 
            }

        ?>

    </div>
    <div>
        <h1>Avaliações</h1>
        <form action="../site_php/adicionar_avaliacao.php" method="POST">
            <input type="hidden" name="idProduto" value="<?=$idProduto?>">
            <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
            Comentar<input type="text" name="comentario">
            <button type="submit">Comentar</button><br><br>
        </form>
        <div>
            <?php

                $comando = "select a.*, u.* from Avaliacao a inner join Usuario u on a.idUsuario = u.idUsuario;";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){

                    if($linha["idProduto"] == $idProduto){
                        echo "<p>" . $linha["nomeUsuario"] . " Comentou: </p>";
                        echo "<p>" . $linha["comentario"] . "</p><br>";
                        $idAvaliacao = $linha["idAvaliacao"];
                        if($linha["idUsuario"] == $idUsuario){
                            echo "<a href='../site_php/deletar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Apagar </a>";
                            echo "<a href='#'>Editar</a><br><br>";
                        }   

                        $comando2 = "select * from Resposta where idAvaliacao = $idAvaliacao";
                        $resultado2 = mysqli_query($conexao, $comando2);
                        while($linha2 = mysqli_fetch_assoc($resultado2)){
                            echo "<p>Resposta:" . $linha2["resposta"] . "</p>";
                            if($linha2["idUsuario"] == $idUsuario){
                                echo "<a href='../site_php/deletar_resposta.php?idResposta=" . $linha2["idResposta"] . "&idProduto=$idProduto'>Apagar </a>";
                                echo "<a href='#'>Editar</a><br><br>";
                            }                           
                        }

                        if(isset($_SESSION["usuario"])){
                            $comandoR = "select * from produto where idProduto = $idProduto and idUsuario in (select idUsuario from usuario where nomeUsuario = '" . $_SESSION["usuario"] . "');";
                            $resultadoR = mysqli_query($conexao, $comandoR);

                            if(mysqli_num_rows($resultadoR)!=0){ ?>
                                <form action="../site_php/adicionar_resposta.php" method="POST">
                                <input type="hidden" name="idProduto" value="<?=$idProduto?>">
                                <input type="hidden" name="idAvaliacao" value="<?=$idAvaliacao?>">
                                <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
                                Responder<input type="text" name="resposta">
                                <button type="submit">Responder</button>
                                </form><br>
                            <?php }
                        }
                    }
                }
            ?>
        </div>
    </div>
    <?php require "footer.php"?> 

</body>
</html>