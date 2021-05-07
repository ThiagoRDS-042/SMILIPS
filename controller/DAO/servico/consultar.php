<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


function consultarServico()
{
  global $conexao, $arrayServicos, $arrayTipoServicos, $arrayIdServicos;
  $id = $_SESSION['usuarioID'];
  $arrayServicos = [];
  $arrayTipoServicos = [];
  $arrayIdServicos = [];

  $servico = $conexao->query("SELECT * FROM servico WHERE usuarioID = '$id'") or die($conexao->error);

  while ($row = $servico->fetch_assoc()) {
    $idTipoServico = $row['tipoServicoID'];
    $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServicoID = '$idTipoServico'") or die($conexao->error);
    $tipoServico = $tipoServico->fetch_assoc();

    $arrayIdServicos[] = $row['servicoID'];
    $arrayServicos[] = $row['descricao'];
    $arrayTipoServicos[] = $tipoServico['tipoServico'];
  }
}
