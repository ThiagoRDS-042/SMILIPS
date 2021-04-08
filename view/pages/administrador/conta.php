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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/conta.css">
  <title>Conta</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  ?>

  <main>
    <div class="edit-info">
      <h1>Editar Conta</h1>
      <form action="#" method="POST">
        <div class="field-input">
          <input type="text" name="email" required>
          <span data-placeholder="Email"></span>
        </div>

        <div class="field-input">
          <input type="password" name="senhaAtual" required class="senha">
          <span data-placeholder="Senha Atual"></span>
          <i class="fa fa-eye"></i>
        </div>

        <div class="field-input">
          <input type="password" name="senhaNova" required class="senha">
          <span data-placeholder="Nova Senha"></span>
          <i class="fa fa-eye"></i>
        </div>

        <div class="field-button">
          <button type="submit">Salvar</button>
        </div>
      </form>
    </div>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/conta.js"></script>
</body>

</html>