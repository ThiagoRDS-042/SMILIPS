<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
function consultarNotificacaoAnaliseImovel()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $msgImovelInvalido;

  $msgImovelInvalido = $conexao->query("SELECT * FROM msgImovelInvalido WHERE usuarioID = '$id' ORDER BY msgImovelInvalidoID DESC") or die($conexao->error);

  if ($msgImovelInvalido->num_rows > 0) {
    $msgImovelInvalido = $msgImovelInvalido->fetch_assoc();
    $msgImovelInvalido = $msgImovelInvalido['mensagem'];
    // exibirMsg("Seu Imóvel não foi Aceito por apresentar $msgImovelInvalido", "danger");
  }
}
