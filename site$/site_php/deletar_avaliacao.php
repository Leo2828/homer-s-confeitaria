<?php

    require "conexao.php";

    $id = $_POST["idAvaliacao"];

    $comando = "delete from Avaliacao where idAvaliacao = $id;";
    mysqli_query($conexao, $comando);
    header('Location: '."../html/index.php")

?>