<?php
// iniciando sessao
if (!isset($_SESSION)) {
  session_start();
}
//destruindo as variaveis session de usuario para encerra a sesao
if (isset($_SESSION['usuarioID'])) {
  unset($_SESSION['usuarioID']);
  unset($_SESSION['emailUsuario']);
  unset($_SESSION['senhaUsuario']);
  unset($_SESSION['nomeUsuario']);
} else if (isset($_SESSION['idAdm'])) {
  unset($_SESSION['idAdm']);
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
}
// redirecinando
header("location:/SMILIPS/view/pages/sistema/login.php");
