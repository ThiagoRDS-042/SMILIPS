<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/plano/consultar.php');
  consultar();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/manterPlanos.css">
  <title>Manter Planos</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Cadastrar Planos</h1>

    <section class="cad-plano">
      <form action="/SMILIPS/controller/DAO/plano/planoDAO.php" method="POST">
        <div class="field-duo">
          <div class="field-input">
            <?php if (isset($_GET['editar'])) : ?>
              <input type="hidden" name="id" value="<?php echo $plano['planoID'] ?>">
              <input type="text" name="nome" required value="<?php echo $plano['nome'] ?>">
            <?php else : ?>
              <input type="text" name="nome" required>
            <?php endif; ?>
            <span class="info-field" data-placeholder="Nome"></span>
          </div>
          <div class="field-input">
            <?php if (isset($_GET['editar'])) : ?>
              <input type="text" name="valor" required class="numerico" value="<?php echo $plano['valor'] ?>">
            <?php else : ?>
              <input type="text" name="valor" required class="numerico">
            <?php endif; ?>
            <span class="info-field" data-placeholder="Valor"></span>
          </div>
        </div>

        <div class="field-input">
          <?php if (isset($_GET['editar'])) : ?>
            <textarea name="descricao" id="descricao" cols="30" rows="4" required maxlength="250"><?php echo $plano['descricao']; ?></textarea>
          <?php else : ?>
            <textarea name="descricao" id="descricao" cols="30" rows="4" required maxlength="250"></textarea>
          <?php endif; ?>
          <span class="info-field" data-placeholder="Descrição"></span>
          <span class="counter">250</span>
        </div>

        <div class="field-button">
          <?php if (isset($_GET['editar'])) : ?>
            <button name="editar" type="submit">Salvar</button>
          <?php else : ?>
            <button name="salvar" type="submit">Salvar</button>
          <?php endif; ?>
        </div>
      </form>

    </section>

    <?php if ($planos->num_rows > 0) : ?>
      <section class="list-planos">
        <div class="title">
          <h1>Planos Cadastrados</h1>
        </div>

        <div class="planos">
          <?php while ($row = $planos->fetch_assoc()) : ?>
            <div class="card">
              <span class="efect"></span>
              <span class="efect"></span>
              <span class="efect"></span>
              <span class="efect"></span>
              <div class="nome">
                <h1><?php echo $row['nome'] ?></h1>
              </div>
              <div class="valor">
                <p>R$ <?php echo $row['valor'] ?>,00<span>/Mês</span></p>
              </div>
              <div class="descricao">
                <p><?php echo $row['descricao'] ?></p>
              </div>
              <div class="acoes">
                <a href="/SMILIPS/view/pages/administrador/manterPlanos.php?editar=<?php echo $row['planoID'] ?>"><i class=" fas fa-pencil-alt"></i></a>
                <input type="checkbox" id="<?php echo $row['planoID'] ?>">
                <label for="<?php echo $row['planoID'] ?>">
                  <i class=" fas fa-trash-alt"></i>
                </label>
                <div class="excluir">
                  <h3>Excluir?</h3>
                  <button class="btnSim"><a href="/SMILIPS/controller/DAO/plano/planoDAO.php?excluir=<?php echo $row['planoID'] ?>">Sim</a></button>
                  <button class="btnNao">Não</button>
                </div>
              </div>

            </div>
          <?php endwhile; ?>
        </div>

      </section>
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterPlanos.js" type="module"></script>
</body>

</html>