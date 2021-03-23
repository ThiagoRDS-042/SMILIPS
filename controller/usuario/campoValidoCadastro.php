<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");

    if ($usuario->num_rows > 0) {
        echo '<font color= "#842029"><b>Email Inválido!</b></font>';   
    }else if($email == null){
        echo '<font color= "#842029"><b>Email Inválido!</b></font>';   
    }else if(!preg_match("/.{3}+@.+\..{3}+/", $email)){
        echo '<font color= "#842029"><b>Email Inválido!</b></font>';
    } else {
        echo '<font color= "#055160"><b>Email Válido!</b></font>';
    }
}

if(isset($_POST['cpf_cnpj'])){
    
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj'");
    
    if ($usuario->num_rows > 0) {
        echo '<font color= "#842029"><b>CPF ou CNPJ Inválido!</b></font>';   
    }else if($cpf_cnpj == null){
        echo '<font color= "#842029"><b>CPF ou CNPJ Inválido!</b></font>';   
    }else if((preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$|^\d{11}$/", $cpf_cnpj)) or (preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$|^\d{14}$/", $cpf_cnpj))){
        echo '<font color= "#055160"><b>CPF ou CNPJ Válido!</b></font>';
    } else {
        echo '<font color= "#842029"><b>CPF ou CNPJ Inválido!</b></font>';
    }
}

?>