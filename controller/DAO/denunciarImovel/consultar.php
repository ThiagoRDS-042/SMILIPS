<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultarDenunciasImovelNExibidas()
{
  global $conexao, $denunciasImovel;

  $denunciasImovel = $conexao->query("SELECT * FROM denunciaImovel AS di INNER JOIN usuario AS u ON di.usuarioID = u.usuarioID WHERE di.exibida = 0") or die($conexao->error);
}

if (isset($_GET['denunciaImovelID'])) {
  $id = $_GET['denunciaImovelID'];

  $denunciaImovel = $conexao->query("SELECT * FROM denunciaImovel AS di INNER JOIN usuario AS u ON di.usuarioID = u.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID WHERE di.denunciaImovelID = '$id'") or die($conexao->error);
  $denunciaImovel = $denunciaImovel->fetch_assoc();

  $imovelID = $denunciaImovel['imovelID'];

  $proprietario = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.imovelID = ei.imovelID INNER JOIN usuario AS u ON i.usuarioID = u.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID WHERE i.imovelID = '$imovelID'") or die($conexao->error);

  $imovelDenunciado = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.imovelID = ei.imovelID WHERE i.imovelID = '$imovelID'") or die($conexao->error);
  $imovelDenunciado = $imovelDenunciado->fetch_assoc();

  $imgsImovelUsuario = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = '$imovelID'") or die($conexao->error);

  $_SESSION['imovel'] = true;
  unset($_SESSION['servico']);
}
