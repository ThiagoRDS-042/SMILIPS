<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

    if(isset($_POST['save']) and $_POST['nome'] != null and $_POST['cpf_cnpj'] != null and $_POST['email'] != null and $_POST['senha'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null and $_POST['telefone'] != null){
        
        $senha = $_POST['senha'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        if(preg_match("/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])/", $senha) and (preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$|^\d{11}$/", $cpf_cnpj) or preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$|^\d{14}$/", $cpf_cnpj)) and preg_match("/.{3}+@.+\..{3}+/", $email) and preg_match("/^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/", $telefone)){
            
            $emailValido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
            $cpf_cnpjValido = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj'");
    
            //verificando se o email e valido e o numero de cpf ou cnpj
            if ($emailValido->num_rows <= 0 and $cpf_cnpjValido->num_rows <= 0) {
                //pegando os campos passados
                $nome = $_POST['nome'];
                $senha = md5($senha);
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $complemento = $_POST['complemento'];
    
                $conexao->query("INSERT INTO usuario(nomeUsuario, cpf_cnpj, emailUsuario, senhaUsuario, endereco, bairro, complemento, telefone) VALUES ('$nome','$cpf_cnpj', '$email', '$senha', '$endereco', '$bairro', '$complemento', '$telefone')") or die($conexao->error);
    
                exibirMsg("Cadastro bem Sucedido!", "success");
                header("location:/SMILIPS/view/pages/cadastro.php");
            }
            else{
                exibirMsg("Email ou CPF/CNPJ já cadastrados", "danger");
                header("location:/SMILIPS/view/pages/cadastro.php");
            }
        }else{
            exibirMsg("Dados Inválidos!", "danger");
            header("location:/SMILIPS/view/pages/cadastro.php");
        }
        
    }else if(isset($_POST['editar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];

        if($nome != null and $email != null and $cpf_cnpj != null and $telefone != null and $edndereco != null and $bairro != null){
            $complemento = $_POST['complemento'];

        }else{
            exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
            header("location:/SMILIPS/view/pages/usuario/perfil.php");
        }

    }else{
        exibirMsg("Preencha todos os campos obrigatórios!", "danger");
        header("location:/SMILIPS/view/pages/cadastro.php");
    }



    
?>