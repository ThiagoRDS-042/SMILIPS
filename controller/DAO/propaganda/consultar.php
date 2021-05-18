<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


function consultarPropagandasUser()
{
  $id = $_SESSION['usuarioID'];
  global $conexao, $propagandas;

  $propagandas = $conexao->query("SELECT * FROM propaganda WHERE usuarioID =  '$id'") or die($conexao->error);
}
