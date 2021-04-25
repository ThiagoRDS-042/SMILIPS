<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

// se salvar existir
if (isset($_POST['salvar'])) {
  // se o servico foi passado cadastra, se n, retorna a msn
  if ($_POST['servico'] != '') {
    $servico = $_POST['servico'];

    // cadastre o servico passado no DB
    $conexao->query("INSERT INTO servico (servico) VALUES ('$servico')") or die($conexao->error);

    exibirMsg("Serviço Cadastrado com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
  } else {

    exibirMsg("Preencha o Campo Antes de Salvar!", "danger");
    header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
  }
  // se excluir existir
} else if (isset($_GET['excluir'])) {
  $id = $_GET['excluir'];

  // delete o servico do DB apartir do id passado
  $conexao->query("DELETE FROM servico WHERE servicoID = '$id'") or die($conexao->error);

  exibirMsg("Serviço Excluído com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");

  // se editar existir
} else if (isset($_POST['editar'])) {
  $id = $_POST['id'];
  $servico = $_POST['servico'];

  // atualize o servico setando os valores das variaveis a cima para a tabela de servico apartir do id passado
  $conexao->query("UPDATE servico SET servico = '$servico' WHERE servicoID = '$id'") or die($conexao->error);

  exibirMsg("Serviço Editado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterServicos.php");
}
