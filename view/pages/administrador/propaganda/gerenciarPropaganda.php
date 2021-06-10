<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/propaganda/gerenciarPropaganda.css">
  <title>Gerenciar Propaganda</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <?php if ($propagandaUser['situacao'] == 'Em Analise') : ?>
      <h1>Propaganda em Analise</h1>
    <?php elseif ($propagandaUser['situacao'] == 'Ativada') : ?>
      <h1>Propaganda Ativada</h1>
    <?php else : ?>
      <h1>Propaganda Desativada</h1>
    <?php endif; ?>

    <input type="checkbox" id="delete">
    <label for="delete">
      <span class="icon_delete"><i class="fas fa-trash-alt"></i></span>
    </label>

    <form action="/SMILIPS/controller/DAO/propaganda/propagandaDAO.php" method="post">
      <div class="delete">
        <div class="title">
          <h3>Deseja Deletar?</h3>
        </div>

        <div class="field">
          <input type="hidden" name="id" value="<?php echo $propagandaUser['propagandaID'] ?>">
          <input type="hidden" name="idUser" value="<?php echo $_GET['usuarioID'] ?>">
          <div class="motivo">
            <textarea name="motivo" id="motivo" cols="30" rows="5" maxlength="250"></textarea>
            <span class="info">Motivo</span>
            <span class="count">250</span>
          </div>
        </div>

        <div class="buttons">
          <button type="button">Cancelar</button>
          <button type="submite" name="situacao" value="Excluida">Sim</button>
        </div>

      </div>
    </form>

    <form action="/SMILIPS/controller/DAO/propaganda/propagandaDAO.php" method="post" enctype="multipart/form-data">
      <label for="edity">
        <div class="edity">
          <span class="icon"><i class="fas fa-camera"></i></span>
          <input type="file" name="propaganda" id="edity">
          <input type="hidden" name="id" id="id" value="<?php echo $propagandaUser['propagandaID'] ?>">
          <input type="hidden" name="idUser" id="idUser" value="<?php echo $_GET['usuarioID'] ?>">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($propagandaUser['propaganda']) ?>" alt="image">
        </div>
      </label>
      <span>Formatos Suportados: PNG, JPG e JPEG, Tamanho Suportado: até 1000 KB.</span>
      <button type="submit" name="editar">Salvar</button>
    </form>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/propaganda/editar.js" type="module"></script>

  <script src="/SMILIPS/view/js/administrador/manter.js" type="module"></script>
</body>

</html>