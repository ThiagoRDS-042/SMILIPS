<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultarDenunciasImovelNExibidas()
{
  global $conexao, $denunciasImovel;

  $denunciasImovel = $conexao->query("SELECT * FROM denunciaImovel AS di INNER JOIN usuario AS u ON di.usuarioID = u.usuarioID WHERE di.exibida = 0") or die($conexao->error);
}
