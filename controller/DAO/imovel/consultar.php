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
    $imovel = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.usuarioID = '$id' AND i.imovelID = ei.imovelID ORDER BY i.situacao ASC") or die($conexao->error);
  } else if (isset($_SESSION['idAdm'])) {
    $imovel = $conexao->query("SELECT * FROM imovel AS i INNER JOIN usuario AS u ON i.situacao = 'Em Analise' AND u.situacao = 'ativada' AND i.usuarioID = u.usuarioID INNER JOIN enderecoImovel AS ei ON i.imovelID = ei.imovelID") or die($conexao->error);
  } else {
    $imovel = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.usuarioID = '$id' AND i.imovelID = ei.imovelID ORDER BY i.situacao ASC") or die($conexao->error);
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
    $imovel = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.imovelID = '$idImovel' AND ei.imovelID = i.imovelID") or die($conexao->error);
    $imovel = $imovel->fetch_assoc();

    $usuario = $conexao->query("SELECT * FROM usuario AS u INNER JOIN enderecoUsuario AS eu ON u.usuarioID = " . $imovel['usuarioID'] . " AND eu.usuarioID = u.usuarioID") or die($conexao->error);
    $usuario = $usuario->fetch_assoc();
  } else {
    // pesquisando imovel pelo seu id e do usuario
    $idUsuario = $_SESSION['usuarioID'];
    $imovel = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.imovelID = '$idImovel' AND i.usuarioID = '$idUsuario' AND i.imovelID = ei.imovelID") or die($conexao->error);
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
  global $conexao, $matrizImoveis, $matrizImgsImovel, $imoveis;

  // pesquisando todos os imoveis do DB 
  $url = str_replace("/Novo/", "", $_SERVER["REQUEST_URI"]);
  if ($url == "/SMILIPS/view/pages/sistema/imoveis.php") {
    $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID ORDER BY i.valorAluguel ASC") or die($conexao->error);
  } else {
    $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID ORDER BY i.imovelID DESC LIMIT 6") or die($conexao->error);
  }

  // pesquidando todas as imgs dos imoveis
  for ($i = 0; $i < $imoveis->num_rows; $i++) {
    $matrizImoveis[] = $imoveis->fetch_assoc();
    global $imgsImovel;

    if ($url == "/SMILIPS/view/pages/sistema/imoveis.php") {
      $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = " . $matrizImoveis[$i]['imovelID'] . " LIMIT 5") or die($conexao->error);
    } else {
      $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = " . $matrizImoveis[$i]['imovelID'] . " LIMIT 1") or die($conexao->error);
    }

    for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
      $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
    }
  }
}

function consultarBairros()
{
  global $conexao, $bairros;
  $bairros = $conexao->query("SELECT DISTINCT bairro FROM enderecoImovel AS ei INNER JOIN imovel AS i ON i.situacao = 'Ativado' AND ei.imovelID = i.imovelID") or die($conexao->error);
}
