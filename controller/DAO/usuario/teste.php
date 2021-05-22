<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

$emailValidoUsuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = 2");
$emailValidoUsuario = $emailValidoUsuario->fetch_assoc();
$emailValidoUsuario = $emailValidoUsuario['ftPerfil'];
header('Content-type: octet/stream');
header('Content-disposition: attachment; filename=comprovante.png');

echo $emailValidoUsuario;
