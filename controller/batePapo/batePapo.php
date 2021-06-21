<?php
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

// pegando a url antiga
$_SESSION['url'] = $_SERVER['HTTP_REFERER'];

// conteudo da notificacao
exibirMsg("É Necessário está Autenticado(a) para Iniciar Pate Papo!", "danger");

// redirecionando
header("location:/SMILIPS/view/pages/sistema/login.php");
