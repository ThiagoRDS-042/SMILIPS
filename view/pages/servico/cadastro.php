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
  <link rel="stylesheet" href="/SMILIPS/view/css/servico/cadastro.css">
  <title>Cadastro de Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/tipoServico/consultar.php');
  // chamando a funcao consultar
  consultar();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastro de Serviços</h1>

    <section class="cad-servico">
      <form action="/SMILIPS/controller/DAO/servico/servicoDAO.php" method="post">
        <div class="type-servico">
          <div class="select-box">

            <div class="list-options">
              <?php while ($row = $tipoServicos->fetch_assoc()) : ?>

                <label for="<?php echo $row['tipoServico'] ?>">
                  <div class="option type">
                    <input type="radio" class="radio" id="<?php echo $row['tipoServico'] ?>" name="type" value="<?php echo $row['tipoServico'] ?>" />
                    <span><?php echo $row['tipoServico'] ?></span>
                  </div>
                </label>

              <?php endwhile; ?>
            </div>

            <div class="select">Tipo de Serviço</div>

          </div>
        </div>

        <div class="descricao">
          <input type="hidden" name="idUser" value="<?php echo $_SESSION['usuarioID'] ?>">
          <textarea name="descricao" id="descricao" cols="30" rows="5" required maxlength="250"></textarea>
          <span data-placeholder="Descrição" class="info_field"></span>
          <span class="contador">250</span>
        </div>

        <button type="submit" name="salvar">Salvar</button>
      </form>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/servico/cadastro.js" type="module"></script>
</body>

</html>