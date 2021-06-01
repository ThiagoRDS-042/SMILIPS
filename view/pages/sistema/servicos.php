<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/sistema/servicos.css">
  <title>Serviços</title>
</head>

<body>
  <header>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
    require_once('/xampp/htdocs/SMILIPS/controller/DAO/servico/consultar.php');
    require_once('/xampp/htdocs/SMILIPS/controller/filtros/filtrarServicos.php');
    if (!isset($_GET['filtro'])) {
      consultarServicos();
    } else {
      consultarServicosFiltro();
    }
    ?>
  </header>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <div class="search">
      <form action="/SMILIPS/controller/filtros/filtrarServicos.php" method="post">
        <input type="text" name="pesquisa" placeholder="Pesquise por Serviços">
        <button type="submit" name="filtrar_servicos"><i class="fas fa-search"></i></button>
      </form>
    </div>


    <?php if ($servicos->num_rows > 0) : ?>
      <h1>Serviços</h1>

      <section class="servicos">
        <?php while ($row = $servicos->fetch_assoc()) : ?>
          <div class="card">
            <div class="ftPerfil">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($row['ftPerfil']) ?>" alt="foto de perfil do prestador de serviço">
            </div>

            <div class="info_servico">
              <div class="nomeUsuario">
                <p><?php echo $row['nomeUsuario'] ?></p>
              </div>

              <div class="tipo_servico">
                <p>(<?php echo $row['tipoServico'] ?>)</p>
              </div>

              <div class="descricao">
                <p><?php echo $row['descricao'] ?></p>
              </div>

              <div class="detalhes">
                <a href="#">Detalhes</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </section>
    <?php else : ?>
      <h1>Nenhum Serviço Disponível :(</h1>
    <?php endif; ?>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>
</body>

</html>