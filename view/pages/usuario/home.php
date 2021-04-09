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
      <h1>Bem Vindo, <?php echo $nome[0]; ?></h1>
    </div>

    <div class="card-container">
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Cadastrar Imóvel</h2>
            <p>Cadastrar Imóvel, Cadastrar Imóvel, Cadastrar Imóvel, Cadastrar Imóvel</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/imovel.png" alt="Imagem de um Imóvel">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Cadastrar Imóvel</a>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Seja Nosso Parceiro</h2>
            <p>Seja Nosso Parceiro, Seja Nosso Parceiro,Seja Nosso Parceiro,Seja Nosso</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/parceiros.png" alt="Imagem de Parceria">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Seja Nosso Parceiro</a>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Torne-se um Prestador de Serviço</h2>
            <p>Torne-se um Prestador de Serviço, Torne-se um Prestador de Serviço</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/prestadorServico.png" alt="Imagem de Prestação de Serviço">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Torne-se um Prestador de Serviço</a>
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