<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

$propagandasAtivas = $conexao->query("SELECT * FROM propaganda AS p INNER JOIN planoUsuario AS pu ON p.usuarioID = pu.usuarioID INNER JOIN plano AS plan ON pu.planoID = plan.planoID WHERE p.situacao = 'Ativada' AND plan.nome != 'Premium' ORDER BY RAND() LIMIT 3") or die($conexao->error);

while ($row = $propagandasAtivas->fetch_assoc()) {
  $propagandas[] = $row;
}

echo base64_encode($propagandas[0]['propaganda']) . " . ";
echo base64_encode($propagandas[1]['propaganda']) . " . ";
echo base64_encode($propagandas[2]['propaganda']);
