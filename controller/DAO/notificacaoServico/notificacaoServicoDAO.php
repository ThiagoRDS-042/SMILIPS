<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['edity'])) {
  // edita a notificação como ja exibida
  $idNotificacao = $_POST['id'];
  $url = $_POST['url'];
  $conexao->query("UPDATE notificacaoServico set exibida = 1 WHERE notificacaoServicoID = '$idNotificacao'") or die($conexao->error);
  header("location:$url");
}
