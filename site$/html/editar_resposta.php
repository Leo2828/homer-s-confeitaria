<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição produto</title>
    <link rel="stylesheet"  href="#" />
    <?php 

        require "header.php";

        $idResposta = $_GET["idResposta"];
        $idProduto = $_GET["idProduto"];

        $comando = "select * from Resposta where idResposta=$idResposta";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $resposta = $linha["resposta"];
        }

    ?>
</head>
<body>
    <h1>Atualizar resposta</h1>
    <form action="../site_php/atualizar_resposta.php" method="POST">
        <input type="hidden" name="idProduto" value="<?=$idProduto?>">
        <input type="hidden" name="idResposta" value="<?=$idResposta?>">
        Responder<input type="text" name="resposta" value='<?=$resposta?>'>
        <button type="submit">Responder</button>
    </form>
</body>
</html>
