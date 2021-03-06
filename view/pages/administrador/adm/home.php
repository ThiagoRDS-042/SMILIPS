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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/planoUsuario/consultar.php');
  consultarDataFim();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/adm/home.css">
  <title>Administrador</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
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
          <a href="/SMILIPS/view/pages/administrador/plano/manterPlanos.php">Gerenciar Planos</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/service.png" alt="Icone de Serviços">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/tipoServico/manterServicos.php">Gerenciar Tipos de Serviços</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/users.png" alt="Icone de Usuários">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/usuario/usuarios.php">Gerenciar Usuários</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/imovel.png" alt="Icone de Imóveis">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/imovel/imoveis.php">Validar Imóveis</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/validar_planos.png" alt="Icone de Planos">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/plano/planos.php">Validar Planos</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/validar_propagandas.png" alt="Icone de Propagandas">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/propaganda/propagandas.php">Validar Propagandas</a>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="image">
            <img src="/SMILIPS/view/images/administrador/plano.png" alt="Icone de denuncias">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/administrador/denuncia/denuncias.php">Gerenciar Denúncias</a>
        </div>
      </div>
    </div>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/home.js"></script>
</body>

</html>