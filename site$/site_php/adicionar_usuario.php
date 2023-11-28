<?php

    require "conexao.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];
    
    $comando = "select nomeUsuario from Usuario where nomeUsuario = '$nome';";
    $resultado = mysqli_query($conexao, $comando);

    if(mysqli_num_rows($resultado)==0){
            $comando = "insert into Usuario(nomeUsuario, senhaUsuario, emailUsuario, Chef) values('$nome', '$senha', '$email', '$tipo');";
            mysqli_query($conexao, $comando);
        header('Location: '."../html/login_usuario.php");
    }else{
        $msg = "Nome já existente";
        header('Location: '."../html/cadastro_usuario.php?msg='$msg'");
    }
    
?>