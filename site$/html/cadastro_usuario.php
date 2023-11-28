<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet"  href="../css/cadastro_usuario.css"/>
    <?php require "header.php"?>
</head>
<body>

        <div class="page">
            <form action="../site_php/adicionar_usuario.php" method="post" class="formLogin">
                <h1>Cadastro</h1>
                <p>Digite seus dados para o cadastro.</p>

                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Digite seu nome" required>

                <label for="password">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>

                <div>
                    <label for="chef">Chef</label>
                    <input type="radio" id="chef" name="tipo" value="1">
                    
                    <label for="cliente">Cliente</label>
                    <input type="radio" id="cliente" name="tipo" value="0" checked>
                </div>           

                <input type="submit" value="Acessar" class="btn" />
            </form>
            <?php if(isset($_GET["msg"])): 
                $msg = $_GET["msg"];
                ?>

                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong><?=$msg?></strong>
                </div>
            <?php endif ?>

        </div>
        <?php require "footer.php"?>
</body>
</html>
