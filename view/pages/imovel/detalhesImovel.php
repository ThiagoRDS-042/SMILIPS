<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  consultarImgsImovel()
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/imovel/detalhesImovel.css">
  <title>Detalhes do Imóvel</title>
</head>

<body>
  <header>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
    ?>
  </header>

  <main>
    <h1>Detalhes do Imóvel</h1>

    <div class="container_imoveis">
      <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
      <div class="slider">
        <div class="cards_imovel">
          <?php while ($row = $imgImovel->fetch_assoc()) : ?>
            <div class="card">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']) ?>" alt="Imagem do Imóvel">
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
    </div>

    <div class="descricao_imovel">
      <div class="descricao">
        <h2>02 Dormitórios sendo uma suíte. Sacada com churrasqueira. Living.</h2>
      </div>

      <div class="info">

        <div class="info_imovel">
          <div class="endereco">
            <p><?php echo $imovel['tipo']; ?> para alugar em</p>
            <p>Rua <?php echo $imovel['rua']; ?>, <?php echo $imovel['numero']; ?> - <?php echo $imovel['bairro'] ?> - CE <i class="fas fa-map-marker-alt"></i></p>
          </div>

          <div class="valor">
            <p>R$ <?php echo $imovel['valorAluguel']; ?> <span>/Mês</span></p>
          </div>

          <div class="detalhes">
            <div class="area">
              <i class="far fa-clone"></i>
              <p><?php echo $imovel['area']; ?></p>
            </div>

            <?php
            if ($imovel['qtdQuarto'] > 1) {
              $imovel['qtdQuarto'] .= ' Quartos';
            } else {
              $imovel['qtdQuarto'] .= ' Quarto';
            }
            if ($imovel['qtdBanheiro'] > 1) {
              $imovel['qtdBanheiro'] .= ' Banheiros';
            } else {
              $imovel['qtdBanheiro'] .= ' Banheiro';
            }
            if ($imovel['qtdGaragem'] > 1) {
              $imovel['qtdGaragem'] .= ' Garagens';
            } else if ($imovel['qtdGaragem'] == 1) {
              $imovel['qtdGaragem'] .= ' Garagen';
            } else {
              $imovel['qtdGaragem'] = 'Indisponível';
            }
            ?>

            <div class="quarto">
              <i class="fas fa-bed"></i>
              <P><?php echo $imovel['qtdQuarto']; ?></P>
            </div>

            <div class="garagem">
              <i class="fas fa-car"></i>
              <p><?php echo $imovel['qtdGaragem']; ?></p>
            </div>

            <div class="banheiro">
              <i class="fas fa-shower"></i>
              <p><?php echo $imovel['qtdBanheiro']; ?></p>
            </div>

          </div>
        </div>

        <div class="info_proprietario">
          <div class="detalhes_proprietario">
            <div class="dados">
              <p><?php echo $usuario['nomeUsuario']; ?></p>
              <p>Contato:</p>
              <p><?php echo $usuario['emailUsuario']; ?></p>
              <p><?php echo $usuario['telefone']; ?></p>
            </div>
            <div class="ftPerfil">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($usuario['ftPerfil']) ?>" alt="Imagem de perfil do usuario">
            </div>
          </div>
          <div class="contatar">
            <a href="https://web.whatsapp.com/send?phone=<?php echo $usuario['telefone']; ?>" target="blank">Contatar Proprietário <i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/detalhesImovel.js" type="module"></script>
</body>

</html>