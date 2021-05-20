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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/plano/consultar.php');
  consultar();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Escolher Plano</h1>

    <section class="planos">

      <?php while ($row = $planos->fetch_assoc()) : ?>
        <div class="card">
          <span class="efect"></span>
          <span class="efect"></span>
          <span class="efect"></span>
          <span class="efect"></span>
          <span class="numeracao">1</span>
          <div class="title">
            <p><?php echo $row['nome'] ?></p>
          </div>

          <div class="valor">
            <p>R$ <?php echo $row['valor'] ?>/<span>MÊS</span></p>
          </div>

          <div class="descricao">
            <p><?php echo $row['descricao'] ?></p>
          </div>

          <div class="btn">
            <a href="/SMILIPS/view/pages/plano/efetivarPlano.php?efetivar=<?php echo $row['planoID'] ?>">Selecionar</a>
          </div>

        </div>
      <?php endwhile; ?>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/plano/escolherPlano.js"></script>
</body>

</html>