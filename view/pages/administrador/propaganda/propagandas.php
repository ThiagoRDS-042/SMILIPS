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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/propaganda/propagandas.css">
  <title>Propagandas</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
  consultarPropagandasEmAnalise();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Propagandas Para a Analise</h1>

    <?php if ($propagandasEmAnalise->num_rows > 0) : ?>
      <section class="propagandas_container">
        <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
        <div class="propagandas_list">
          <div class="slider_propagandas">
            <?php while ($row = $propagandasEmAnalise->fetch_assoc()) : ?>
              <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['propaganda']) ?>" alt="Imagem da Propaganda">
                <span><a href="/SMILIPS/view/pages/administrador/propaganda/validarPropaganda.php?consultar=<?php echo $row['propagandaID'] ?>">Avaliar</a></span>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
      </section>
    <?php else : ?>
      <h1>Nenhuma Propaganda Disponível Para a Analise :(</h1>
    <?php endif; ?>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/propagandas.js" type="module"></script>
</body>

</html>