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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/propagandas.css">
  <title>Propagandas</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
  consultarPropagandasEmAnalise();
  ?>

  <main>
    <h1>Propagandas Para a Analise</h1>

    <section class="planos_container">
      <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
      <div class="planos_list">
        <div class="slider_planos">
          <?php while ($row = $propagandasEmAnalise->fetch_assoc()) : ?>
            <div class="card">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($row['propaganda']) ?>" alt="Imagem da Propaganda">
              <span><a href="#">Detalhes</a></span>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>
</body>

</html>