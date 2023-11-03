<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição produto</title>
    <link rel="stylesheet"  href="#" />
    <?php 
        require "header.php";

        $idAvaliacao = $_GET["idAvaliacao"];
        $idProduto = $_GET["idProduto"];

        $comando = "select * from Avaliacao where idAvaliacao=$idAvaliacao";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $comentario = $linha["comentario"];
        }
    ?>
</head>   
<body>
    <h1>Atualizar avaliacao</h1>
    <form action="../site_php/atualizar_avaliacao.php" method="POST">
        <input type="hidden" name="idProduto" value="<?=$idProduto?>">
        <input type="hidden" name="idAvaliacao" value="<?=$idAvaliacao?>">
        Comentar<input type="text" name="comentario" value='<?=$comentario?>'>
        <button type="submit">Comentar</button><br><br>
    </form>
</body>
</html>