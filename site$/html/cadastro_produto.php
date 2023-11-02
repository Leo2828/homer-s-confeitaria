<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro produto</title>
    <link rel="stylesheet"  href="#" />
    <?php

        require "../site_php/conexao.php";
        require "header.php";
        $comando = "select * from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "';";
        $resultado = mysqli_query($conexao, $comando);
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $idUsuario = $linha["idUsuario"];
        }

    ?>
</head>
<body>
    <h1>Cadastro de produto</h1>
    <form action="../site_php/adicionar_produto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idUsuario" value="<?=$idUsuario?>" >
        Nome do produto: <input type="text" name="nomeProd"><br><br>
        Descrição: <input type="text" name="descricaoProd"><br><br>
        Preço: <input type="text" name="preco"><br><br>
        Imagem: <input type="file" name="arquivo[]" multiple="multiple"><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <?php require "footer.php"?>
</body>
</html>