<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $id = $_POST['id'];

    // verificando se o email ja existe, se s, se e o email do adm em questao
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $adm = $conexao->query("SELECT * FROM administrador WHERE email = '$email'");
    $admEmail = $conexao->query("SELECT * FROM administrador WHERE email = '$email' and administradorID = '$id'");

    if ($admEmail->num_rows > 0) {
        // se é o email do proprio adm
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    } else if ($usuario->num_rows > 0 || $adm->num_rows > 0) {
        // se o email ja existe
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else if ($email == null) {
        // verificando se o campo esta nulo
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else {
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    }
}

if (isset($_POST['senhaAtual'])) {

    $id = $_POST['id'];
    $senhaAtual = $_POST['senhaAtual'];

    // pesquisando um adm pelo id, tranformando em array e armazenando a senha
    $administrador = $conexao->query("SELECT * FROM administrador WHERE administradorID = '$id'");
    $administrador = $administrador->fetch_array();

    $senhaAdministrador = $administrador['senha'];

    // verificando se a senha digitada e igual a senha cadastrada no DB
    if ($senhaAdministrador == md5($senhaAtual)) {
        echo '<font color="#27ae60"><b>Senha Válida!</b></font>';
    } else {
        echo '<font color="#e74c3c"><b>Senha Inválida!</b></font>';
    }
}
