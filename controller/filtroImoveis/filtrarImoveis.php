<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['filtar_imoveis'])) {

  if ($_POST['rua'] != null and $_POST['type'] != null and $_POST['cidade'] != null and $_POST['bairro'] != null) {
    $rua = $_POST['rua'];
    $tipo = $_POST['type'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];

    $_SESSION['rua'] = $rua;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['bairro'] = $bairro;

    header("location:/SMILIPS/view/pages/sistema/imoveis.php?filtro");
  } else {
    exibirMsg("Pesquise por rua, tipo de imóvel, cidade e bairro!", "danger");
    header("location:/SMILIPS/view/pages/sistema/home.php");
  }
}

function filtrarImoveis()
{
  $rua = $_SESSION['rua'];
  $tipo = $_SESSION['tipo'];
  $cidade = $_SESSION['cidade'];
  $bairro = $_SESSION['bairro'];
  global $conexao, $matrizImoveis, $matrizImgsImovel, $imoveis;
  // pesquisando todos os imoveis do DB 
  $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro'") or die($conexao->error);

  // pesquidando todas as imgs dos imoveis
  for ($i = 0; $i < $imoveis->num_rows; $i++) {
    $matrizImoveis[] = $imoveis->fetch_assoc();
    $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $matrizImoveis[$i]['imovelID'] . " LIMIT 5") or die($conexao->error);

    for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
      $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
    }
  }
}
