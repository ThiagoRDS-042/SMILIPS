<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

    if(isset($_POST['save']) and $_POST['nome'] != null and $_POST['cpf_cnpj'] != null and $_POST['email'] != null and $_POST['senha'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null and $_POST['telefone'] != null){
        
        $senha = $_POST['senha'];

        if(strlen($senha) >= 8){
            $email = $_POST['email'];
            $cpf_cnpj = $_POST['cpf_cnpj'];
    
            $emailValido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
            $cpf_cnpjValido = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj'");
    
            //verificando se o email e valido e o numero de cpf ou cnpj
            if ($emailValido->num_rows <= 0 and $cpf_cnpjValido->num_rows <= 0) {
                //pegando os campos passados
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $complemento = $_POST['complemento'];
                $telefone = $_POST['telefone'];
    
                $conexao->query("INSERT INTO usuario(nomeUsuario, cpf_cnpj, emailUsuario, senhaUsuario, endereco, bairro, complemento, telefone) VALUES ('$nome','$cpf_cnpj', '$email', '$senha', '$endereco', '$bairro', '$complemento', '$telefone')") or die($conexao->error);
    
                exibirMsg("Cadastro bem Sucedido!", "success");
                header("location:/SMILIPS/view/pages/usuario/cadastro.php");
            }
            else{
                exibirMsg("Email ou CPF/CNPJ já cadastrados", "danger");
                header("location:/SMILIPS/view/pages/usuario/cadastro.php");
            }
        }else{
            exibirMsg("Senha Inválida!", "danger");
                header("location:/SMILIPS/view/pages/usuario/cadastro.php");
        }
        
    }else{
        exibirMsg("Preencha todos os campos obrigatórios!", "danger");
        header("location:/SMILIPS/view/pages/usuario/cadastro.php");
    }



    
?>