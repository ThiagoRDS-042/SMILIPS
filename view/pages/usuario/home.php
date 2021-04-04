<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
  consultarNome();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/usuario/home.css">
  <title>Home</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <div class="nome">
      <?php $nome = preg_split('/\s/', $nomeUsuario); ?>
      <h1>Bem Vindo! <?php echo $nome[0]; ?></h1>
    </div>

    <div class="card-container">
      <div class="card">
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Cadastrar Imóvel</a>
        </div>
        <div class="image">
          <img src="" alt="">
        </div>
      </div>
      <div class="card">
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Seja Nosso Parceiro</a>
        </div>
        <div class="image">
          <img src="" alt="">
        </div>
      </div>
      <div class="card">
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Torne-se um Prestador de Serviço</a>
        </div>
        <div class="image">
          <img src="" alt="">
        </div>
      </div>
    </div>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/home.js"></script>
</body>

</html>
