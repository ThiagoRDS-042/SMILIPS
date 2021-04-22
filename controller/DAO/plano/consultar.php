<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$plano = '';

function consultar()
{
  global $conexao, $planos;

  $planos = $conexao->query("SELECT * FROM plano") or die($conexao->error);
}

if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $plano = $conexao->query("SELECT * FROM plano WHERE planoID = '$id'") or die($conexao->error);
  $plano = $plano->fetch_assoc();
}
