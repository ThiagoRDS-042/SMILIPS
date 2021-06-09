<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

function consultarDenunciasServicoNExibidas()
{
  global $conexao, $denunciasServico;

  $denunciasServico = $conexao->query("SELECT * FROM denunciaServico AS ds INNER JOIN usuario AS u ON ds.usuarioID = u.usuarioID WHERE ds.exibida = 0") or die($conexao->error);
}
