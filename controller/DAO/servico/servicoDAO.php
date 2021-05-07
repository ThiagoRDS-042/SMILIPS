<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');


if (isset($_POST['salvar'])) {
  $tipoServico = $_POST['type'];

  if ($tipoServico) {
    $idUsuario = $_POST['idUser'];
    $descricao = $_POST['descricao'];

    $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServico = '$tipoServico'") or die($conexao->error);
    $tipoServico = $tipoServico->fetch_assoc();
    $tipoServicoID = $tipoServico['tipoServicoID'];

    $servicoValido = $conexao->query("SELECT * FROM servico WHERE usuarioID = '$idUsuario' AND tipoServicoID = '$tipoServicoID'") or die($conexao->error);

    if ($servicoValido->num_rows == 0) {
      $conexao->query("INSERT INTO servico (descricao, tipoServicoID, usuarioID) VALUES ('$descricao', '$tipoServicoID', '$idUsuario')") or die($conexao->error);

      exibirMsg("Serviço Cadastrado!", "success");
      header("location:/SMILIPS/view/pages/usuario/home.php");
    } else {
      exibirMsg("Serviço já Existente!", "danger");
      header("location:/SMILIPS/view/pages/usuario/home.php");
    }
  } else {
    exibirMsg("Selecione um Tipo de Serviço!", "danger");
    header("location:/SMILIPS/view/pages/servico/cadastro.php");
  }
}
