<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


    //pegando os campos passados
    $nome = $_POST['nome'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $telefone = $_POST['telefone'];

    $conexao->query("INSERT INTO usuario(nomeUsuario, cpf_cnpj, emailUsuario, senhaUsuario, endereco, bairro, complemento, telefone) VALUES ('$nome','$cpf_cnpj', '$email', '$senha', '$endereco', '$bairro', '$complemento', '$telefone')") or die($conexao->error);

    header("location:/SMILIPS/view/pages/usuario/cadastro.php");
?>