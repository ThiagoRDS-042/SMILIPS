<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/imovel/cadastro.css">
  <title>Cadastro de Imóvel</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  ?>
  <div class="container">
    <h1>Cadastro de Imóvel</h1>
  </div>
  <section>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
    ?>
  </section>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <div class="container-img">
      <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
      <div class="list-img">
        <div class="list-img-slider preview">

        </div>
      </div>
      <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
    </div>
    <!--/SMILIPS/controller/usuario/teste.php -->
    <form action="#" method="post" enctype="multipart/form-data">
      <label for="btn">
        <div class="select-img">
          <i class="far fa-images"></i>
          <h1>Selecionar Imagens</h1>
        </div>

        <input type="file" multiple name="image[]" id="btn">
      </label>
      <button type="submit" name="cadastro-imovel">enviar</button>
    </form>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/previewImoveis.js"></script>
</body>

</html>