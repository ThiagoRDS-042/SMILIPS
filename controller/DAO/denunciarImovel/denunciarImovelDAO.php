<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['denunciar'])) {
  $id = $_POST['id'];

  if ($_POST['motivo'] != null) {
    $motivo = $_POST['motivo'];
    $idUsuario = $_POST['idUsuario'];
    $idImovel = $_POST['id'];

    $conexao->query("INSERT INTO denunciaImovel(usuarioID, imovelID, motivo, exibida) VALUES ('$idUsuario', '$idImovel', '$motivo', 0)") or die($conexao->error);

    exibirMsg("Denuncia Enviada!", "success");
    header("location:/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=$idImovel");
  } else {
    exibirMsg("Por Favor Informe o Motivo da Denúcia!", "danger");
    header("location:/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=$id");
  }
} else if (isset($_GET['denunciaADM'])) {
  $id = $_GET['denunciaADM'];

  exibirMsg("Funcionalidade Exclusiva para Usuários!", "danger");
  header("location:/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=$id");
} else if (isset($_GET['denunciarLogin'])) {

  $_SESSION['url'] = $_SERVER['HTTP_REFERER'];

  exibirMsg("É Necessário está Autenticado(a) para Realizar Denuncias!", "danger");
  header("location:/SMILIPS/view/pages/sistema/login.php");
}
