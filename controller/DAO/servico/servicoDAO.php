<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');


if (isset($_POST['salvar'])) {
  $tipoServico = $_POST['type'];

  if ($tipoServico) {
    $usuarioID = $_POST['idUser'];
    $descricao = $_POST['descricao'];

    $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServico = '$tipoServico'") or die($conexao->error);
    $tipoServico = $tipoServico->fetch_assoc();
    $tipoServicoID = $tipoServico['tipoServicoID'];

    $conexao->query("INSERT INTO servico (descricao, tipoServicoID, usuarioID) VALUES ('$descricao', '$usuarioID', '$tipoServicoID')") or die($conexao->error);

    exibirMsg("Serviço Cadastrado!", "success");
    header("location:/SMILIPS/view/pages/servicos/cadastro.php");
  } else {
    exibirMsg("Selecione um Tipo de Serviço!", "danger");
    header("location:/SMILIPS/view/pages/servicos/cadastro.php");
  }
}
