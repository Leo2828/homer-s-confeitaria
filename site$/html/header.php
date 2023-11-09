<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet"  href="../css/header.css" />
</head>
<body>
    <header>
            <div class="center">
                <div>
                    <a href="index.php"><img src="../img/logo.jpg" class="img_logo"></a>
                </div>

                <div>
                    <form action = "" method= "POST">
                    <input type= "search" name= "pesquisa" id="barra_pesq" placeholder=Pesquisar>
                    </form>
                </div>
                <div>
                    <a href="#"><img src="../img/carrinho.png" class="imgs_icon"></a>
                    <div class="dropdown">
                        <button class="dropbtn"><img src="../img/user.png" class="imgs_icon"></button>
                        <div class="dropdown-content">
                            <?php
                                session_start();
                                if(!isset($_SESSION["usuario"])){                       
                                    echo '<a href= "login_usuario.php">Logar</a>
                                    <a href= "cadastro_usuario.php">Cadastrar</a>';
                                }else{
                                    echo '<a href= "login_usuario.php">Logar</a>
                                    <a href= "cadastro_usuario.php">Cadastrar</a>
                                    <a href= "pagina_usuario.php">Configurações do perfil</a>
                                    <a href= "../site_php/deslogar.php">Deslogar</a>';
                                    echo "</div></div>";
                                    
                                    require "../site_php/conexao.php";
                                    $comando = "select * from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "' and Chef = 1;";
                                    $resultado = mysqli_query($conexao, $comando);
                                    if(mysqli_num_rows($resultado)!=0){
                                        echo '<a href="cadastro_produto.php"><img src="../img/produto.png" class="imgs_icon"></a>';
                                    }
                                }
                            ?>
                </div>
            </div>
            
    </header>
</body>
</html>
