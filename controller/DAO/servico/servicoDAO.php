<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['salvar'])) {
  $tipoServico = $_POST['type'];

  if ($tipoServico) {
    $idUsuario = $_POST['idUser'];
    $descricao = $_POST['descricao'];

    // pesquisa o tipo de serviço
    $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServico = '$tipoServico'") or die($conexao->error);
    $tipoServico = $tipoServico->fetch_assoc();
    $tipoServicoID = $tipoServico['tipoServicoID'];

    // pesquisa se o usuairo ja n possui este serviço
    $servicoValido = $conexao->query("SELECT * FROM servico WHERE usuarioID = '$idUsuario' AND tipoServicoID = '$tipoServicoID'") or die($conexao->error);

    if ($servicoValido->num_rows == 0) {
      // cadastra o serviço
      $conexao->query("INSERT INTO servico (descricao, situacao, tipoServicoID, usuarioID) VALUES ('$descricao', 'Ativado', '$tipoServicoID', '$idUsuario')") or die($conexao->error);

      exibirMsg("Serviço Cadastrado!", "success");
      header("location:/SMILIPS/view/pages/servico/cadastro.php");
    } else {
      exibirMsg("Serviço já Existente!", "danger");
      header("location:/SMILIPS/view/pages/servico/cadastro.php");
    }
  } else {
    exibirMsg("Selecione um Tipo de Serviço!", "danger");
    header("location:/SMILIPS/view/pages/servico/cadastro.php");
  }
} else if (isset($_POST['editar'])) {
  $idServico = $_POST['idServico'];
  $idUsuario = $_POST['idUsuario'];
  $tipoServico = $_POST['type'];
  $descricao = $_POST['descricao'];

  // pesquisa o tipo de serviço
  $servicoID = $conexao->query("SELECT * FROM servico WHERE servicoID = '$idServico'") or die($conexao->error);
  $servicoID = $servicoID->fetch_assoc();
  $servicoID = $servicoID['tipoServicoID'];

  $tipoServicoID = $conexao->query("SELECT * FROM tipoServico WHERE tipoServico = '$tipoServico'") or die($conexao->error);
  $tipoServicoID = $tipoServicoID->fetch_assoc();
  $tipoServicoID = $tipoServicoID['tipoServicoID'];

  if ($tipoServicoID == $servicoID) {
    // atualiza o servico
    $conexao->query("UPDATE servico SET tipoServicoID = '$tipoServicoID', descricao = '$descricao' WHERE servicoID = '$idServico'") or die($conexao->error);

    exibirMsg("Serviço Atualizado com Sucesso!", "success");
    if (isset($_SESSION['idAdm'])) {
      header("location:/SMILIPS/view/pages/administrador/servico/gerenciarServicos.php?servicoID=$idServico&&usuarioID=$idUsuario");
    } else {
      header("location:/SMILIPS/view/pages/servico/gerenciarServico.php?editar=$idServico");
    }
  } else {
    // pesquisa se ja existe o servico cadastrado
    $servicoCadastrado = $conexao->query("SELECT * FROM servico WHERE tipoServicoID = '$tipoServicoID' AND usuarioID = '$idUsuario'") or die($conexao->error);

    if ($servicoCadastrado->num_rows == 0) {
      // se nao atualiza o serviço, ou seja, o usuario nao pode ter dois serviços iguais
      $conexao->query("UPDATE servico SET tipoServicoID = '$tipoServicoID', descricao = '$descricao' WHERE servicoID = '$idServico'") or die($conexao->error);

      exibirMsg("Serviço Atualizado com Sucesso!", "success");
      if (isset($_SESSION['idAdm'])) {
        header("location:/SMILIPS/view/pages/administrador/servico/gerenciarServicos.php?servicoID=$idServico&&usuarioID=$idUsuario");
      } else {
        header("location:/SMILIPS/view/pages/servico/gerenciarServico.php?editar=$idServico");
      }
    } else {
      exibirMsg("Serviço Já Existente!", "danger");
      if (isset($_SESSION['idAdm'])) {
        header("location:/SMILIPS/view/pages/administrador/servico/gerenciarServicos.php?servicoID=$idServico&&usuarioID=$idUsuario");
      } else {
        header("location:/SMILIPS/view/pages/servico/gerenciarServico.php?editar=$idServico");
      }
    }
  }
} else if (isset($_POST['desativar-ativar'])) {
  // ativa, desativa e excluir serviços de acordo com cada situação

  if ($_POST['desativar-ativar'] == 'Excluir') {
    $id = $_POST['idServico'];
    $idUsuario = $_POST['idUsuario'];
    $url = $_POST['url'];

    if ($_POST['motivo'] != null) {
      $motivo = $_POST['motivo'];
      // $conexao->query("DELETE FROM servico WHERE servicoID = '$id'") or die($conexao->error);

      $conexao->query("INSERT INTO notificacaoServico(mensagem, situacao, usuarioID, exibida) VALUES ('$motivo', 'Excluido', '$idUsuario', 0)") or die($conexao->error);

      exibirMsg("Serviço Excluido com Sucesso!", "success");
      if ($url == "http://localhost/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$idUsuario") {
        header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$idUsuario");
      } else {
        header("location:/SMILIPS/view/pages/administrador/denuncia/denuncias.php");
      }
    } else {
      exibirMsg("Por Favor Informe o Motivo Para a Deleção do Serviço!", "danger");
      header("location:/SMILIPS/view/pages/administrador/servico/gerenciarServicos.php?servicoID=$id&&usuarioID=$idUsuario");
    }
  } else {
    $situacao = $_POST['desativar-ativar'];
    $id = $_POST['idServico'];
    $idUsuario = $_POST['idUsuario'];
    $senha = md5($_POST['senha']);

    $senhaUsuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$idUsuario'") or die($conexao->error);
    $senhaUsuario = $senhaUsuario->fetch_assoc();
    $senhaUsuario = $senhaUsuario['senhaUsuario'];

    if ($senhaUsuario == $senha) {
      $conexao->query("UPDATE servico SET situacao = '$situacao' WHERE servicoID = '$id'") or die($conexao->error);

      exibirMsg("Serviço $situacao com Sucesso!", "success");
      header("location:/SMILIPS/view/pages/usuario/home.php");
    } else {
      exibirMsg("Senha Incorreta!", "danger");
      header("location:/SMILIPS/view/pages/servico/gerenciarServico.php?editar=$id");
    }
  }
}
