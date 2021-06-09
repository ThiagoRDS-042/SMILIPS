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
    $idServico = $_POST['id'];

    $conexao->query("INSERT INTO denunciaServico(usuarioID, servicoID, motivo, exibida) VALUES ('$idUsuario', '$idServico', '$motivo', 0)") or die($conexao->error);

    exibirMsg("Denuncia Enviada!", "success");
    header("location:/SMILIPS/view/pages/servico/detalhesServico.php?servicoID=$idServico");
  } else {
    exibirMsg("Por Favor Informe o Motivo da Denúcia!", "danger");
    header("location:/SMILIPS/view/pages/servico/detalhesServico.php?servicoID=$id");
  }
}
