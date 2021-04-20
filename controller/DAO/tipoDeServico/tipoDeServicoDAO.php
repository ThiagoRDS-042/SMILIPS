<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_POST['salvar'])) {
  if ($_POST['tipo-de-servico'] != '') {
    $tipoDeServico = $_POST['tipo-de-servico'];

    $conexao->query("INSERT INTO tipoDeServico (tipoDeServico) VALUES ('$tipoDeServico')") or die($conexao->error);

    exibirMsg("Tipo de Serviço Cadastrado com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/manterTiposDeServicos.php");
  } else {

    exibirMsg("Preencha o Campo Antes de Salvar!", "danger");
    header("location:/SMILIPS/view/pages/administrador/manterTiposDeServicos.php");
  }
}
