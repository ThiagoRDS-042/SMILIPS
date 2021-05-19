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
  <link rel="stylesheet" href="/SMILIPS/view/css/propaganda/editar.css">
  <title>Editar Anúncio</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <?php if ($propagandaUser['situacao'] == 'Em Analise') : ?>
      <h1>Anúncio em Analise</h1>
    <?php elseif ($propagandaUser['situacao'] == 'Ativada') : ?>
      <h1>Anúncio Ativado</h1>
    <?php else : ?>
      <h1>Anúncio Desativado</h1>
    <?php endif; ?>

    <input type="checkbox" id="delete">
    <label for="delete">
      <?php if ($propagandaUser['situacao'] == 'Desativada') : ?>
        <span class="icon_done"><i class="fas fa-check-double"></i></span>
      <?php else : ?>
        <span class="icon_delete"><i class="fas fa-trash-alt"></i></span>
      <?php endif; ?>

    </label>

    <form action="/SMILIPS/controller/DAO/propaganda/propagandaDAO.php" method="post">
      <div class="delete">
        <div class="title">
          <?php if ($propagandaUser['situacao'] == 'Em Analise') : ?>
            <h3>Deseja Deletar?</h3>
          <?php elseif ($propagandaUser['situacao'] == 'Ativada') : ?>
            <h3>Deseja Desativar?</h3>
          <?php else : ?>
            <h3>Deseja Ativar?</h3>
          <?php endif; ?>
        </div>

        <div class="field">
          <input type="hidden" name="id" value="<?php echo $propagandaUser['propagandaID'] ?>">
          <input type="password" name="senha">
          <span class="icon_senha"><i class="fas fa-eye"></i></span>
          <span class="icon"><i class="fas fa-unlock-alt"></i></span>
          <span data-placeholder="Senha" class="info"></span>
        </div>

        <div class="buttons">
          <button type="button">Cancelar</button>
          <?php if ($propagandaUser['situacao'] == 'Em Analise') : ?>
            <button type="submite" name="situacao" value="Excluida">Sim</button>
          <?php elseif ($propagandaUser['situacao'] == 'Ativada') : ?>
            <button type="submite" name="situacao" value="Desativada">Sim</button>
          <?php else : ?>
            <button type="submite" name="situacao" value="Ativada">Sim</button>
          <?php endif; ?>

        </div>

      </div>
    </form>

    <form action="/SMILIPS/controller/DAO/propaganda/propagandaDAO.php" method="post" enctype="multipart/form-data">
      <label for="edity">
        <div class="edity">
          <span class="icon"><i class="fas fa-camera"></i></span>
          <input type="file" name="propaganda" id="edity">
          <input type="hidden" name="id" id="id" value="<?php echo $propagandaUser['propagandaID'] ?>">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($propagandaUser['propaganda']) ?>" alt="image">
        </div>
      </label>
      <span>Formatos Suportados: PNG, JPG e JPEG, Tamanho Suportado: até 1000 KB.</span>
      <button type="submit" name="editar">Salvar</button>
    </form>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/propaganda/editar.js" type="module"></script>
</body>

</html>