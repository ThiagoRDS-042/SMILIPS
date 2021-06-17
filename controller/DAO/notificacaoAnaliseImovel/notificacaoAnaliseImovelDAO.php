<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

// cria a notificação de analise de imovel, seja de deleção ou ativação
if (isset($_POST['analisar'])) {

  $situacao = $_POST['analisar'];
  $idImovel = $_POST['id'];
  $mensagem = $_POST['descricao'];

  if ($situacao == 'Excluido') {
    if ($mensagem != null) {
      $usuarioID = $conexao->query("SELECT * FROM imovel WHERE imovelID = '$idImovel'") or die($conexao->error);
      $usuarioID = $usuarioID->fetch_assoc();
      $usuarioID = $usuarioID['usuarioID'];

      $conexao->query("INSERT INTO notificacaoAnaliseImovel (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$usuarioID', 0)") or die($conexao->error);

      $conexao->query("DELETE FROM imovel WHERE imovelID = '$idImovel'") or die($conexao->error);
      exibirMsg("Imóvel Excluído!", "danger");
      header("location:/SMILIPS/view/pages/administrador/imovel/imoveis.php");
    } else {
      exibirMsg("Infome o Motivo do Imóvel ser Invalido!", "danger");
      header("location:/SMILIPS/view/pages/administrador/imovel/validarImovel.php?imovelID=$idImovel");
    }
  } else {
    $usuarioID = $conexao->query("SELECT * FROM imovel WHERE imovelID = '$idImovel'") or die($conexao->error);
    $usuarioID = $usuarioID->fetch_assoc();
    $usuarioID = $usuarioID['usuarioID'];

    $conexao->query("INSERT INTO notificacaoAnaliseImovel (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$usuarioID', 0)") or die($conexao->error);

    $conexao->query("UPDATE imovel set situacao = 'Ativado' WHERE imovelID = '$idImovel'") or die($conexao->error);
    exibirMsg("Imóvel Ativado!", "success");
    header("location:/SMILIPS/view/pages/administrador/imovel/imoveis.php");
  }
} else if (isset($_POST['edity'])) {
  // edita a notificação como ja exibida
  $idNotificacao = $_POST['id'];
  $url = $_POST['url'];
  $conexao->query("UPDATE notificacaoAnaliseImovel set exibida = 1 WHERE notificacaoAnaliseImovelID = '$idNotificacao'") or die($conexao->error);
  header("location:$url");
}
