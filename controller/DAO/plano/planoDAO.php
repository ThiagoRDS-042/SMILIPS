<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_POST['salvar'])) {

  $nome = $_POST['nome'];
  $valor = $_POST['valor'];
  $descricao = $_POST['descricao'];

  $conexao->query("INSERT INTO plano (nome, descricao, valor) VALUES ('$nome', '$descricao', '$valor')") or die($conexao->error);

  exibirMsg("Plano Cadastrado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/administrador/manterPlanos.php");
}
