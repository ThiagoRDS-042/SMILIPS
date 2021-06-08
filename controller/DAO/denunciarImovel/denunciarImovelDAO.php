<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['denunciar'])) {
  $id = $_POST['id'];

  if ($_POST['motivo'] != null) {
  } else {
    exibirMsg("Por Favor Informe o Motivo da Denúcia!", "danger");
    header("location:/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=$id");
  }
}
