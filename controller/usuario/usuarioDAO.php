<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

//verificando se a varivel save exite e se os campos obrigatorios foram preencidos
if (isset($_POST['save']) and $_POST['nome'] != null and $_POST['email'] != null and $_POST['senha1'] != null and $_POST['senha2'] != null and $_POST['rua'] != null and $_POST['bairro'] != null and $_POST['numero'] != null and $_POST['telefone'] != null) {

    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // verificando se senha1 e igual a senha2
    if ($senha1 == $senha2) {
        //verificando (com regex) se os campos em questao possuem formatos validos
        if (preg_match("/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/", $senha1) and preg_match("/.{3}+@.+\..{3}+/", $email) and preg_match("/^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/", $telefone)) {

            $emailValidoUsuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
            $emailValidoAdm = $conexao->query("SELECT * FROM administrador WHERE email = '$email'");

            //verificando se o email e valido
            if ($emailValidoUsuario->num_rows <= 0 && $emailValidoAdm->num_rows <= 0) {
                //pegando os campos passados
                $nome = $_POST['nome'];
                $senha1 = md5($senha1);
                $rua = $_POST['rua'];
                $bairro = $_POST['bairro'];
                $complemento = $_POST['complemento'];
                $numero = $_POST['numero'];
                $situacao = 'ativada';

                $tamanho = filesize("/xampp/htdocs/SMILIPS/view/images/Usuario/user.png");
                $handle = fopen("/xampp/htdocs/SMILIPS/view/images/Usuario/user.png", "r");
                $ftPerfil  = addslashes(fread($handle, $tamanho));

                //salvando o usurio
                $conexao->query("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario, rua, bairro, complemento, telefone, numero, situacao, ftPerfil) VALUES ('$nome', '$email', '$senha1', '$rua', '$bairro', '$complemento', '$telefone', '$numero', '$situacao', '$ftPerfil')") or die($conexao->error);

                fclose($handle);

                //volta pra tela de cadastro e exibi a mesnsagem
                exibirMsg("Cadastro bem Sucedido!", "success");
                header("location:/SMILIPS/view/pages/cadastro.php");
            } else {
                //caso o email ou cpf/cnpj ja exista, volta pra tela de cadastro e exibi a mesnsagem
                exibirMsg("Email já Cadastrado", "danger");
                header("location:/SMILIPS/view/pages/cadastro.php");
            }
        } else {
            //caso dos sejam invalidos, volta pra tela de cadastro e exibi a mesnsagem
            exibirMsg("Dados Inválidos!", "danger");
            header("location:/SMILIPS/view/pages/cadastro.php");
        }
    } else {
        //caso as senhas sejam diferentes, volta pra tela de cadastro e exibi a mesnsagem
        exibirMsg("Senhas Diferentes!", "danger");
        header("location:/SMILIPS/view/pages/cadastro.php");
    }

    //verificando se a variavel editarinfo existe
} else if (isset($_POST['editarInfo'])) {
    //pegando o id do usuario
    $id = $_POST['id'];

    // verificando se os campos foram preenchidos
    if ($_POST['nome'] != null and $_POST['email'] != null and $_POST['telefone'] != null and $_POST['rua'] != null and $_POST['bairro'] != null and $_POST['numero']) {

        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        //verificando se tem formatos validos
        if (preg_match("/.{3}+@.+\..{3}+/", $email) and preg_match("/^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/", $telefone)) {

            $emailValido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' and usuarioID = '$id'");
            $emailInvalido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");

            //verificando se ja existe e caso ja existam se pertencem ao usuario em questao
            if ($emailValido->num_rows > 0 or $emailInvalido->num_rows <= 0) {

                $nome = $_POST['nome'];
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairro = $_POST['bairro'];
                $complemento = $_POST['complemento'];

                //atualizando os dados do usuario
                $conexao->query("UPDATE usuario SET nomeUsuario = '$nome', emailUsuario = '$email', rua = '$rua', bairro = '$bairro', numero = '$numero', complemento = '$complemento', telefone = '$telefone' WHERE usuarioID = '$id'") or die($conexao->error);

                // voltando para a tela de perfil com a varivel consultar e seu id e exibindo a mensagem
                exibirMsg("Edição bem Sucedida!", "success");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            } else {
                //se ja existe o email ou cpf/cnpj
                exibirMsg("Email já cadastrado", "danger");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            }
        } else {
            // se os dados sao invalidos
            exibirMsg("Dados Inválidos!", "danger");
            header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
    } else {
        //se ha campos obrigatorios em branco
        exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }

    //verificando se a variavel editarsenha existe
} else if (isset($_POST['editarSenha'])) {
    //pegando o id do usuario
    $id = $_POST['id'];

    //verificando se a senha1 e senha2 foram preenchidas
    if ($_POST['senha1'] != null and $_POST['senha2'] != null) {
        // se sao iguais
        if ($_POST['senha1'] == $_POST['senha2']) {
            // se sao validas
            if (preg_match("/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/", $_POST['senha1'])) {

                //convertendo em md5
                $senha = md5($_POST['senha1']);

                //atualizando a senha do usuario
                $conexao->query("UPDATE usuario SET senhaUsuario = '$senha' WHERE usuarioID = '$id'") or die($conexao->error);

                //volta pra tela de editar senha e exiindo a mensgem
                exibirMsg("Senha Editada com Sucesso!", "success");
                header("location:/SMILIPS/view/pages/usuario/editarSenha.php");
            } else {
                //se a senha e invalida
                exibirMsg("Senha Inválida!", "danger");
                header("location:/SMILIPS/view/pages/usuario/editarSenha.php");
            }
        } else {
            //se as senha sao diferentes
            exibirMsg("Senhas Diferentes!", "danger");
            header("location:/SMILIPS/view/pages/usuario/editarSenha.php");
        }
    } else {
        // se a campos em branco
        exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
        header("location:/SMILIPS/view/pages/usuario/editarSenha.php");
    }

    //verificando se a variavel editarimg esixte
} else if (isset($_POST['editarImg'])) {
    //pegando o id do usuario
    $id = $_POST['id'];

    //verificando se o foi enviado algum arquivo pelo input de type file
    if (isset($_FILES['ft-perfil']['name']) && $_FILES['ft-perfil']['error'] == 0) {

        // verificando se a ocorrencias dentro da estensao do arquivo, e armazenando em $extensao
        preg_match("/\.(png|jpg|jpeg)$/i", $_FILES['ft-perfil']['name'], $extensao);
        if ($extensao) {
            // Obtém o tamanho do arquivo para a leitura
            $tamanhoImg = $_FILES['ft-perfil']['size'];

            if ($_FILES['ft-perfil']['size'] <= 1022924) {
                $ftPerfil = $_FILES['ft-perfil'];
                $caminhoTemp = $_FILES['ft-perfil']['tmp_name'];

                // fopen() - Abre um arquivo ou URL, nesse caso o 'r' especifica que o arquivo esta sendo aberto somente para leitura
                // fread() - Leitura binary-safe de arquivo, Retorna a string lida ou false em caso de erro.
                // addslashes() - Adiciona barras a uma string, Retorna uma string com barras adicionadas antes de caracteres que precisam ser escapados
                $handle = fopen($caminhoTemp, "r");
                $ftPerfil  = addslashes(fread($handle, $tamanhoImg));

                // atualizando a foto de perfil do usuario
                $conexao->query("UPDATE  usuario SET ftPerfil = '$ftPerfil' WHERE usuarioID = '$id'") or die($conexao->error);

                // dando close no fopen para parar a leitura do arquivo
                fclose($handle);

                //volta pra pagina de perfil com a varivel consultar e o id do usuario e exibe a mensagem
                exibirMsg("Foto Salva Com Sucesso!", "success");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            } else {
                exibirMsg("Tamanho de Imagem não Suportada! (max : 1000 KB)", "danger");
                header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
            }
        } else {
            // se a extensao do arquivo selecionado e invalida
            exibirMsg("Extensão Inválida!", "danger");
            header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
    } else {
        //se nao doi selecionado nenhum arquivo
        exibirMsg("Escolha uma Imagem antes de tentar Salvar!", "danger");
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }

    //verificando se a variavel desativar existe
} else if (isset($_POST['desativar'])) {
    //pegando o id do usuario
    $id = $_POST['id'];

    //consultando os dados do usaurio
    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
    //transfromando em array
    $usuario = $usuario->fetch_assoc();

    // verificando se a senha passada e igual a senha cadastrada no banco de dados
    if (md5($_POST['senha']) == $usuario['senhaUsuario']) {
        // atualizando o campo situacao na tabela usuario
        $conexao->query("UPDATE usuario SET situacao = 'desativada' WHERE usuarioID = '$id'") or die($conexao->error);

        //dando um require em sair e exibindo a mensagem
        exibirMsg("Conta Desativada!", "danger");
        require_once('/xampp/htdocs/SMILIPS/controller/autenticar/sair.php');
    } else {
        //se a senha for diferente da do DB
        exibirMsg("Senha Incorreta!", "danger");
        header("location:/SMILIPS/view/pages/usuario/configuracoes.php");
    }
} else if (isset($_GET['notificacao_imgs'])) {
    $msg = $_GET['notificacao_imgs'];
    if ($msg == "Formato ou Tamanho de Arquivo Inválido!") {
        exibirMsg("Formato ou Tamanho de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG. Tamanhos Suportados = até 1000KB)", "danger");
        header("location:/SMILIPS/view/pages/imovel/cadastro.php");
    } else if ($msg == "Número de Imagens Selecionadas Inválido!") {
        exibirMsg("Número de Imagens Selecionadas Inválido! (Suporte = 3 à 10)", "danger");
        header("location:/SMILIPS/view/pages/imovel/cadastro.php");
    } else if ($msg == "Formato de Arquivo Inválido!") {
        $id = $_GET['id'];
        exibirMsg("Formato de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG)", "danger");
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    } else {
        $id = $_GET['id'];
        exibirMsg("Selecione uma Imagem!", "danger");
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }
} else if (isset($_POST['cadastro-imovel'])) {
    $tipo_imovel = $_POST['type'];

    if ($tipo_imovel) {
        $existe = false;
        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
            if (isset($_FILES['image']['name'][$i]) && $_FILES['image']['error'][$i] == 0) {
                $existe = true;
            }
        }
        if ($existe) {
            $rua = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $numero = $_POST['numero'];
            $qtdQuarto = $_POST['qtdQuarto'];
            $qtdBanheiro = $_POST['qtdBanheiro'];
            $qtdGaragem = $_POST['qtdGaragem'];
            $area = $_POST['area'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $id = $_POST['id'];

            $conexao->query("INSERT INTO imovel(rua, cidade, bairro, tipo, valorAluguel, qtdQuarto, qtdBanheiro, qtdGaragem, area, descricao, usuarioID) VALUES('$rua', 'Icó', '$bairro', '$tipo_imovel', '$valor', '$qtdQuarto', '$qtdBanheiro', '$qtdGaragem', '$area', '$descricao', '$id')") or die($conexao->error);

            $imovel = $conexao->query("SELECT MAX(imovelID) FROM imovel") or die($conexao->error);
            $imovel = $imovel->fetch_array();
            $idImovel =  $imovel[0];

            $imgs_imovel = $_FILES['image'];

            for ($j = 0; $j < count($imgs_imovel['name']); $j++) {
                $caminhoTemp = $imgs_imovel['tmp_name'][$j];
                $tamanhoImg = $imgs_imovel['size'][$j];

                $handle = fopen($caminhoTemp, "r");
                $image  = addslashes(fread($handle, $tamanhoImg));
                $conexao->query("INSERT INTO imgImovel(imagem, imovelID) VALUES('$image', '$idImovel')") or die($conexao->error);

                fclose($handle);
            }

            exibirMsg("Imóvel Cadastrado com Sucesso!", "success");
            header("location:/SMILIPS/view/pages/imovel/cadastro.php");
        } else {
            exibirMsg("Selecione Imagens do Imóvel!", "danger");
            header("location:/SMILIPS/view/pages/imovel/cadastro.php");
        }
    } else {
        exibirMsg("Selecione um Tipo de Imóvel!", "danger");
        header("location:/SMILIPS/view/pages/imovel/cadastro.php");
    }
} else {
    //caso ao salvar aja dados obrigatorios em branco
    exibirMsg("Preencha todos os campos obrigatórios!", "danger");
    header("location:/SMILIPS/view/pages/cadastro.php");
}
