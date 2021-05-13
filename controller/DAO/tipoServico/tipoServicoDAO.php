<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

// se salvar existir
if (isset($_POST['salvar'])) {
  // se o servico foi passado cadastra, se n, retorna a msn
  if ($_POST['servico'] != '') {
    $tipoServico = $_POST['servico'];

    $tipoServicoValido = $conexao->query("SELECT * FROM tipoServico WHERE tipoServico = '$tipoServico'") or die($conexao->error);

    if ($tipoServicoValido->num_rows == 0) {
      // cadastre o servico passado no DB
      $conexao->query("INSERT INTO tipoServico (tipoServico) VALUES ('$tipoServico')") or die($conexao->error);

      exibirMsg("Tipo de Serviço Cadastrado com Sucesso!", "success");
      header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
    } else {
      exibirMsg("Tipo de Serviço já Existente!", "danger");
      header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
    }
  } else {

    exibirMsg("Preencha o Campo Antes de Salvar!", "danger");
    header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
  }
  // se excluir existir
} else if (isset($_GET['excluir'])) {
  $id = $_GET['excluir'];

  // delete o servico do DB apartir do id passado
  $conexao->query("DELETE FROM tipoServico WHERE tipoServicoID = '$id'") or die($conexao->error);

  exibirMsg("Tipo de Serviço Excluído com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");

  // se editar existir
} else if (isset($_POST['editar'])) {
  $id = $_POST['id'];
  $tipoServico = $_POST['servico'];

  // atualize o servico setando os valores das variaveis a cima para a tabela de servico apartir do id passado
  $conexao->query("UPDATE tipoServico SET tipoServico = '$tipoServico' WHERE tipoServicoID = '$id'") or die($conexao->error);

  exibirMsg("Tipo de Serviço Editado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
}
