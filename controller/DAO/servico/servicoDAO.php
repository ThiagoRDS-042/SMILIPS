<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_POST['salvar'])) {
  if ($_POST['servico'] != '') {
    $servico = $_POST['servico'];

    $conexao->query("INSERT INTO servico (servico) VALUES ('$servico')") or die($conexao->error);

    exibirMsg("Serviço Cadastrado com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
  } else {

    exibirMsg("Preencha o Campo Antes de Salvar!", "danger");
    header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
  }
} else if (isset($_GET['excluir'])) {
  $id = $_GET['excluir'];

  $conexao->query("DELETE FROM servico WHERE servicoID = '$id'") or die($conexao->error);

  exibirMsg("Serviço Excluído com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
} else if (isset($_POST['editar'])) {
  $id = $_POST['id'];
  $servico = $_POST['servico'];

  $conexao->query("UPDATE servico SET servico = '$servico' WHERE servicoID = '$id'") or die($conexao->error);

  exibirMsg("Serviço Editado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
}
