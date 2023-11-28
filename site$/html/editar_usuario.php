<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet"  href="../css/editar_usuario.css" />
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
    
<div class="page">

    <form action="../site_php/atualizar_usuario.php" method="post" class="formLogin">

    <h1>Cadastro</h1>

        <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
        <label for="nome">Nome</label>
        <input type="text" name="nomeUsuario" value="<?=$nomeUsuario?>"><br><br>
        <label for="password">Senha</label>
        <input type="password" name="senhaUsuario" value="<?=$senhaUsuario?>"><br><br>
        <label for="email">Email</label>
        <input type="email" name="emailUsuario" value="<?=$emailUsuario?>"><br><br>
        <input type="submit" value="Atualizar" class="btn" />
    
    </form>

    <?php if(isset($_GET["msg"])): 
        $msg = $_GET["msg"];?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong><?=$msg?></strong>
        </div>
    <?php endif ?>

</div>
    <?php require "footer.php"?>
</body>
</html>