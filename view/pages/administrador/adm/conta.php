<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/adm/conta.css">
  <title>Conta</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/administrador/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
  ?>

  <main>
    <div class="edit-info">
      <h1>Editar E-mail</h1>
      <!-- passando o id e o email do adm para os campos -->
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
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarEmail.js"></script>
</body>

</html>