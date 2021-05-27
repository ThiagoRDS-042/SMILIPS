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
    consultarServicos();
    ?>
  </header>

  <main>
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
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>
</body>

</html>