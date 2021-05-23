<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['editar-email'])) {
  //pegando o id do usuario
  $id = $_POST['id'];
  $email = $_POST['email'];

  // pesquisando um usuario pelo email
  $emailInvalido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");

  // se n existir o email
  if ($emailInvalido->num_rows <= 0) {
    // att a tabela de adm com o email passado apartir do id
    $conexao->query("UPDATE administrador SET email = '$email' WHERE administradorID = '$id'") or die($conexao->error);

    exibirMsg("Email Atualizado com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/adm/conta.php?consultar=$id");
  } else {
    exibirMsg("Email já Cadastrado!", "danger");
    header("location:/SMILIPS/view/pages/administrador/adm/conta.php?consultar=$id");
  }
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

        //atualizando a senha do adm
        $conexao->query("UPDATE administrador SET senha = '$senha' WHERE administradorID = '$id'") or die($conexao->error);

        //volta pra tela de editar senha e exibi a mensgem
        exibirMsg("Senha Editada com Sucesso!", "success");
        header("location:/SMILIPS/view/pages/administrador/adm/editarSenha.php");
      } else {
        //se a senha e invalida
        exibirMsg("Senha Inválida!", "danger");
        header("location:/SMILIPS/view/pages/administrador/adm/editarSenha.php");
      }
    } else {
      //se as senha sao diferentes
      exibirMsg("Senhas Diferentes!", "danger");
      header("location:/SMILIPS/view/pages/administrador/adm/editarSenha.php");
    }
  } else {
    // se a campos em branco
    exibirMsg("Preencha todos os campos obrigatórios(*)!", "danger");
    header("location:/SMILIPS/view/pages/administrador/adm/editarSenha.php");
  }
} else if (isset($_POST['analisar'])) {

  $analise = $_POST['analisar'];
  $id = $_POST['id'];

  if ($analise == 'excluir') {
    $usuarioID = $conexao->query("SELECT * FROM imovel WHERE imovelID = '$id'") or die($conexao->error);
    $usuarioID = $usuarioID->fetch_assoc();
    $usuarioID = $usuarioID['usuarioID'];

    $descricao = $_POST['descricao'];

    $conexao->query("DELETE FROM imovel WHERE imovelID = '$id'") or die($conexao->error);

    $conexao->query("INSERT INTO msgImovelInvalido (mensagem, usuarioID) VALUES ('$descricao', '$usuarioID')") or die($conexao->error);

    exibirMsg("Imóvel Excluído!", "success");
  } else {
    $conexao->query("UPDATE imovel set situacao = 'Ativado' WHERE imovelID = '$id'") or die($conexao->error);
    exibirMsg("Imóvel Ativado!", "success");
  }

  header("location:/SMILIPS/view/pages/administrador/imovel/imoveis.php");
}
