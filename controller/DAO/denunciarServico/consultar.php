<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultarDenunciasServicoNExibidas()
{
  global $conexao, $denunciasServico;

  $denunciasServico = $conexao->query("SELECT * FROM denunciaServico AS ds INNER JOIN usuario AS u ON ds.usuarioID = u.usuarioID WHERE ds.exibida = 0") or die($conexao->error);
}

if (isset($_GET['denunciaServicoID'])) {
  $id = $_GET['denunciaServicoID'];

  $denunciaServico = $conexao->query("SELECT * FROM denunciaServico AS ds INNER JOIN usuario AS u ON ds.usuarioID = u.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID WHERE ds.denunciaServicoID = '$id'") or die($conexao->error);
  $denunciaServico = $denunciaServico->fetch_assoc();

  $servicoID = $denunciaServico['servicoID'];

  $prestador = $conexao->query("SELECT * FROM servico AS s INNER JOIN tipoServico AS ts ON s.tipoServicoID = ts.tipoServicoID INNER JOIN usuario AS u ON s.usuarioID = u.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID WHERE s.servicoID = '$servicoID'") or die($conexao->error);

  $_SESSION['servico'] = true;

  unset($_SESSION['imovel']);
}
