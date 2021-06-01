<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/filtros/filtrarImoveis.php');
  if (!isset($_GET['filtro'])) {
    consultarImoveis();
  } else {
    filtrarImoveis();
  }
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
    <input type="checkbox" id="btnFiltro">
    <label for="btnFiltro">
      <h3><i class="fas fa-angle-left"></i> filtro</h3>
    </label>

    <form action="/SMILIPS/controller/filtroImoveis/filtrarImoveis.php" method="post">
      <div id="filter">

        <h3>Filtro de Busca</h3>

        <div class="search">
          <input type="text" name="rua" placeholder="Pesquise por Rua">
        </div>

      </div>
    </form>

    <?php if (isset($_GET['filtro'])) : ?>
      <?php if ($imoveis != null and $filtro != null) : ?>
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
                <div class="value">
                  <p>R$ <?php echo number_format($matrizImoveis[$i]['valorAluguel'], 0, ',', '.'); ?> <span>/Mês</span></p>
                </div>

                <?php
                if ($matrizImoveis[$i]['qtdQuarto'] > 1) {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quartos';
                } else {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quarto';
                }
                if ($matrizImoveis[$i]['qtdBanheiro'] > 1) {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiros';
                } else {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiro';
                }
                if ($matrizImoveis[$i]['qtdGaragem'] > 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagens';
                } else if ($matrizImoveis[$i]['qtdGaragem'] == 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagen';
                } else {
                  $matrizImoveis[$i]['qtdGaragem'] = '';
                }

                if ($matrizImoveis[$i]['tipo'] == 'Residencial') {
                  $matrizImoveis[$i]['tipo'] = 'Residencia';
                } else if ($matrizImoveis[$i]['tipo'] == 'Comercial') {
                  $matrizImoveis[$i]['tipo'] = 'Ponto Comercial';
                }
                ?>

                <div class="desc">
                  <p><?php echo $matrizImoveis[$i]['tipo']; ?> com <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> para Aluguel, <?php echo $matrizImoveis[$i]['area']; ?></p>
                </div>

                <div class="end">
                  <p><?php echo $matrizImoveis[$i]['rua']; ?> - <?php echo $matrizImoveis[$i]['numero']; ?>, <?php echo $matrizImoveis[$i]['cidade']; ?></p>
                </div>
                <div class="info">
                  <p><?php echo $matrizImoveis[$i]['area']; ?> <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> <?php echo $matrizImoveis[$i]['qtdBanheiro']; ?> <?php echo $matrizImoveis[$i]['qtdGaragem']; ?></p>
                </div>
                <div class="detalhes">
                  <a href="#">Detalhes</a>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </section>
      <?php else : ?>
        <h1>Nenhum Resultado Encontrado :(</h1>
      <?php endif; ?>
    <?php else : ?>
      <?php if ($imoveis != null) : ?>
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
                <div class="value">
                  <p>R$ <?php echo number_format($matrizImoveis[$i]['valorAluguel'], 0, ',', '.'); ?> <span>/Mês</span></p>
                </div>

                <?php
                if ($matrizImoveis[$i]['qtdQuarto'] > 1) {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quartos';
                } else {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quarto';
                }
                if ($matrizImoveis[$i]['qtdBanheiro'] > 1) {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiros';
                } else {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiro';
                }
                if ($matrizImoveis[$i]['qtdGaragem'] > 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagens';
                } else if ($matrizImoveis[$i]['qtdGaragem'] == 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagen';
                } else {
                  $matrizImoveis[$i]['qtdGaragem'] = '';
                }

                if ($matrizImoveis[$i]['tipo'] == 'Residencial') {
                  $matrizImoveis[$i]['tipo'] = 'Residencia';
                } else if ($matrizImoveis[$i]['tipo'] == 'Comercial') {
                  $matrizImoveis[$i]['tipo'] = 'Ponto Comercial';
                }
                ?>

                <div class="desc">
                  <p><?php echo $matrizImoveis[$i]['tipo']; ?> com <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> para Aluguel, <?php echo $matrizImoveis[$i]['area']; ?></p>
                </div>

                <div class="end">
                  <p><?php echo $matrizImoveis[$i]['rua']; ?> - <?php echo $matrizImoveis[$i]['numero']; ?>, <?php echo $matrizImoveis[$i]['cidade']; ?></p>
                </div>
                <div class="info">
                  <p><?php echo $matrizImoveis[$i]['area']; ?> <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> <?php echo $matrizImoveis[$i]['qtdBanheiro']; ?> <?php echo $matrizImoveis[$i]['qtdGaragem']; ?></p>
                </div>
                <div class="detalhes">
                  <a href="#">Detalhes</a>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </section>
      <?php else : ?>
        <h1>Nenhum Resultado Encontrado :(</h1>
      <?php endif; ?>
    <?php endif; ?>


  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/sistema/imoveis.js" type="module"></script>
</body>

</html>