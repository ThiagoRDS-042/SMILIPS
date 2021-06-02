<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

unset($_SESSION['rua']);
unset($_SESSION['tipo']);
unset($_SESSION['cidade']);
unset($_SESSION['bairro']);
unset($_SESSION['quarto']);
unset($_SESSION['banheiro']);
unset($_SESSION['garagem']);
unset($_SESSION['valorMinimo']);
unset($_SESSION['valorMaximo']);
unset($_SESSION['area']);

header("location:/SMILIPS/view/pages/sistema/imoveis.php");
