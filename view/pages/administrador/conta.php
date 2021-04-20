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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/administrador/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
  ?>

  <main>
    <div class="edit-info">
      <h1>Editar E-mail</h1>
      <form action="/SMILIPS/controller/DAO/administrador/administradorDAO.php" method="POST">
        <input type="hidden" name="id" id="idAdm" value="<?php echo $id ?>">
        <div class="field-input">
          <input type="text" name="email" id="email" required value="<?php echo $email ?>">
          <span data-placeholder="Email"></span>
          <span id="msgEmail" class="msg"></span>
        </div>

        <div class="field-button">
          <button type="submit" name="editar-email">Salvar</button>
        </div>
      </form>
    </div>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/conta.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarEmail.js"></script>
</body>

</html>