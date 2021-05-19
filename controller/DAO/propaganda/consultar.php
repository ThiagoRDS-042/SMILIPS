<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$propagandaUser = '';


function consultarPropagandasUser()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $propagandas;

  $propagandas = $conexao->query("SELECT * FROM propaganda WHERE usuarioID =  '$id' ORDER BY situacao ASC") or die($conexao->error);
}

if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $propagandaUser = $conexao->query("SELECT * FROM propaganda WHERE propagandaID =  '$id'") or die($conexao->error);
  $propagandaUser = $propagandaUser->fetch_assoc();
}
