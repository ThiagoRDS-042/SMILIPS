<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/sistema/sobre.css">
  <title>Sobre</title>
</head>

<body>
  <header>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
    ?>
  </header>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Quem Somos</h1>
    <p>Somos um grupo de estudantes que em meio a pandemia da Covid 19, iniciamos um
      projeto para conclusão de uma disciplina. E o que deveria ser apenas um sistema
      para conclusão de matéria, se tornou no que vocês estão acessando hoje. O SMILIPS
      é uma empresa inovadora no setor de imóveis do Estado do Ceará, mas especificamente
      na cidade de Icó, temos como objetivo atender toda a demanda da logística de mudança
      e manutenção de imóveis. Ficamos felizes em ter você com a gente. </p>

    <div class="logo">
      <img src="/SMILIPS/view/images/logo/logo.png" alt="logo SMILIPS">
    </div>

    <p class="contato">Com o que podemos ajudar? Contacte-nos através do nosso email: <span>projetopi089@gmail.com</span></p>

    <div class="contate_nos">
      <form action="/SMILIPS/controller/relatarProblema/relatarProblema.php" method="post" class="relatar">
        <label>Nome<span>*</span></label>
        <input type="text" name="nome">
        <label>E-mail<span>*</span></label>
        <input type="text" name="email">
        <label>Relatar Problema<span>*</span></label>
        <textarea name="problema" id="problema" cols="30" rows="7"></textarea>
        <button type="submit" name="enviar_email">Enviar</button>
      </form>

    </div>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/sistema/enviarEmail.js"></script>
</body>

</html>