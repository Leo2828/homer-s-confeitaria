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

    <div id="conteudo-produto">

        <?php
            
            $idProduto = $_GET["id"];
            require "../site_php/conexao.php";

            //Informações do produto
            $comando = "select * from Produto where idProduto=$idProduto";
            $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    $comando2 = "select link from Imagem where idProduto=$idProduto";
                    $resultado2 = mysqli_query($conexao, $comando2);
                    echo "<div class='slideshow-container'>";
                    while($linha2 = mysqli_fetch_assoc($resultado2)){
                        echo '<div class="produto fade"><img class="imgprod" src="'.$linha2['link'].'" ></div>';
                    }
                    echo "<a class='prev' onclick='plusSlides(-1)'>❮</a>
                          <a class='next' onclick='plusSlides(1)'>❯</a>";
                    echo "</div>";
                    
                    echo "<div class='info-produto'><div class='nomedesc'><p class='fonte-produto'><strong>" . $linha["nomeProd"] . "<strong></p>";
                    echo "<p class='fonte-produto'>" . $linha["descricaoProd"] . "</p></div>";
                    echo "<div class='preco'><p class='fonte-produto'>R$" . $linha["preco"] . "</p>";
                    echo "<input type='submit' value='COMPRAR' class='btn' />";
                    echo "</div></div>";
                }

            //Verificação se algum usuário esta logado
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
        <?php if(isset($_SESSION["usuario"])){ ?>
        <form action="../site_php/adicionar_avaliacao.php" method="POST">
            <input type="hidden" name="idProduto" value="<?=$idProduto?>">
            <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
            Comentar<input type="text" name="comentario">
            <button type="submit">Comentar</button><br><br>
        </form>
        <?php } ?>
        <div>
            <?php

                //Informações de avaliações relacionadas ao produto
                $comando = "select a.*, u.* from Avaliacao a inner join Usuario u on a.idUsuario = u.idUsuario;";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){

                    if($linha["idProduto"] == $idProduto){
                        echo "<p>" . $linha["nomeUsuario"] . " Comentou: </p>";
                        echo "<p>" . $linha["comentario"] . "</p>";
                        $idAvaliacao = $linha["idAvaliacao"];
                        
                        //Verificação se o usuário logado é quem avaliou
                        if(isset($_SESSION["usuario"])){
                            if($linha["idUsuario"] == $idUsuario){
                                echo "<a href='../site_php/deletar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Apagar </a>";
                                echo "<a href='editar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Editar</a><br><br>";
                            }  
                        }

                        //Informações de respostas relacionadas à avaliação
                        $comando2 = "select * from Resposta where idAvaliacao = $idAvaliacao";
                        $resultado2 = mysqli_query($conexao, $comando2);
                        while($linha2 = mysqli_fetch_assoc($resultado2)){
                            echo "<p>Resposta:<br>" . $linha2["resposta"] . "</p>";

                            //Verificação se o usuário logado é quem respondeu
                            if($linha2["idUsuario"] == $idUsuario){
                                echo "<a href='../site_php/deletar_resposta.php?idResposta=" . $linha2["idResposta"] . "&idProduto=$idProduto'>Apagar </a>";
                                echo "<a href='editar_resposta.php?idResposta=" . $linha2["idResposta"] . "&idProduto=$idProduto'>Editar</a><br><br>";
                            }                           
                        }

                        //Verificação se o usuário logado pode responder
                        if(isset($_SESSION["usuario"])){
                            $comandoR = "select * from Produto where idProduto = $idProduto and idUsuario in (select idUsuario from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "');";
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
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("produto");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }
    </script>
</body>
</html>