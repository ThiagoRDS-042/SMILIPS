<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

// consulta os serviçõs do usuario
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

  // pesquisa os serviços do usuario
  $servico = $conexao->query("SELECT * FROM servico WHERE usuarioID = '$id'") or die($conexao->error);

  // pesquisa os tipos de serviços presentes nos serviços do usuario
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

  // pesquisa o serviço pelo id
  $editarServico = $conexao->query("SELECT * FROM servico WHERE servicoID = '$id'") or die($conexao->error);
  $editarServico = $editarServico->fetch_assoc();
  $idTipoServico =  $editarServico['tipoServicoID'];

  // pesquisa o tipo de serviço pelo id
  $servicoTipo = $conexao->query("SELECT * FROM tipoServico WHERE tipoServicoID = '$idTipoServico'") or die($conexao->error);
  $servicoTipo = $servicoTipo->fetch_assoc();
}

function consultarServicos()
{
  global $conexao, $servicos;

  $servicos = $conexao->query("SELECT s.servicoID, s.descricao, ts.tipoServico, u.ftPerfil, u.nomeUsuario FROM servico AS s INNER JOIN tipoServico AS ts ON s.tiposervicoID = ts.tiposervicoID INNER JOIN usuario AS u ON s.usuarioID = u.usuarioID WHERE s.situacao = 'Ativado' ORDER BY ts.tipoServico ASC") or die($conexao->error);
}
