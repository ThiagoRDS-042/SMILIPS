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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/manterPlanos.css">
  <title>Manter Planos</title>
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

    <h1>Cadastrar Planos</h1>

    <section class="cad-plano">
      <form action="/SMILIPS/controller/DAO/plano/planoDAO.php" method="POST">
        <div class="field-duo">
          <div class="field-input">
            <input type="text" name="nome" required>
            <span class="info-field" data-placeholder="Nome"></span>
          </div>
          <div class="field-input">
            <input type="text" name="valor" required class="numerico">
            <span class="info-field" data-placeholder="Valor"></span>
          </div>
        </div>

        <div class="field-input">
          <textarea name="descricao" id="descricao" cols="30" rows="4" required maxlength="250"></textarea>
          <span class="info-field" data-placeholder="Descrição"></span>
          <span class="counter">250</span>
        </div>

        <div class="field-button">
          <button name="salvar" type="submit">Salvar</button>
        </div>
      </form>

    </section>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/cadastrarPlanos.js" type="module"></script>
</body>

</html>