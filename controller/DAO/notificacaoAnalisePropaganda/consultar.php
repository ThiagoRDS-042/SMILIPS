<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
// consulta todos as notificações de analise de propaganda do usuario
function consultarNotificacaoAnalisePropaganda()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $notificacaoAnalisePropaganda;

  $notificacaoAnalisePropaganda = $conexao->query("SELECT * FROM notificacaoAnalisePropaganda WHERE usuarioID = '$id' AND exibida = 0") or die($conexao->error);
}
