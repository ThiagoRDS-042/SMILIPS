<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['avaliar'])) {
  $situacao = $_POST['avaliar'];
  $idPropaganda = $_POST['propagandaID'];
  $mensagem = $_POST['descricao'];

  $usuarioID = $conexao->query("SELECT * FROM propaganda WHERE propagandaID = '$idPropaganda'") or die($conexao->error);
  $usuarioID = $usuarioID->fetch_assoc();
  $usuarioID = $usuarioID['usuarioID'];

  if ($situacao == 'Valida') {

    $conexao->query("INSERT INTO notificacaoAnalisePropaganda (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$usuarioID', 0)") or die($conexao->error);

    $conexao->query("UPDATE propaganda SET situacao = 'Ativada' WHERE propagandaID = '$idPropaganda'") or die($conexao->error);
    exibirMsg("Propaganda Ativada com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/propaganda/propagandas.php");
  } else {
    if ($mensagem != null) {

      $conexao->query("INSERT INTO notificacaoAnalisePropaganda (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$usuarioID', 0)") or die($conexao->error);

      $conexao->query("DELETE FROM propaganda WHERE propagandaID = '$idPropaganda'") or die($conexao->error);
      exibirMsg("Propaganda Deletada!", "danger");
      header("location:/SMILIPS/view/pages/administrador/propaganda/propagandas.php");
    } else {
      exibirMsg("Infome o Motivo do Plano ser Invalido!", "danger");
      header("location:/SMILIPS/view/pages/administrador/propaganda/validarPropaganda.php?consultar=$idPropaganda");
    }
  }
}
