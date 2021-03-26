<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

    //verificando se a variavel autenticar exixte e se os campos foram preenchidos, para efetuar o login
    if (isset($_POST['autenticar']) and $_POST['email'] != null and $_POST['senha'] != null) {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' AND senhaUsuario= '$senha'") or die($conexao->error);
       
        //verificando se é um hospital ou usuario ou os dados invalidos
        if ($usuario->num_rows > 0) {
            $usuario = $usuario->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['usuarioID'] = $usuario['usuarioID'];
            $_SESSION['emailUsuario'] = $usuario['emailUsuario'];
            $_SESSION['senhaUsuario'] = $usuario['senhaUsuario'];
            $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];

            header("location:/SMILIPS/view/pages/usuario/home.php");
        } else {
            exibirMsg("Dados Inválidos!", "danger");
            header("location:/SMILIPS/view/pages/login.php");
        }
    } else {
        exibirMsg("Preencha Todos os Campos!", "notify");
        header("location:/SMILIPS/view/pages/login.php");
    }
?>