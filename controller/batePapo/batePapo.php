<?php
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

$_SESSION['url'] = $_SERVER['HTTP_REFERER'];

exibirMsg("É Necessário está Autenticado(a) para Iniciar Pate Papo!", "danger");

header("location:/SMILIPS/view/pages/sistema/login.php");
