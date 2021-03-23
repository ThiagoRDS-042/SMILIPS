<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $id = $_POST['id'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' and usuarioID = '$id'");
    $usuarioEmail = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");

    if ($usuario->num_rows > 0) {
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    }else if($usuarioEmail->num_rows > 0){
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>'; 
    }else if($email == null){
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>'; 
    }else if(!preg_match("/.{3}+@.+\..{3}+/", $email)){
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>';
    } else {
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    }
}

if(isset($_POST['cpf_cnpj'])){
    
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $id = $_POST['id'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj' and usuarioID = '$id'");
    $usuarioCpf_cnpj = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj'");
    
    if ($usuario->num_rows > 0) {
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    }else if($usuarioCpf_cnpj->num_rows > 0){
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>'; 
    }else if($cpf_cnpj == null){
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>'; 
    }else if((preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$|^\d{11}$/", $cpf_cnpj)) or (preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$|^\d{14}$/", $cpf_cnpj))){
        echo '<i class="fas fa-check" style= "color:#27ae60;"></i>';
    } else {
        echo '<i class="fas fa-check" style= "color:#e74c3c;"></i>'; 
    }
}

?>