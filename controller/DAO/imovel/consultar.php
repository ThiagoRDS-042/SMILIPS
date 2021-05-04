<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


function consultarImovelUser()
{

  $arrayImgImovel = '';
  $arrayImovel = '';
  $imgImovel = '';

  global $conexao, $imovel, $arrayImgImovel, $arrayImovel;
  $id = $_SESSION['usuarioID'];

  if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel WHERE situacao = 'Em Progresso'") or die($conexao->error);
  } else {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE usuarioID = '$id'") or die($conexao->error);
  }

  $arrayImgImovel = [];
  $arrayImovel = [];


  while ($row = $imovel->fetch_assoc()) {
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = " . $row['imovelID']) or die($conexao->error);
    $arrayImgImovel[] = $imgImovel->fetch_assoc();
    $arrayImovel[] =  $row;
  }
}

function consultarImgsImovel()
{
  $imgImovel = '';

  global $conexao, $imovel, $imgImovel;
  $idImovel = $_GET['imovelID'];
  $idUsuario = $_SESSION['usuarioID'];

  if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel'") or die($conexao->error);
  } else {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel' AND usuarioID = '$idUsuario'") or die($conexao->error);
  }

  $imovel = $imovel->fetch_assoc();

  if ($imovel) {
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $imovel['imovelID']) or die($conexao->error);
  }
}
