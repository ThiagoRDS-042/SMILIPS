<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
// consulta todos as notificações de analise de imovel do usuario
function consultarNotificacaoAnaliseImovel()
{

  $id = $_SESSION['usuarioID'];
  global $conexao, $notificacaoAnaliseImovel;

  $notificacaoAnaliseImovel = $conexao->query("SELECT * FROM notificacaoAnaliseImovel WHERE usuarioID = '$id' AND exibida = 0") or die($conexao->error);
}
