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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/home.css">
  <title>Administrador</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  ?>

  <main>
    <h1>Bem Vindo, Administrador</h1>

    <div class="container-planos">
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Planos</h2>
            <p>Cadastre, Edite, Pesquise e Exclua Planos</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/imovel.png" alt="Imagem de Planos">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterPlanos.php">Gerenciar Planos</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Tipos de Serviços</h2>
            <p>Cadastre, Edite, Pesquise e Exclua Tipos de Serviços</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/parceiros.png" alt="Imagem de Tipos de Serviços">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterServicos.php">Gerenciar Tipos de Serviços</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Usuários</h2>
            <p>Cadastre, Edite, Pesquise e Exclua Usuários</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/imovel.png" alt="Imagem de Planos">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterPlanos.php">Gerenciar Usuários</a>
        </div>
      </div>
    </div>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/home.js"></script>
</body>

</html>