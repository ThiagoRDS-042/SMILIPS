<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


function consultarImovelUser()
{

  $arrayImgImovel = '';
  $arrayImovel = '';
  $imgImovel = '';

  global $conexao, $imovel, $arrayImgImovel, $arrayImovel;

  if (isset($_GET['consultar'])) {
    $id = $_GET['consultar'];
  } else {
    $id = $_SESSION['usuarioID'];
  }

  if (isset($_GET['consultar'])) {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE usuarioID = '$id' ORDER BY situacao ASC") or die($conexao->error);
  } else if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel INNER JOIN usuario ON imovel.situacao = 'Em Analise' AND usuario.situacao = 'ativada' AND imovel.usuarioID = usuario.usuarioID") or die($conexao->error);
  } else {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE usuarioID = '$id' ORDER BY situacao ASC") or die($conexao->error);
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
  $usuario = '';

  global $conexao, $imovel, $imgImovel, $usuario;
  $idImovel = $_GET['imovelID'];

  if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel'") or die($conexao->error);
    $imovel = $imovel->fetch_assoc();

    $usuario = $conexao->query("SELECT * FROM usuario  WHERE usuarioID = " . $imovel['usuarioID']) or die($conexao->error);
    $usuario = $usuario->fetch_assoc();
  } else {
    $idUsuario = $_SESSION['usuarioID'];
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel' AND usuarioID = '$idUsuario'") or die($conexao->error);
    $imovel = $imovel->fetch_assoc();
  }

  if ($imovel) {
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $imovel['imovelID']) or die($conexao->error);
  }
}

function consultarImoveis()
{
  global $conexao, $matrizImoveis, $matrizImgsImovel;

  $imoveis = $conexao->query("SELECT * FROM imovel WHERE situacao = 'Ativado'") or die($conexao->error);

  for ($i = 0; $i < $imoveis->num_rows; $i++) {
    $matrizImoveis[] = $imoveis->fetch_assoc();
    $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $matrizImoveis[$i]['imovelID']) or die($conexao->error);

    for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
      $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
    }
  }
}
