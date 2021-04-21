<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$servico = '';

function consultar()
{
  global $conexao, $servicos;

  $servicos = $conexao->query("SELECT * FROM servico") or die($conexao->error);
}

if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $servico = $conexao->query("SELECT * FROM servico WHERE servicoID = '$id'") or die($conexao->error);
  $servico = $servico->fetch_assoc();
}
