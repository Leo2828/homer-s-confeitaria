<?php

    require "conexao.php";

    $id = $_POST["idResposta"];

    $comando = "delete * where Resposta = $id;";
    mysqli_query($conexao, $comando);

?>