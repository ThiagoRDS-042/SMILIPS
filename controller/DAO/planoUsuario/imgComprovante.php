<?php

require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_GET['comprovante'])) {

  // definindo como tipo para manipulação de array de bytes, e do tipo dwonload de arquivo
  header('Content-type: octet/stream');
  header('Content-disposition: attachment; filename=comprovante.png');

  $id = $_GET['comprovante'];

  // pesquisando o comprovante
  $comprovante = $conexao->query("SELECT * FROM planoUsuario WHERE planoUsuarioID = '$id'");
  $comprovante = $comprovante->fetch_assoc();
  $comprovante = $comprovante['comprovante'];

  // exibindo o comprovante a ser baixado
  echo $comprovante;
}
