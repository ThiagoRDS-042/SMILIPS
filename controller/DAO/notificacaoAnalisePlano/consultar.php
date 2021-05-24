<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
// consulta todos as notificações de analise de plano do usuario
function consultarNotificacaoAnalisePlano()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $notificacaoAnalisePlano;

  $notificacaoAnalisePlano = $conexao->query("SELECT * FROM notificacaoAnalisePlano WHERE usuarioID = '$id' AND exibida = 0") or die($conexao->error);
}
