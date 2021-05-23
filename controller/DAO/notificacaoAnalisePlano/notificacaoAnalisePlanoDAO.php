<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['avaliar'])) {
  $situacao = $_POST['avaliar'];
  $idPanoUsuario = $_POST['planoUsuarioID'];
  $mensagem = $_POST['descricao'];

  $plano = $conexao->query("SELECT * FROM planoUsuario AS pu INNER JOIN plano AS p ON pu.planoUsuarioID = '$idPanoUsuario' AND pu.planoId = p.planoID") or die($conexao->error);
  $plano = $plano->fetch_assoc();
  $idUser = $plano['usuarioID'];

  if ($situacao == 'Valido') {

    $dataInicio = date("Y-m-d");
    $dataFim =  preg_split("/-/", $dataInicio);
    $dataFim[2] += $plano['duracao'];
    while ($dataFim[2] > 30) {
      $dataFim[2] -= 30;
      $dataFim[1] += 1;

      while ($dataFim[1] > 12) {
        $dataFim[1] -= 12;
        $dataFim[0] += 1;
      }
    }

    if ($dataFim[2] < 10) {
      $dataFim[2] = '0' . $dataFim[2];
    }
    if ($dataFim[1] < 10) {
      $dataFim[1] = '0' . $dataFim[1];
    }

    $dataFim = implode("-", $dataFim);

    $conexao->query("INSERT INTO notificacaoAnalisePlano (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$idUser', 0)") or die($conexao->error);

    $conexao->query("UPDATE planoUsuario SET situacao = 'Ativado', dataInicio = '$dataInicio', dataFim = '$dataFim' WHERE planoUsuarioID = '$idPanoUsuario'") or die($conexao->error);
    exibirMsg("Plano Ativado com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/plano/planos.php");
  } else {
    if ($mensagem != null) {
      $conexao->query("INSERT INTO notificacaoAnalisePlano (mensagem, situacao, usuarioID, exibida) VALUES ('$mensagem', '$situacao', '$idUser', 0)") or die($conexao->error);

      $conexao->query("DELETE FROM planoUsuario WHERE planoUsuarioID = '$idPanoUsuario'") or die($conexao->error);
      exibirMsg("Plano Deletado!", "danger");
      header("location:/SMILIPS/view/pages/administrador/plano/planos.php");
    } else {
      exibirMsg("Infome o Motivo do Plano ser Invalido!", "danger");
      header("location:/SMILIPS/view/pages/administrador/plano/validarPlano.php?consultar=$idPanoUsuario");
    }
  }
} else if (isset($_POST['edity'])) {
  $idNotificacao = $_POST['idNotificacaoAnalisePLano'];
  $conexao->query("UPDATE notificacaoAnalisePlano set exibida = 1 WHERE notificacaoAnalisePlanoID = '$idNotificacao'") or die($conexao->error);
  header("location:/SMILIPS/view/pages/usuario/home.php");
}
