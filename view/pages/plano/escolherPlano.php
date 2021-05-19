<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/plano/escolherPlano.css">
  <title>Escolher Plano</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <h1>Escolher Plano</h1>

    <section class="planos">
      <div class="card">
        <span>1</span>
        <div class="title">
          <p>Premium</p>
        </div>

        <div class="valor">
          <p>R$ 2.250/<span>MES</span></p>
        </div>

        <div class="descricao">
          <p>asda asd asda sd asdasdasd d asmdha a as h hahd ja uas a ojajiyhu yu uhg g u gui t t ygu guy i.</p>
        </div>

        <div class="btn">
          <button>Selecionar</button>
        </div>

      </div>

      <div class="card">
        <span>2</span>
        <div class="title">
          <p>Basic</p>
        </div>

        <div class="valor">
          <p>R$ 2.250/<span>MES</span></p>
        </div>

        <div class="descricao">
          <p>asda asd asda sd asdasdasd d asmdha a as h hahd ja uas a ojajiyhu yu uhg g u gui t t ygu guy i.</p>
        </div>

        <div class="btn">
          <button>Selecionar</button>
        </div>

      </div>

      <div class="card">
        <span>3</span>
        <div class="title">
          <p>Comum</p>
        </div>

        <div class="valor">
          <p>R$ 2.250/<span>MES</span></p>
        </div>

        <div class="descricao">
          <p>asda asd asda sd asdasdasd d asmdha a as h hahd ja uas a ojajiyhu yu uhg g u gui t t ygu guy i.</p>
        </div>

        <div class="btn">
          <button>Selecionar</button>
        </div>

      </div>

    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>
</body>

</html>