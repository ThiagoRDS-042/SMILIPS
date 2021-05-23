<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$propagandaUser = '';
$propagandaUsuario = '';

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

function consultarPropagandasEmAnalise()
{
  global $conexao, $propagandasEmAnalise;

  $propagandasEmAnalise = $conexao->query("SELECT p.propagandaID, p.usuarioID, p.propaganda FROM propaganda as p INNER JOIN planoUsuario as pu ON p.situacao = 'Em analise' AND pu.usuarioID = p.usuarioID AND pu.situacao = 'Ativado'") or die($conexao->error);
}

if (isset($_GET['consultar'])) {
  $idPropaganda = $_GET['consultar'];

  $propagandaUsuario = $conexao->query("SELECT * FROM propaganda as p INNER JOIN usuario as u ON p.propagandaID = '$idPropaganda' AND u.usuarioID = p.usuarioID") or die($conexao->error);

  $propagandaUsuario = $propagandaUsuario->fetch_assoc();
}
