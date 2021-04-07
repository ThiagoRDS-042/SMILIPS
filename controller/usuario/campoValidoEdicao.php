<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

//praticamente mesma coisa da pagina anterior so q agora para os campos de edicao
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $id = $_POST['id'];
    //agora eu verifico se o email ja existe e se o emial pertence ou nao ao usuario q pretende modificar
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' and usuarioID = '$id'");
    $usuarioEmail = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $adm = $conexao->query("SELECT * FROM administrador WHERE email = '$email'");

    if ($usuario->num_rows > 0) {
        // se o email existe mais se trata do email do proprio usuario ele e valido
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    } else if ($usuarioEmail->num_rows > 0 || $adm->num_rows > 0) {
        //se o email ja existe e n pretence a esse usuario ele e invalido
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else if ($email == null) {
        //verificando se o campo esta nulo
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else if (!preg_match("/.{3}+@.+\..{3}+/", $email)) {
        //validando o formato
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else {
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    }
}

if (isset($_POST['senhaAtual'])) {

    $id = $_POST['id'];
    $senhaAtual = $_POST['senhaAtual'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'");
    $usuario = $usuario->fetch_array();

    $senhaUsuario = $usuario['senhaUsuario'];

    if ($senhaUsuario == md5($senhaAtual)) {
        echo '<font color="#27ae60"><b>Senha Válida!</b></font>';
    } else {
        echo '<font color="#e74c3c"><b>Senha Inválida!</b></font>';
    }
}
