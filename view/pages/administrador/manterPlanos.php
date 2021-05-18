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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/plano/consultar.php');
  // chamando a funcao de consultar
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
            <!-- se a variavel get editar exisitir passe o id e o nome do plano para os campos -->
            <?php if (isset($_GET['editar'])) : ?>
              <input type="hidden" name="id" value="<?php echo $plano['planoID'] ?>">
              <input type="text" name="nome" required value="<?php echo $plano['nome'] ?>">
            <?php else : ?>
              <input type="text" name="nome" required>
            <?php endif; ?>
            <span class="info-field" data-placeholder="Nome"></span>
          </div>
          <div class="field-input">
            <!-- se a variavel get editar exisitir passe o valor do plano para o input -->
            <?php if (isset($_GET['editar'])) : ?>
              <input type="text" name="valor" required class="numerico" value="<?php echo $plano['valor'] ?>">
            <?php else : ?>
              <input type="text" name="valor" required class="numerico">
            <?php endif; ?>
            <span class="info-field" data-placeholder="Valor"></span>
          </div>
        </div>

        <div class="field-input duracao">
          <!-- se a variavel get editar exisitir passe o valor do plano para o input -->
          <?php if (isset($_GET['editar'])) : ?>
            <input type="text" name="duracao" required class="numerico" value="<?php echo $plano['duracao'] ?>">
          <?php else : ?>
            <input type="text" name="duracao" required class="numerico">
          <?php endif; ?>

          <span class="info-field" data-placeholder="Duração em Dias"></span>
        </div>

        <div class="field-input">
          <!-- se a variavel get editar exisitir passe o valor do plano para o input -->
          <?php if (isset($_GET['editar'])) : ?>
            <textarea name="descricao" id="descricao" cols="30" rows="4" required maxlength="250"><?php echo $plano['descricao']; ?></textarea>
          <?php else : ?>
            <textarea name="descricao" id="descricao" cols="30" rows="4" required maxlength="250"></textarea>
          <?php endif; ?>
          <span class="info-field" data-placeholder="Descrição"></span>
          <span class="counter">250</span>
        </div>

        <div class="field-button">
          <!-- se a variavel get editar exisitr altere o nome do botao de salvar para editar -->
          <?php if (isset($_GET['editar'])) : ?>
            <button name="editar" type="submit">Salvar</button>
          <?php else : ?>
            <button name="salvar" type="submit">Salvar</button>
          <?php endif; ?>
        </div>
      </form>

    </section>

    <!-- se tiver planos cadastrados exiba eles -->
    <?php if ($planos->num_rows > 0) : ?>
      <section class="list-planos">
        <div class="title">
          <h1>Planos Cadastrados</h1>
        </div>

        <div class="planos">

          <!-- cria cards para cada plano cadastrado no DB -->
          <?php while ($row = $planos->fetch_assoc()) : ?>
            <div class="card">
              <span class="efect"></span>
              <span class="efect"></span>
              <span class="efect"></span>
              <span class="efect"></span>
              <div class="nome">
                <!-- passando o nome do plano -->
                <h1><?php echo $row['nome'] ?></h1>
              </div>
              <div class="valor">
                <!-- passando o valor do plano -->
                <p>R$ <?php echo $row['valor'] ?>,00</p>
              </div>
              <div class="descricao">
                <!-- passando a descricao do plano -->
                <p><?php echo $row['descricao'] ?></p>
              </div>
              <div class="acoes">

                <!-- passando a varival get o id do plano para a edicao -->
                <a href="/SMILIPS/view/pages/administrador/manterPlanos.php?editar=<?php echo $row['planoID'] ?>"><i class=" fas fa-pencil-alt"></i></a>

                <!-- cada icone de excluir possui um label q quando clicado aciona o checkbox e exibe o popup de exclusao -->
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

            <!-- finalizando o while -->
          <?php endwhile; ?>
        </div>

      </section>

      <!-- finalizando o if -->
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterPlanos.js" type="module"></script>
</body>

</html>