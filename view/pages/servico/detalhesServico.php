<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['denunciarImovel'])) {
  unset($_SESSION['denunciarImovel']);
}
$_SESSION['denunciarServico'] = true;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/servico/consultar.php');
  consultarServicoUser();
  consultarServicoAndUser();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/servico/detalhesServico.css">
  <title>Detalhes do Serviços</title>
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

    <h1>Detalhes do Serviços</h1>

    <?php if ($servico['descricao'] != null) : ?>
      <div class="caracteristicas">
        <div class="info_servico">
          <h3>Serviço</h3>
          <p><?php echo $servico['tipoServico']; ?></p>
          <h3>Descrição</h3>
          <p><?php echo $servico['descricao']; ?></p>
        </div>

        <div class="info_prestador">
          <div class="detalhes_prestador">
            <div class="dados">
              <p><?php echo $servico['nomeUsuario']; ?></p>
              <p>Contato:</p>
              <p><?php echo $servico['emailUsuario']; ?></p>
              <p><?php echo $servico['telefone']; ?></p>
            </div>
            <div class="ftPerfil">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($servico['ftPerfil']) ?>" alt="Imagem de perfil do usuario">
            </div>
          </div>
          <div class="contatar">
            <?php if (isset($_SESSION['usuarioID'])) : ?>
              <a href="https://web.whatsapp.com/send?phone=<?php echo $servico['telefone']; ?>" target="blank">Contatar Prestador <i class="fab fa-whatsapp"></i></a>
            <?php elseif (isset($_SESSION['idAdm'])) : ?>
              <a href="https://web.whatsapp.com/send?phone=<?php echo $servico['telefone']; ?>" target="blank">Contatar Prestador <i class="fab fa-whatsapp"></i></a>
            <?php else : ?>
              <a href="/SMILIPS/controller/batePapo/batePapo.php">Contatar Proprietário <i class="fab fa-whatsapp"></i></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/util/denunciar/denunciar.php');
    ?>

    <?php if ($servicosUser->num_rows > 0) : ?>
      <h1 class="relacionados">Serviços Similares do Mesmo Anunciante</h1>
      <div class="similares">
        <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
        <div class="servicos">
          <div class="list_servicos">
            <?php while ($row = $servicosUser->fetch_assoc()) : ?>
              <div class="card">
                <div class="image">
                  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['ftPerfil']); ?>" alt="Imagem de Perfil do Prestador de Serviço">
                </div>
                <div class="detalhes">
                  <div class="nome">
                    <p><?php echo $row['nomeUsuario']; ?></p>
                    <p>(<?php echo $row['tipoServico']; ?>)</p>
                  </div>

                  <div class="descricao">
                    <p><?php echo $row['descricao']; ?></p>
                  </div>

                  <div class="detal">
                    <a href="/SMILIPS/view/pages/servico/detalhesServico.php?servicoID=<?php echo $row['servicoID'] ?>">Detalhes</a>
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
</body>

</html>