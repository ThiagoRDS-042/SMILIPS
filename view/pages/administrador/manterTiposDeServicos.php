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
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastrar Tipos de Serviços</h1>
    <div class="tipos-de-servicos">
      <form action="/SMILIPS/controller/DAO/tipoDeServico/tipoDeServicoDAO.php" method="POST">
        <input type="hidden" name="id">
        <input type="text" name="tipo-de-servico">
        <button type="submit" name="salvar">Salvar</button>
      </form>
    </div>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterTiposDeServicos.js"></script>
</body>

</html>