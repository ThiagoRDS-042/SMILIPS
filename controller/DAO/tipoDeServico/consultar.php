<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$tipoDeServico = '';

function consultar()
{
  global $conexao, $tiposDeServicos;

  $tiposDeServicos = $conexao->query("SELECT * FROM tipoDeServico") or die($conexao->error);
}

if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $tipoDeServico = $conexao->query("SELECT * FROM tipoDeServico WHERE tipoDeServicoID = '$id'") or die($conexao->error);
  $tipoDeServico = $tipoDeServico->fetch_assoc();
}
