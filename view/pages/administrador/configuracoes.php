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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/configuracoes.css">
  <title>Configurações</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  ?>

  <main>
    <div class="excluir-conta">
      <h1>Ações</h1>
      <div class="btn-excluir">
        <form action="#" method="post">
          <input type="hidden" name="id" value="<?php echo $_SESSION['idAdm'] ?>">
          <input type="checkbox" id="excluir">
          <label for="excluir">
            <h1 class="title-excluir">Excluir Conta</h1>
          </label>

          <div class="msg-excluir">
            <h1>Deseja Realmente Excluir sua Conta?</h1>
            <button class="confirm" type="submit" name="excluir">Confirmar</button>
            <button class="cancel" type="button">Cancelar</button>
          </div>
        </form>
      </div>
    </div>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/configuracoes.js"></script>
</body>

</html>