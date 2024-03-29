<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

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
        $conexao->query("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario, telefone, situacao, ftPerfil) VALUES ('$nome', '$email', '$senha1', '$telefone', '$situacao', '$ftPerfil')") or die($conexao->error);

        fclose($handle);

        $usuario = $conexao->query("SELECT MAX(usuarioID) FROM usuario") or die($conexao->error);
        $usuario = $usuario->fetch_assoc();
        $usuarioID =  $usuario['MAX(usuarioID)'];

        $conexao->query("INSERT INTO enderecoUsuario(rua, numero, bairro, complemento, usuarioID) VALUES ('$rua', '$numero', '$bairro', '$complemento', '$usuarioID')") or die($conexao->error);

        //volta pra tela de cadastro e exibi a mesnsagem
        exibirMsg("Cadastro bem Sucedido!", "success");
        header("location:/SMILIPS/view/pages/sistema/cadastro.php");
      } else {
        //caso o email ja exista, volta pra tela de cadastro e exibi a mesnsagem
        exibirMsg("Email já Cadastrado", "danger");
        header("location:/SMILIPS/view/pages/sistema/cadastro.php");
      }
    } else {
      //caso dos sejam invalidos, volta pra tela de cadastro e exibi a mesnsagem
      exibirMsg("Dados Inválidos!", "danger");
      header("location:/SMILIPS/view/pages/sistema/cadastro.php");
    }
  } else {
    //caso as senhas sejam diferentes, volta pra tela de cadastro e exibi a mesnsagem
    exibirMsg("Senhas Diferentes!", "danger");
    header("location:/SMILIPS/view/pages/sistema/cadastro.php");
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
      $emailUsuarioInvalido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
      $emailAdmInvalido = $conexao->query("SELECT * FROM administrador WHERE email = '$email'");

      //verificando se ja existe e caso ja existam se pertencem ao usuario em questao
      if ($emailValido->num_rows > 0 or ($emailUsuarioInvalido->num_rows <= 0 && $emailAdmInvalido->num_rows <= 0)) {

        $nome = $_POST['nome'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];

        //atualizando os dados do usuario
        $conexao->query("UPDATE usuario SET nomeUsuario = '$nome', emailUsuario = '$email', telefone = '$telefone' WHERE usuarioID = '$id'") or die($conexao->error);
        $conexao->query("UPDATE enderecoUsuario SET rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro' WHERE usuarioID = '$id'") or die($conexao->error);

        // voltando para a tela de perfil com a varivel consultar e seu id e exibindo a mensagem
        exibirMsg("Edição bem Sucedida!", "success");
        if (isset($_SESSION['idAdm'])) {
          header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
        } else {
          header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
      } else {
        //se ja existe o email ou cpf/cnpj
        exibirMsg("Email já cadastrado", "danger");
        if (isset($_SESSION['idAdm'])) {
          header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
        } else {
          header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
      }
    } else {
      // se os dados sao invalidos
      exibirMsg("Dados Inválidos!", "danger");
      if (isset($_SESSION['idAdm'])) {
        header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
      } else {
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
      }
    }
  } else {
    //se ha campos obrigatorios em branco
    exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
    if (isset($_SESSION['idAdm'])) {
      header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
    } else {
      header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }
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

        //volta pra tela de editar senha e exibi a mensgem
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

      if ($tamanhoImg <= 1022924) {
        $ftPerfil = $_FILES['ft-perfil'];
        $caminhoTemp = $_FILES['ft-perfil']['tmp_name'];

        // fopen() - Abre um arquivo ou URL, nesse caso o 'r' especifica que o arquivo esta sendo aberto somente para leitura
        // fread() - Leitura binary-safe de arquivo, Retorna a string lida ou false em caso de erro.
        // addslashes() - Adiciona barras a uma string, Retorna uma string com barras adicionadas antes de caracteres que precisam ser escapados
        $handle = fopen($caminhoTemp, "r");
        $ftPerfil  = addslashes(fread($handle, $tamanhoImg));

        $conexao->query("SET GLOBAL max_allowed_packet=1000000000") or die($conexao->error);

        // atualizando a foto de perfil do usuario
        $conexao->query("UPDATE  usuario SET ftPerfil = '$ftPerfil' WHERE usuarioID = '$id'") or die($conexao->error);

        // dando close no fopen para parar a leitura do arquivo
        fclose($handle);

        //volta pra pagina de perfil com a varivel consultar e o id do usuario e exibe a mensagem
        exibirMsg("Foto Salva Com Sucesso!", "success");
        if (isset($_SESSION['idAdm'])) {
          header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
        } else {
          header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
      } else {
        exibirMsg("Tamanho de Imagem não Suportada! (max : 1000 KB)", "danger");
        if (isset($_SESSION['idAdm'])) {
          header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
        } else {
          header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
        }
      }
    } else {
      // se a extensao do arquivo selecionado e invalida
      exibirMsg("Extensão Inválida!", "danger");
      if (isset($_SESSION['idAdm'])) {
        header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
      } else {
        header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
      }
    }
  } else {
    //se nao doi selecionado nenhum arquivo
    exibirMsg("Escolha uma Imagem antes de tentar Salvar!", "danger");
    if (isset($_SESSION['idAdm'])) {
      header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
    } else {
      header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }
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
    // atualizando o campo situacao na tabela usuario e de todas as tabelas q se relacionam com o usaurio
    $conexao->query("UPDATE usuario SET situacao = 'desativada' WHERE usuarioID = '$id'") or die($conexao->error);
    $conexao->query("UPDATE imovel SET situacao = 'Desativado' WHERE usuarioID = '$id' AND situacao = 'Ativado'") or die($conexao->error);
    $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID = '$id' AND situacao = 'Ativada'") or die($conexao->error);
    $conexao->query("UPDATE servico SET situacao = 'Desativado' WHERE usuarioID = '$id' AND situacao = 'Ativado'") or die($conexao->error);
    $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE usuarioID = '$id' AND situacao = 'Ativado'") or die($conexao->error);

    //dando um require em sair e exibindo a mensagem
    exibirMsg("Conta Desativada!", "danger");
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/sair.php');
  } else {
    //se a senha for diferente da do DB
    exibirMsg("Senha Incorreta!", "danger");
    header("location:/SMILIPS/view/pages/usuario/configuracoes.php");
  }
} else if (isset($_GET['notificacao_imgs_perfil'])) {

  // exibindo as mensagens das imagens de perfil do usuario
  $msg = $_GET['notificacao_imgs_perfil'];
  if ($msg == "Formato de Arquivo Inválido!") {
    $id = $_GET['id'];
    exibirMsg("Formato de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG)", "danger");
    if (isset($_SESSION['idAdm'])) {
      header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
    } else {
      header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }
  } else {
    $id = $_GET['id'];
    exibirMsg("Selecione uma Imagem!", "danger");
    if (isset($_SESSION['idAdm'])) {
      header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$id");
    } else {
      header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
    }
  }
} else if (isset($_POST['deletar_usuario'])) {
  $id = $_POST['usuarioID'];

  $conexao->query("DELETE FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

  exibirMsg("Usuario Deletado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/usuario/usuarios.php");
} else {
  //caso ao salvar aja dados obrigatorios em branco
  exibirMsg("Preencha todos os campos obrigatórios!", "danger");
  header("location:/SMILIPS/view/pages/cadastro.php");
}
