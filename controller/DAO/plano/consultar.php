<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$plano = '';

// consultando todos os servicos cadastrados no DB
function consultar()
{
  global $conexao, $planos;

  $planos = $conexao->query("SELECT * FROM plano") or die($conexao->error);
}

// se a variavel get editar existir, consulte no DB um plano pelo id passado e transforme em array
if (isset($_GET['editar']) || isset($_GET['efetivar'])) {

  if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
  } else {
    $id = $_GET['efetivar'];
  }

  $plano = $conexao->query("SELECT * FROM plano WHERE planoID = '$id'") or die($conexao->error);
  $plano = $plano->fetch_assoc();
}
