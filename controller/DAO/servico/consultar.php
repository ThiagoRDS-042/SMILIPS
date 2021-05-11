<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


function consultarServico()
{
  global $conexao, $arrayServicos, $arrayTipoServicos, $arrayIdServicos, $arraySituacao;
  if (isset($_SESSION['idAdm'])) {
    $id = $_GET['consultar'];
  } else {
    $id = $_SESSION['usuarioID'];
  }

  $arrayServicos = [];
  $arrayTipoServicos = [];
  $arrayIdServicos = [];
  $arraySituacao = [];

  $servico = $conexao->query("SELECT * FROM servico WHERE usuarioID = '$id'") or die($conexao->error);

  while ($row = $servico->fetch_assoc()) {
    $idTipoServico = $row['tipoServicoID'];
    $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServicoID = '$idTipoServico'") or die($conexao->error);
    $tipoServico = $tipoServico->fetch_assoc();

    $arrayIdServicos[] = $row['servicoID'];
    $arrayServicos[] = $row['descricao'];
    $arrayTipoServicos[] = $tipoServico['tipoServico'];
    $arraySituacao[] = $row['situacao'];
  }
}

if (isset($_GET['servicoID']) || isset($_GET['editar'])) {
  if (isset($_GET['servicoID'])) {
    $id = $_GET['servicoID'];
  } else {
    $id = $_GET['editar'];
  }

  $editarServico = $conexao->query("SELECT * FROM servico WHERE servicoID = '$id'") or die($conexao->error);
  $editarServico = $editarServico->fetch_assoc();
  $idTipoServico =  $editarServico['tipoServicoID'];

  $servicoTipo = $conexao->query("SELECT * FROM tipoServico WHERE tipoServicoID = '$idTipoServico'") or die($conexao->error);
  $servicoTipo = $servicoTipo->fetch_assoc();
}
