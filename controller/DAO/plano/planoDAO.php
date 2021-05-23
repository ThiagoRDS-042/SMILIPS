<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

// se salvar existir
if (isset($_POST['salvar'])) {

  $nome = $_POST['nome'];
  $valor = $_POST['valor'];
  $descricao = $_POST['descricao'];
  $duracao = $_POST['duracao'];
  $qtdAnuncio = $_POST['qtdAnuncio'];

  // cadastre o plano passado no DB
  $conexao->query("INSERT INTO plano (nome, descricao, valor, duracao, qtdAnuncio) VALUES ('$nome', '$descricao', '$valor', '$duracao', '$qtdAnuncio')") or die($conexao->error);

  exibirMsg("Plano Cadastrado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/plano/manterPlanos.php");

  // se excluir existir
} else if (isset($_GET['excluir'])) {
  $id = $_GET['excluir'];

  // delete o plano do DB apartir do id passado
  $conexao->query("DELETE FROM plano WHERE planoID = '$id'") or die($conexao->error);

  exibirMsg("Plano Excluído com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/plano/manterPlanos.php");

  // se editar existir
} else if (isset($_POST['editar'])) {
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $valor = $_POST['valor'];
  $descricao = $_POST['descricao'];
  $duracao = $_POST['duracao'];
  $qtdAnuncio = $_POST['qtdAnuncio'];

  // atualize o plano setando os valores das variaveis a cima para a tabela de plano apartir do id passado
  $conexao->query("UPDATE plano SET nome = '$nome', valor = '$valor', descricao = '$descricao', duracao = '$duracao', qtdAnuncio = '$qtdAnuncio' WHERE planoID = '$id'") or die($conexao->error);

  exibirMsg("Plano Editado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/plano/manterPlanos.php");
}
