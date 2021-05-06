<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$tipoServico = '';

// consultando todos os servicos cadastrados no DB
function consultar()
{
  global $conexao, $tipoServicos;

  $tipoServicos = $conexao->query("SELECT * FROM tipoServico") or die($conexao->error);
}

// se a variavel get editar existir, consulte no DB um servico pelo id passado e transforme em array
if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $tipoServico = $conexao->query("SELECT * FROM tipoServico WHERE tipoServicoID = '$id'") or die($conexao->error);
  $tipoServico = $servico->fetch_assoc();
}
