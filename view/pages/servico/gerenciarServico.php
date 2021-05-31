<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de usuarioLogadoEntra(), pra n exibir essa tela caso o usuario n esteja logado
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/servico/gerenciarServico.css">
  <title>Gerenciar Serviço</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/tipoServico/consultar.php');
  // chamando a funcao consultar
  consultar();
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/servico/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Editar Serviço</h1>

    <section class="edit-services">
      <form action="/SMILIPS/controller/DAO/servico/servicoDAO.php" method="post">
        <div class="type-servico">
          <div class="select-box">
            <div class="list-options">
              <?php while ($row = $tipoServicos->fetch_assoc()) : ?>

                <label for="<?php echo $row['tipoServico'] ?>">
                  <div class="option type">
                    <?php if ($row['tipoServico'] == $servicoTipo['tipoServico']) : ?>
                      <input type="radio" class="radio" id="<?php echo $row['tipoServico'] ?>" name="type" value="<?php echo $row['tipoServico'] ?>" checked />
                    <?php else : ?>
                      <input type="radio" class="radio" id="<?php echo $row['tipoServico'] ?>" name="type" value="<?php echo $row['tipoServico'] ?>" />
                    <?php endif; ?>
                    <span><?php echo $row['tipoServico'] ?></span>
                  </div>
                </label>

              <?php endwhile; ?>
            </div>

            <div class="select" data-placeholder="Tipo de Serviço"><?php echo $servicoTipo['tipoServico'] ?></div>

          </div>
        </div>

        <div class="descricao">
          <input type="hidden" name="idServico" value="<?php echo $_GET['editar'] ?>">
          <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['usuarioID'] ?>">
          <textarea name="descricao" id="descricao" cols="30" rows="5" required maxlength="250"><?php echo $editarServico['descricao'] ?></textarea>
          <span data-placeholder="Descrição" class="info_field"></span>
          <span class="contador">250</span>
        </div>

        <button type="submit" name="editar">Salvar</button>
        <input type="checkbox" id="desativar">
        <label for="desativar">
          <?php if ($editarServico['situacao'] == 'Ativado') : ?>
            <h3 name="desativar-ativar" value="Desativado">Desativar</h3>
          <?php else : ?>
            <h3 name="desativar-ativar" value="Ativado">Ativar</h3>
          <?php endif; ?>
        </label>

        <div class="desativar">
          <?php if ($editarServico['situacao'] == 'Ativado') : ?>
            <h1>Deseja Desativar?</h1>
          <?php else : ?>
            <h1>Deseja Ativar?</h1>
          <?php endif; ?>

          <input type="password" name="senha">
          <span><i class="fas fa-unlock-alt"></i></span>
          <span data-placeholder="Senha" class="info-input"></span>
          <i class="fa fa-eye"></i>

          <?php if ($editarServico['situacao'] == 'Ativado') : ?>
            <button type="submit" name="desativar-ativar" value="Desativado">Sim</button>
          <?php else : ?>
            <button type="submit" name="desativar-ativar" value="Ativado">Sim</button>
          <?php endif; ?>

          <button type="button">Não</button>
        </div>

      </form>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/servico/gerenciar.js" type="module"></script>
</body>

</html>