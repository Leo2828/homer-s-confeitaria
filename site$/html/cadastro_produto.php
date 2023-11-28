<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro produto</title>
    <link rel="stylesheet"  href="../css/cadastro_produto.css" />
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

    <div class="page">
    
    <form action="../site_php/adicionar_produto.php" method="post" enctype="multipart/form-data" class="formLogin">

        <h1>Cadastro de produto</h1>
        <p>Digite os dados do produto para o cadastro.</p>

        <input type="hidden" name="idUsuario" value="<?=$idUsuario?>" >
        
        <label for="nomeProd">Nome</label>
        <input type="text" name="nomeProd" placeholder="Digite o nome do produto">

        <label for="descricaoProd">Descrição</label>
        <input type="text" name="descricaoProd" placeholder="Digite a descrição do produto">

        <label for="preco">Preço</label>
        <input type="text" name="preco" placeholder="Digite o preço">

        <label for="estoque">Estoque</label>
        <input type="text" name="estoque" placeholder="Digite a quantidade em estoque">

        <label for="arquivo[]">Arquivo</label>
        <input type="file" name="arquivo[]" multiple="multiple">
        <input type="submit" value="Cadastrar" class="btn" />
    </form>
    </div>
    <?php require "footer.php"?>
</body>
</html>
