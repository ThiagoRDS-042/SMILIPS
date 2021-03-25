<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

    if(isset($_POST['save']) and $_POST['nome'] != null and $_POST['cpf_cnpj'] != null and $_POST['email'] != null and $_POST['senha'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null and $_POST['telefone'] != null){
        
        $senha = $_POST['senha'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        if(preg_match("/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/", $senha) and (preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$|^\d{11}$/", $cpf_cnpj) or preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$|^\d{14}$/", $cpf_cnpj)) and preg_match("/.{3}+@.+\..{3}+/", $email) and preg_match("/^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/", $telefone)){
            
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
        
    }else if(isset($_POST['editarInfo'])){
        
        $id = $_POST['id'];

        if($_POST['nome'] != null and $_POST['email'] != null and $_POST['cpf_cnpj'] != null and $_POST['telefone'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null){
            
            $email = $_POST['email'];
            $cpf_cnpj = $_POST['cpf_cnpj'];
            $telefone = $_POST['telefone'];
            
            if((preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$|^\d{11}$/", $cpf_cnpj) or preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$|^\d{14}$/", $cpf_cnpj)) and preg_match("/.{3}+@.+\..{3}+/", $email) and preg_match("/^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/", $telefone)){

                $emailValido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' and usuarioID = '$id'");
                $cpf_cnpjValido = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj' and usuarioID = '$id'");

                $emailInvalido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
                $cpf_cnpjInvalido = $conexao->query("SELECT * FROM usuario WHERE cpf_cnpj = '$cpf_cnpj'");

                if (($emailValido->num_rows > 0 and $cpf_cnpjValido->num_rows > 0) or ($emailInvalido->num_rows <= 0 and $cpf_cnpjInvalido->num_rows <= 0)) {

                    $nome = $_POST['nome'];
                    $endereco = $_POST['endereco'];
                    $bairro = $_POST['bairro'];
                    $complemento = $_POST['complemento'];

                    $conexao->query("UPDATE usuario SET nomeUsuario = '$nome', cpf_cnpj = '$cpf_cnpj', emailUsuario = '$email', endereco = '$endereco', bairro = '$bairro', complemento = '$complemento', telefone = '$telefone' WHERE usuarioID = '$id'") or die($conexao->error);
                    
                    exibirMsg("Edição bem Sucedida!", "success");
                    header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");

                }else{
                    exibirMsg("Email ou CPF/CNPJ já cadastrados", "danger");
                    header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
                }
            }else{
                exibirMsg("Dados Inválidos!", "danger");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            }
        }else{
            exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
            header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }

    }else if(isset($_POST['editarSenha'])){
        $id = $_POST['id'];

        if($_POST['senha1'] != null and $_POST['senha2'] != null){
            if($_POST['senha1'] == $_POST['senha2']){
                if(preg_match("/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/", $_POST['senha1'])){
                    
                    $senha = md5($_POST['senha1']);
                    $conexao->query("UPDATE usuario SET senhaUsuario = '$senha' WHERE usuarioID = '$id'") or die($conexao->error);
                    
                    exibirMsg("Senha Editada com Sucesso!", "success");
                    header("location:/SMILIPS/view/pages/usuario/editarSenha.php?consultar=$id");
                }else{
                    exibirMsg("Senha Inválida!", "danger");
                    header("location:/SMILIPS/view/pages/usuario/editarSenha.php?consultar=$id");
                }
            }else{
                exibirMsg("Senhas Diferentes!", "danger");
                header("location:/SMILIPS/view/pages/usuario/editarSenha.php?consultar=$id");
            }
        }else{
            exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
            header("location:/SMILIPS/view/pages/usuario/editarSenha.php?consultar=$id");
        }
    }else if(isset($_POST['editarImg'])){
        $id = $_POST['id'];

        if($_FILES['ft-perfil'] != null){

            preg_match("/\.(png|jpg|jpeg)$/i", $_FILES['ft-perfil']['name'], $extensao);
            if($extensao){

                $image = addslashes($_FILES['ft-perfil']['tmp_name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);
        
                $conexao->query("UPDATE  usuario SET ftPerfil = '$image' WHERE usuarioID = '$id'") or die($conexao->error);
        
                exibirMsg("Foto Salva Com Sucesso!", "success");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            }else{
                exibirMsg("Extensão Inválida!", "danger");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            }
        }else{
            exibirMsg("Escolha uma Imagem antes de tentar Salvar!", "danger");
            header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }

    }else if(isset($_POST['deletar'])){

        $id = $_POST['id'];
        $conexao->query("DELETE FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

        exibirMsg("Conta Deletada!", "danger");
        require_once('/xampp/htdocs/SMILIPS/controller/autenticar/sair.php');
    }else{
        exibirMsg("Preencha todos os campos obrigatórios!", "danger");
        header("location:/SMILIPS/view/pages/cadastro.php");
    }



    
?>