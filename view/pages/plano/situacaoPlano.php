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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/planoUsuario/consultar.php');
  consultarPlano();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/plano/situacaoPlano.css">
  <title>Situação do Plano Escolhido</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <h1>Situação do Plano Escolhido</h1>

    <section class="situacao_plano">
      <div class="plano">
        <h3><?php echo $plano ?></h3>
      </div>
      <div class="situacao">
        <span class="enviado" data-placeholder="Enviado"></span>
        <span class="ativo" data-placeholder="Ativo"></span>
        <?php if ($planoUsuario['situacao'] == 'Ativado') : ?>
          <span class="analise active" data-placeholder="Em Analise"></span>
          <input type="range" name="situacao" min="1" max="3" value="3">
        <?php else : ?>
          <span class="analise" data-placeholder="Em Analise"></span>
          <input type="range" name="situacao" min="1" max="3" value="2">
        <?php endif; ?>
      </div>
    </section>

    <div class="escolher_plano">
      <a href="/SMILIPS/view/pages/plano/escolherPlano.php?planoNome">Visualizar Planos</a>
    </div>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>
</body>

</html>