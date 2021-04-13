<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/manterTiposDeServicos.css">
  <title>Manter Tipos de Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  ?>

  <main>
    <h1>Manter Tipos de Serviços</h1>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>
</body>

</html>