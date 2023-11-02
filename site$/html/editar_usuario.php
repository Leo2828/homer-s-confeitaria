<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet"  href="#" />
    <?php require "header.php"?>
    <?php

    require "../site_php/conexao.php";

    $idUsuario = $_GET["idUsuario"];

    $comando = "select * from Usuario where idUsuario = $idUsuario;";
    $resultado = mysqli_query($conexao, $comando);
    while($linha = mysqli_fetch_assoc($resultado)){
        $nomeUsuario = $linha["nomeUsuario"];
        $emailUsuario = $linha["emailUsuario"];
        $senhaUsuario = $linha["senhaUsuario"];
    }
    ?>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="../site_php/atualizar_usuario.php" method="post">
        <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
        Nome: <input type="text" name="nomeUsuario" value="<?=$nomeUsuario?>"><br><br>
        Senha: <input type="password" name="senhaUsuario" value="<?=$senhaUsuario?>"><br><br>
        Email: <input type="email" name="emailUsuario" value="<?=$emailUsuario?>"><br><br>
        <button type="submit">Atualizar</button>
    </form>
    <?php require "footer.php"?>
</body>
</html>