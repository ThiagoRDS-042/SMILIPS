<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

function consultarDataFim()
{
  global $conexao;
  $dataHoje = preg_split("/-/", date("Y-m-d"));

  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario WHERE situacao = 'Ativado'") or die($conexao->error);


  while ($row = $planoUsuario->fetch_assoc()) {

    $dataPlano = preg_split("/-/", $row['dataFim']);

    if ($dataPlano[0] < $dataHoje[0]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] < $dataHoje[1]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] == $dataHoje[1] && $dataPlano[2] > $dataHoje[2]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    }
  }
}


function consultarPlano()
{

  global $conexao, $planoUsuario, $plano;
  $id = $_SESSION['usuarioID'];

  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario INNER JOIN plano on planoUsuario.usuarioID = '$id' AND planoUsuario.situacao != 'Desativado' AND plano.planoID = planoUsuario.planoID") or die($conexao->error);

  if ($planoUsuario->num_rows > 0) {

    $url = str_replace("/Novo/", "", $_SERVER["REQUEST_URI"]);
    if ($url != "/SMILIPS/view/pages/plano/situacaoPlano.php" && $url != '/SMILIPS/view/pages/plano/escolherPlano.php?planoNome') {
      header("location:/SMILIPS/view/pages/plano/situacaoPlano.php");
    }

    $planoUsuario = $planoUsuario->fetch_assoc();
    $plano = $planoUsuario['nome'];
  }
}
