<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultarNotificacaoServico()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $notificacaoServico;

  $notificacaoServico = $conexao->query("SELECT * FROM notificacaoServico WHERE usuarioID = '$id' AND exibida = 0") or die($conexao->error);
}
