<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  consultarImoveis();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/sistema/imoveis.css">
  <title>Imóveis</title>
</head>

<body>
  <header>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
    ?>
  </header>

  <main>
    <h1>Imóveis</h1>

    <section class="imoveis_disponiveis">
      <?php for ($i = 0; $i < count($matrizImoveis); $i++) : ?>
        <div class="card_imovel">
          <div class="image">
            <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
            <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
            <div class="imgs">
              <?php for ($j = 0; $j < count($matrizImgsImovel); $j++) : ?>
                <?php if ($matrizImgsImovel[$j]['imovelID'] == $matrizImoveis[$i]['imovelID']) : ?>
                  <img src="data:image/jpeg;base64,<?php echo base64_encode($matrizImgsImovel[$j]['imagem']) ?>" alt="">
                <?php endif; ?>
              <?php endfor; ?>
            </div>
          </div>
          <div class="descricao">

          </div>
        </div>
      <?php endfor; ?>
    </section>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/sistema/imoveis.js" type="module"></script>
</body>

</html>