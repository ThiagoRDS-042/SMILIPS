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
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/plano.png" alt="Icone de Planos">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterPlanos.php">Gerenciar Planos</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/service.png" alt="Icone de Serviços">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterServicos.php">Gerenciar Tipos de Serviços</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/users.png" alt="Icone de Usuários">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/manterPlanos.php">Gerenciar Usuários</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/imovel.png" alt="Icone de Imóveis">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/imoveis.php">Gerenciar Imóveis</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/denuncia.png" alt="Icone de Denuncias">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/denuncias.php">Gerenciar Denuncias</a>
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