<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['denunciarServico'])) {
  unset($_SESSION['denunciarServico']);
}

$_SESSION['denunciarImovel'] = true;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  consultarImgsImovel();
  consultarImovelEImg();
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

    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

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

      if ($imovel['tipo'] == 'Residencial') {
        $imovel['tipo'] = 'Residencia';
      } else if ($imovel['tipo'] == 'Comercial') {
        $imovel['tipo'] = 'Ponto Comercial';
      }
      ?>
      <div class="descricao">
        <h2><?php echo $imovel['tipo']; ?> com <?php echo $imovel['qtdQuarto']; ?> para Aluguel, <?php echo $imovel['area']; ?></h2>
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
            <?php if (isset($_SESSION['usuarioID'])) : ?>
              <a href="https://web.whatsapp.com/send?phone=<?php echo $usuario['telefone']; ?>" target="blank">Contatar Proprietário <i class="fab fa-whatsapp"></i></a>
            <?php elseif (isset($_SESSION['idAdm'])) : ?>
              <a href="https://web.whatsapp.com/send?phone=<?php echo $usuario['telefone']; ?>" target="blank">Contatar Proprietário <i class="fab fa-whatsapp"></i></a>
            <?php else : ?>
              <a href="/SMILIPS/controller/batePapo/batePapo.php">Contatar Proprietário <i class="fab fa-whatsapp"></i></a>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>

    <?php if ($imovel['descricao'] != null) : ?>
      <div class="caracteristicas">
        <h3>Descrição</h3>
        <p><?php echo $imovel['descricao']; ?></p>
      </div>
    <?php endif; ?>

    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/util/denunciar/denunciar.php');
    ?>

    <?php if ($imoveis->num_rows > 0) : ?>
      <h1 class="similares">Imóveis Similares do Mesmo Anunciante</h1>
      <div class="relacionados">
        <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
        <div class="imoveis">
          <div class="list_cards">
            <?php while ($row = $imoveis->fetch_assoc()) : ?>
              <div class="card">
                <div class="img">
                  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']); ?>" alt="imagem do Imóvel">
                </div>
                <div class="detalhes">
                  <div class="descri">
                    <p>Rua<?php echo $row['rua']; ?> - <?php echo $row['numero']; ?>, <?php echo $row['bairro']; ?></p>
                  </div>
                  <div class="valorAluguel">
                    <p>R$ <?php echo $row['valorAluguel']; ?> <span>/Mês</span></p>
                  </div>
                  <?php
                  if ($row['qtdQuarto'] > 1) {
                    $row['qtdQuarto'] .= ' Quartos';
                  } else {
                    $row['qtdQuarto'] .= ' Quarto';
                  }
                  if ($row['qtdBanheiro'] > 1) {
                    $row['qtdBanheiro'] .= ' Banheiros';
                  } else {
                    $row['qtdBanheiro'] .= ' Banheiro';
                  }
                  if ($row['qtdGaragem'] > 1) {
                    $row['qtdGaragem'] = ' - ' . $row['qtdGaragem'] . ' Garagens';
                  } else if ($row['qtdGaragem'] == 1) {
                    $row['qtdGaragem'] = ' - ' . $row['qtdGaragem'] . ' Garagen';
                  } else {
                    $row['qtdGaragem'] = '';
                  }
                  ?>
                  <div class="caracteristica">
                    <p><?php echo $row['area']; ?> - <?php echo $row['qtdQuarto']; ?> - <?php echo $row['qtdBanheiro']; ?><?php echo $row['qtdGaragem']; ?></p>
                  </div>
                  <div class="detal">
                    <a href="/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=<?php echo $row['imovelID']; ?>">Detalhes</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
      </div>
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/detalhesImovel.js" type="module"></script>
</body>

</html>