<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
function consultarNotificacaoAnalisePlano()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $notificacaoAnalisePlano;

  $notificacaoAnalisePlano = $conexao->query("SELECT * FROM notificacaoAnalisePlano WHERE usuarioID = '$id' AND exibida = 0") or die($conexao->error);
}
