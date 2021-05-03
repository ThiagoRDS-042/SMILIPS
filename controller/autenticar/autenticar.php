<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

//verificando se a variavel autenticar exixte e se os campos foram preenchidos, para efetuar o login
if (isset($_POST['autenticar']) and $_POST['email'] != null and $_POST['senha'] != null) {
    // capturando os dados para fazer a cunsulta no DB
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    // consultando o usuario de acordo com o email e senha
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' AND senhaUsuario= '$senha'") or die($conexao->error);
    // consultando o adminstrador de acordo com o email e senha
    $administrador = $conexao->query("SELECT * FROM administrador WHERE email = '$email' AND senha= '$senha'") or die($conexao->error);

    //verificando se retornou algo na consulta a cima
    if ($usuario->num_rows > 0) {
        // transormando em array
        $usuario = $usuario->fetch_assoc();

        // verificando se a conta esta desativada
        if ($usuario['situacao'] == 'desativada') {
            // ativando a conta
            $conexao->query("UPDATE usuario SET situacao = 'ativada' WHERE emailUsuario = '$email' AND senhaUsuario= '$senha'") or die($conexao->error);
        }
        // iniciando uma sessao caso ja n exista uma
        if (!isset($_SESSION)) {
            session_start();
        }
        // salvando alguns dos dados do usuario na sessao
        $_SESSION['usuarioID'] = $usuario['usuarioID'];
        $_SESSION['emailUsuario'] = $usuario['emailUsuario'];
        $_SESSION['senhaUsuario'] = $usuario['senhaUsuario'];
        $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];

        // redirecionando para a tela do usuario
        header("location:/SMILIPS/view/pages/usuario/home.php");
    } else if ($administrador->num_rows > 0) {
        // transormando em array
        $administrador = $administrador->fetch_assoc();

        // iniciando uma sessao caso ja n exista uma
        if (!isset($_SESSION)) {
            session_start();
        }
        // salvando alguns dos dados do usuario na sessao
        $_SESSION['idAdm'] = $administrador['administradorID'];
        $_SESSION['emailAdm'] = $administrador['email'];
        $_SESSION['senhaAdm'] = $administrador['senha'];

        // redirecionando para a tela do usuario
        header("location:/SMILIPS/view/pages/administrador/home.php");
    } else {
        // exibindo a mensagem de dados invalidos na tela de login
        exibirMsg("Dados Inválidos!", "danger");
        header("location:/SMILIPS/view/pages/sistema/login.php");
    }
} else {
    // exibindo a mensagem de preencha todos os campos na tela de login
    exibirMsg("Preencha Todos os Campos!", "danger");
    header("location:/SMILIPS/view/pages/sistema/login.php");
}
