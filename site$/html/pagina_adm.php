<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina usuario</title>
    <link rel="stylesheet"  href="../css/pagina_usuario.css" />
    <?php require "header.php"?>
</head>
<body>
<?php

    require "../site_php/conexao.php";
    $comando = "select * from Usuario where idUsuario > 1";
    $resultado = mysqli_query($conexao, $comando);
    if(mysqli_num_rows($resultado)==0){
        echo "<h1>Não há usuários</h1>";
    }else{
        while($linha = mysqli_fetch_assoc($resultado)):
            $nomeUsuario = $linha["nomeUsuario"];
            $emailUsuario = $linha["emailUsuario"];
            $idUsuario = $linha["idUsuario"];?>
            <div class="info">
            <h1><?=$nomeUsuario?></h1>
            <p><?=$emailUsuario?></p><br> 
            <a href="../site_php/deletar_usuario.php?idUsuario=<?=$idUsuario?>">Deletar</a><br> 

            </div>
    
<?php endwhile;} ?>

    <div class="dropdown-pu">
        <button onclick="myFunction()" class="dropbtn-pu">Produtos</button>
        <div id="myDropdown" class="dropdown-content-pu">

        <?php
            $comando = "select * from Produto;";
            $resultado = mysqli_query($conexao, $comando);
            if(mysqli_num_rows($resultado)==0){
                echo "<h1>Não há produtos</h1>";
            }else{
                while($linha = mysqli_fetch_assoc($resultado)){
                    echo "<br>". $linha["nomeProd"];
                    echo "<br><a href='../site_php/deletar_produto.php?idProduto=" . $linha["idProduto"] . "'>Apagar</a><br><br>";
                }
            } 
        ?>

        </div>
    </div>

    <?php require "footer.php"?>
    <script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// fecha o dropdown se o usuário clicar fora
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn-pu')) {
    var dropdowns = document.getElementsByClassName("dropdown-content-pu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>