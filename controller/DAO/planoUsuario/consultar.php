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
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] < $dataHoje[1]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] == $dataHoje[1] && $dataPlano[2] <= $dataHoje[2]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);

      $propagandas = $conexao->query("SELECT * FROM propaganda WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);

      if ($propagandas->num_rows > 0) {
        $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
      }
    }
  }
}
