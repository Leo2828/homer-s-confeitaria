<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina usuario</title>
    <link rel="stylesheet"  href="../css/pagina_usuario.css" />
    <?php require "header.php"?>
    <?php

        require "../site_php/conexao.php";
        $comando = "select * from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "';";
        $resultado = mysqli_query($conexao, $comando);
        while($linha = mysqli_fetch_assoc($resultado)){
            $emailUsuario = $linha["emailUsuario"];
            $idUsuario = $linha["idUsuario"];
        }          
    ?>
</head>
<body>
    <h1><?=$_SESSION["usuario"]?></h1>
    <p><?=$emailUsuario?></p><br>
    <a href="editar_usuario.php?idUsuario=<?=$idUsuario?>">Editar</a>
    <a href="../site_php/deletar_usuario.php?idUsuario=<?=$idUsuario?>">Deletar</a><br> 
    <div class="dropdown-pu">
        <button onclick="myFunction()" class="dropbtn-pu">Produtos</button>
        <div id="myDropdown" class="dropdown-content-pu">

            <?php
                $comando = "select * from Produto where idUsuario in (select idUsuario from Usuario where nomeUsuario = '" . $_SESSION["usuario"] . "');";
                $resultado = mysqli_query($conexao, $comando);
                while($linha = mysqli_fetch_assoc($resultado)){
                    echo $linha["nomeProd"];
                    echo "<br><a href='editar_produto.php?idProduto=" . $linha["idProduto"] . "'>Editar</a>";
                    echo " <a href='../site_php/deletar_produto.php?idProduto=" . $linha["idProduto"] . "'>Apagar</a><br><br>";
                }   
            ?>

        </div>
    </div>
    <?php require "footer.php"?>
    <script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
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