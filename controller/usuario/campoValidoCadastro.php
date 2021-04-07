<?php
// essa pagina e a q esta em contato com a funcao ajax, para validar os campos
// dando um requiere em conexao
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

// verifica se a varivel existe
if (isset($_POST['email'])) {

    // consultando usuario a partir do email
    $email = $_POST['email'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $adm = $conexao->query("SELECT * FROM administrador WHERE email = '$email'");


    if ($email == null) {
        // verificando se o campo esta nulo
        echo '<font color= "#e74c3c"><b>Email Inválido! (Preencha o Campo)</b></font>';
    } else if (!preg_match("/.{3}+@.+\..{3}+/", $email)) {
        //validando o formato
        echo '<font color= "#e74c3c"><b>Email Inválido! (Formato Inválido)</b></font>';
        // verificando se retornou algo
    } else if ($usuario->num_rows > 0 || $adm->num_rows > 0) {
        //se retornou email ja existe
        echo '<font color= "#e74c3c"><b>Email Inválido! (já Existente)</b></font>';
    } else {
        echo '<font color= "#27ae60"><b>Email Válido!</b></font>';
    }
}
