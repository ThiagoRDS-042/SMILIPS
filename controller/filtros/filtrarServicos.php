<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['filtrar_servicos'])) {

  if ($_POST['pesquisa']) {
    $_SESSION['pesquisa'] = $_POST['pesquisa'];

    header("location:/SMILIPS/view/pages/sistema/servicos.php?filtro");
  } else {
    header("location:/SMILIPS/view/pages/sistema/servicos.php");
  }
}


function consultarServicosFiltro()
{
  global $conexao, $servicos;
  $pesquisa = $_SESSION['pesquisa'];
  $servicos = $conexao->query("SELECT * FROM servico AS s INNER JOIN tipoServico AS ts ON s.tipoServicoID = ts.tipoServicoID AND ts.tipoServico = '$pesquisa' INNER JOIN usuario AS u ON u.usuarioID = s.usuarioID") or die($conexao->error);
}
