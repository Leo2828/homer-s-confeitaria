<?php

    require "conexao.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    if (isset($_POST['nome']) && isset($_POST['senha'])) {
        $comando = "select nomeUsuario, senhaUsuario from Usuario where nomeUsuario = '$nome' and senhaUsuario = '$senha';";
        $resultado = mysqli_query($conexao, $comando);
            if(mysqli_num_rows($resultado)==0){
                $msg = "Dados incorretos";
                header('Location: '."../html/login_usuario.php?msg=$msg");
            }else{
                session_start();
                $_SESSION["usuario"] = $nome;
                header('Location: '."../html/index.php");
            }   
    }
?>
