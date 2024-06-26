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

            //Verificação se algum usuário esta logado
            if(isset($_SESSION["usuario"])){
                $comando = "select * from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "';";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    $idUsuario = $linha["idUsuario"];
                } 
            }

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
                    echo "<p class='fonte-produto2'>" . $linha["descricaoProd"] . "</p></div>";
                    echo "<div class='preco'><p class='fonte-produto2'>Quantidade disponivel: " . $linha["estoque"] . "</p><br>";
                    echo "<p class='fonte-produto'>R$" . $linha["preco"] . "</p>";
                    if(isset($_SESSION["usuario"])){
                        echo "<button type='submit' class='btn'><a href='../site_php/adicionar_carrinho.php?idProduto=" . $idProduto . "&idUsuario=" . $idUsuario . "'>Comprar</a></button>";
                    }else{
                        echo "<button type='submit' class='btn'><a href='login_usuario'>Comprar</a></button>";
                    }
                    echo "</div></div>";
                }

        ?>

    </div>

    <div>
        <div class=titulo_avaliacao>
            <div>
                <h1>Avaliações</h1>
            </div>
        </div>
        <div class="comentar">
            <?php
                $aux = 0;
                //Informações de avaliações relacionadas ao produto
                $comando = "select a.*, u.* from Avaliacao a inner join Usuario u on a.idUsuario = u.idUsuario;";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    if($linha["idProduto"] == $idProduto){
                        echo "<div class='comentario'>";
                        echo "Usuário <span>" . $linha["nomeUsuario"] . "</span> Comentou: ";
                        echo "<p>" . $linha["comentario"] . "</p>";
                        $idAvaliacao = $linha["idAvaliacao"];
                        if(isset($_SESSION["usuario"])){
                            if($_SESSION["usuario"]=="admin"){
                                $aux = 1;
                                echo "<a href='../site_php/deletar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Apagar </a>"; 
                            }
                        }   
                        //Verificação se o usuário logado é quem avaliou
                        if(isset($_SESSION["usuario"])){
                            if($linha["idUsuario"] == $idUsuario and $aux != 1){
                                echo "<a href='../site_php/deletar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Apagar </a>";
                                echo "<a href='editar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Editar</a><br><br>";
                            }  
                        }
                        echo "</div>";

                        //Informações de respostas relacionadas à avaliação
                        $comando2 = "select * from Resposta where idAvaliacao = $idAvaliacao";
                        $resultado2 = mysqli_query($conexao, $comando2);
                        while($linha2 = mysqli_fetch_assoc($resultado2)){
                            echo "<p>Resposta do chef :<br>" . $linha2["resposta"] . "</p>";
                            if(isset($_SESSION["usuario"])){
                                if($_SESSION["usuario"]=="admin"){
                                    echo "<a href='../site_php/deletar_avaliacao.php?idAvaliacao=$idAvaliacao&idProduto=$idProduto'>Apagar </a>"; 
                                }
                            }  
                            //Verificação se o usuário logado é quem respondeu
                            if($linha2["idUsuario"] == $idUsuario and $aux != 1){
                                echo "<a href='../site_php/deletar_resposta.php?idResposta=" . $linha2["idResposta"] . "&idProduto=$idProduto'>Apagar </a>";
                                echo "<a href='editar_resposta.php?idResposta=" . $linha2["idResposta"] . "&idProduto=$idProduto'>Editar</a><br><br>";
                            }                           
                        }

                        //Verificação se o usuário logado pode responder
                        if(isset($_SESSION["usuario"])){
                            $comandoR = "select * from Produto where idProduto = $idProduto and idUsuario in (select idUsuario from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "');";
                            $resultadoR = mysqli_query($conexao, $comandoR);

                            $comandoA = 'select count(*) as "repetido" from resposta where idAvaliacao ='.$idAvaliacao.';';
                            $resultadoA = mysqli_query($conexao, $comandoA);
                            while($linhaA = mysqli_fetch_assoc($resultadoA)){
                                $repetido = $linhaA["repetido"];
                            }

                            if(mysqli_num_rows($resultadoR)!=0 and $repetido != 1){ ?>
                                <form action="../site_php/adicionar_resposta.php" method="POST">
                                <input type="hidden" name="idProduto" value="<?=$idProduto?>">
                                <input type="hidden" name="idAvaliacao" value="<?=$idAvaliacao?>">
                                <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
                                Responder <input type="text" name= "resposta" id="barra_pesq_avali">
                                <button type="submit">Responder</button>
                                </form><br>
                                
                            <?php  }
                        }
                    }
                }
            ?>
                <?php if(isset($_SESSION["usuario"])){ ?>
                <form action="../site_php/adicionar_avaliacao.php" method="POST">
                    <input type="hidden" name="idProduto" value="<?=$idProduto?>">
                    <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
                    <br><br>
                    Comentar <input type="text" name= "comentario" id="barra_pesq_avali">
                    <button type="submit">Comentar</button><br><br>
                </form>
            </div>
        <?php } ?>
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