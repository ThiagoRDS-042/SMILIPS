<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_GET['comprovante'])) {

  header('Content-type: octet/stream');
  header('Content-disposition: attachment; filename=comprovante.png');

  $id = $_GET['comprovante'];

  $comprovante = $conexao->query("SELECT * FROM planoUsuario WHERE planoUsuarioID = '$id'");
  $comprovante = $comprovante->fetch_assoc();
  $comprovante = $comprovante['comprovante'];

  echo $comprovante;
}
