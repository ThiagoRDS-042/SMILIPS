<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/gerenciarServicos.css">
  <title>Gerenciar Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/tipoServico/consultar.php');
  // chamando a funcao consultar
  consultar();
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/servico/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Gerenciar Serviço</h1>

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
          <input type="hidden" name="idTipoServico" value="<?php echo  $tipoServico['tipoServicoID'] ?>">
          <input type="hidden" name="idServico" value="<?php echo $_GET['servicoID'] ?>">
          <input type="hidden" name="idUsuario" value="<?php echo $_GET['usuarioID'] ?>">
          <textarea name="descricao" id="descricao" cols="30" rows="5" required maxlength="250"><?php echo $editarServico['descricao'] ?></textarea>
          <span data-placeholder="Descrição" class="info_field"></span>
          <span class="contador">250</span>
        </div>

        <button type="submit" name="editar">Salvar</button>
        <input type="checkbox" id="desativar">
        <label for="desativar">
          <h3 name="desativar-ativar" value="Excluir">Excluir</h3>
        </label>

        <div class="desativar">
          <h1>Deseja Excluir?</h1>
          <span><i class="fas fa-trash-alt"></i></span>
          <button type="submit" name="desativar-ativar" value="Excluir">Sim</button>
          <button type="button">Não</button>
        </div>

      </form>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/servico/gerenciar.js" type="module"></script>
</body>

</html>