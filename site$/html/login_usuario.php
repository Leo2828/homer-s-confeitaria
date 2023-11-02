<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"  href="../css/login_usuario.css" />
    <?php require "header.php"?>
</head>
<body>

    <div class="page">
        <form action="../site_php/login_config.php" method="post" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <!-- <label for="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" autofocus="true" name="email" /> -->

            <label for="nome">Nome</label>
            <input type="text" placeholder="Digite seu nome" name="nome"/>

            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha"/>

            <a href="#">Esqueci minha senha</a>
            <a href="cadastro_usuario.php">Não possui uma conta? Cadastre-se</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>

    <?php require "footer.php"?>

</body>
</html>
