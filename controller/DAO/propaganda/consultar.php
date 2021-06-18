<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$propagandaUser = '';
$propagandaUsuario = '';

// consulta as propagandas do usuario
function consultarPropagandasUser()
{
  if (isset($_SESSION['usuarioID'])) {
    $id = $_SESSION['usuarioID'];
  } else {
    $id = $_GET['consultar'];
  }

  global $conexao, $propagandas;

  // pesquisando as propagandas do usuario
  $propagandas = $conexao->query("SELECT * FROM propaganda WHERE usuarioID =  '$id' ORDER BY situacao ASC") or die($conexao->error);
}

// se a variavel editar existir, pesquisa a propaganda pelo seu id
if (isset($_GET['editar'])) {
  $id = $_GET['editar'];

  $propagandaUser = $conexao->query("SELECT * FROM propaganda WHERE propagandaID =  '$id'") or die($conexao->error);
  $propagandaUser = $propagandaUser->fetch_assoc();
}

// consulta as propagandas em analise
function consultarPropagandasEmAnalise()
{
  global $conexao, $propagandasEmAnalise;

  // pesquisano as propagandas em analise
  $propagandasEmAnalise = $conexao->query("SELECT p.propagandaID, p.usuarioID, p.propaganda FROM propaganda as p INNER JOIN planoUsuario as pu ON p.situacao = 'Em analise' AND pu.usuarioID = p.usuarioID AND pu.situacao = 'Ativado'") or die($conexao->error);
}

// se consultar existir, pesquisa as propagandas e o usuario pelo id da propaganda
if (isset($_GET['consultar'])) {
  $idPropaganda = $_GET['consultar'];

  $propagandaUsuario = $conexao->query("SELECT * FROM propaganda as p INNER JOIN usuario as u ON p.propagandaID = '$idPropaganda' AND u.usuarioID = p.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID") or die($conexao->error);

  $propagandaUsuario = $propagandaUsuario->fetch_assoc();
}

function consultarPropagandasPremium()
{
  global $conexao, $propagandasPremium, $primeiraPropaganda;

  // pesquisano as propagandas em analise
  $propagandasPremium = $conexao->query("SELECT * FROM propaganda AS p INNER JOIN planoUsuario AS pu ON p.usuarioID = pu.usuarioID INNER JOIN plano AS plan ON pu.planoID = plan.planoID WHERE p.situacao = 'Ativada' AND plan.nome = 'Premium'") or die($conexao->error);
  $primeiraPropaganda = $conexao->query("SELECT * FROM propaganda AS p INNER JOIN planoUsuario AS pu ON p.usuarioID = pu.usuarioID INNER JOIN plano AS plan ON pu.planoID = plan.planoID WHERE p.situacao = 'Ativada' AND plan.nome = 'Premium' LIMIT 1") or die($conexao->error);
  $primeiraPropaganda =   $primeiraPropaganda->fetch_assoc();
}

function consultarPropagandasAtivas()
{
  global $conexao, $propagandasAtivas;

  // pesquisano as propagandas em analise
  $propagandasAtivas = $conexao->query("SELECT * FROM propaganda AS p INNER JOIN planoUsuario AS pu ON p.usuarioID = pu.usuarioID INNER JOIN plano AS plan ON pu.planoID = plan.planoID WHERE p.situacao = 'Ativada' AND plan.nome != 'Premium' ORDER BY RAND() LIMIT 3") or die($conexao->error);
}
