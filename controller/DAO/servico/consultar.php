<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$servico = '';

// consultando todos os servicos cadastrados no DB
function consultar()
{
  global $conexao, $servicos;

  $servicos = $conexao->query("SELECT * FROM servico") or die($conexao->error);
}

// se a variavel get editar existir, consulte no DB um servico pelo id passado e transforme em array
if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $servico = $conexao->query("SELECT * FROM servico WHERE servicoID = '$id'") or die($conexao->error);
  $servico = $servico->fetch_assoc();
}
