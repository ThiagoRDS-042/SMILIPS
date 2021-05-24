<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

// consulta todos os imoveis do usuario e suas imagens
function consultarImovelUser()
{

  $arrayImgImovel = '';
  $arrayImovel = '';
  $imgImovel = '';

  global $conexao, $imovel, $arrayImgImovel, $arrayImovel;

  // se a variavel consultar existir pege o valor dela se n, pege o valor de usuarioID
  if (isset($_GET['consultar'])) {
    $id = $_GET['consultar'];
  } else {
    $id = $_SESSION['usuarioID'];
  }

  // pesquisando imoveis do usuario
  if (isset($_GET['consultar'])) {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE usuarioID = '$id' ORDER BY situacao ASC") or die($conexao->error);
  } else if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel INNER JOIN usuario ON imovel.situacao = 'Em Analise' AND usuario.situacao = 'ativada' AND imovel.usuarioID = usuario.usuarioID") or die($conexao->error);
  } else {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE usuarioID = '$id' ORDER BY situacao ASC") or die($conexao->error);
  }

  $arrayImgImovel = [];
  $arrayImovel = [];


  // pegando a primeira img de cada imovel
  while ($row = $imovel->fetch_assoc()) {
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = " . $row['imovelID']) or die($conexao->error);
    $arrayImgImovel[] = $imgImovel->fetch_assoc();
    $arrayImovel[] =  $row;
  }
}

// consulta todos as imgs de um imovel
function consultarImgsImovel()
{
  $imgImovel = '';
  $usuario = '';

  global $conexao, $imovel, $imgImovel, $usuario;
  $idImovel = $_GET['imovelID'];

  // pesquisando imoveis pelo id e usuario pelo id
  if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel'") or die($conexao->error);
    $imovel = $imovel->fetch_assoc();

    $usuario = $conexao->query("SELECT * FROM usuario  WHERE usuarioID = " . $imovel['usuarioID']) or die($conexao->error);
    $usuario = $usuario->fetch_assoc();
  } else {
    // pesquisando imovel pelo seu id e do usuario
    $idUsuario = $_SESSION['usuarioID'];
    $imovel = $conexao->query("SELECT * FROM imovel  WHERE imovelID = '$idImovel' AND usuarioID = '$idUsuario'") or die($conexao->error);
    $imovel = $imovel->fetch_assoc();
  }

  // pesquisando todas as imgs do imovel
  if ($imovel) {
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $imovel['imovelID']) or die($conexao->error);
  }
}

// consulta todos os imoveis disponiveis no DB
function consultarImoveis()
{
  global $conexao, $matrizImoveis, $matrizImgsImovel;

  // pesquisando todos os imoveis do DB 
  $imoveis = $conexao->query("SELECT * FROM imovel WHERE situacao = 'Ativado'") or die($conexao->error);

  // pesquidando todas as imgs dos imoveis
  for ($i = 0; $i < $imoveis->num_rows; $i++) {
    $matrizImoveis[] = $imoveis->fetch_assoc();
    $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $matrizImoveis[$i]['imovelID']) or die($conexao->error);

    for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
      $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
    }
  }
}
