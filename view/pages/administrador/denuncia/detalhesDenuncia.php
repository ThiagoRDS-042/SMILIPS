<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();

if (isset($_SESSION['detalhesPlano'])) {
  unset($_SESSION['detalhesPlano']);
}
if (isset($_SESSION['detalhesPropaganda'])) {
  unset($_SESSION['detalhesPropaganda']);
}

$_SESSION['detalhesDenuncia'] = true;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/denuncia/detalhesDenuncia.css">
  <title>Detalhes da Denuncia</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarImovel/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarServico/consultar.php');
  ?>

  <main>
    <?php if (isset($_SESSION['imovel'])) : ?>
      <?php if ($proprietario->num_rows > 0) : ?>
        <h1>Detalhes da Denuncia</h1>

        <div class="denuncia">
          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesUsuario.php');
          ?>

          <h1 class="title">Motivo da Denuncia</h1>
          <div class="motivo">
            <p><?php echo $denunciaImovel['motivo']; ?></p>
          </div>

          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesImovel.php');
          ?>
        </div>

      <?php else : ?>
        <h1>Nenhuma Denúncia Disponível</h1>
      <?php endif; ?>
    <?php elseif (isset($_SESSION['servico'])) : ?>
      <?php if ($prestador->num_rows > 0 and isset($_SESSION['servico'])) : ?>
        <h1>Detalhes da Denuncia</h1>

        <div class="denuncia">
          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesUsuario.php');
          ?>

          <h1 class="title">Motivo da Denuncia</h1>
          <div class="motivo">
            <p><?php echo $denunciaServico['motivo']; ?></p>
          </div>
        </div>

      <?php else : ?>
        <h1>Nenhuma Denúncia Disponível</h1>
      <?php endif; ?>
    <?php endif; ?>





  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>
</body>

</html>