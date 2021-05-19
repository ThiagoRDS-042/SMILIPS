<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
usuarioLogadoEntra();
require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
consultarPlanoUsuario()
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/propaganda/cadastro.css">
  <title>Cadastrar Anúncio</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastrar Anúncio</h1>

    <form action="/SMILIPS/controller/DAO/propaganda/propagandaDAO.php" method="post" enctype="multipart/form-data">
      <label for="cad">
        <div class="cad_anuncio">
          <i class="far fa-images"></i>
          <input type="file" name="propaganda" id="cad">
          <img src="" alt="image">
          <span>Formatos Suportados: PNG, JPG e JPEG, Tamanho Suportado: até 1000 KB.</span>
        </div>
        <button type="submit" name="salvar">Salvar</button>
      </label>
    </form>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/propaganda/cadastro.js"></script>
</body>

</html>