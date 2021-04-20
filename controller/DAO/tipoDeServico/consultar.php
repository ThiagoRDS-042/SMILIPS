<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultar()
{
  global $conexao, $tipoDeServico;

  $tipoDeServico = $conexao->query("SELECT * FROM tipoDeServico") or die($conexao->error);
}
