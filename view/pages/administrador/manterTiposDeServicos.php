<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
admLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/manterTiposDeServicos.css">
  <title>Manter Tipos de Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/tipoDeServico/consultar.php');
  consultar();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastrar Tipos de Serviços</h1>
    <div class="cad-tipos-de-servicos">
      <form action="/SMILIPS/controller/DAO/tipoDeServico/tipoDeServicoDAO.php" method="POST">
        <?php if (isset($_GET['editar'])) : ?>
          <input type="hidden" name="id" value="<?php echo $tipoDeServico['tipoDeServicoID'] ?>">
          <input type="text" name="tipo-de-servico" value="<?php echo $tipoDeServico['tipoDeServico'] ?>">
          <button type="submit" name="editar">Salvar</button>
        <?php else : ?>
          <input type="text" name="tipo-de-servico">
          <button type="submit" name="salvar">Salvar</button>
        <?php endif; ?>
      </form>
    </div>

    <?php if ($tiposDeServicos->num_rows > 0) : ?>
      <div class="list-tipos-de-servicos">
        <table>
          <caption>Tipos de Serviços Cadastrados</caption>
          <thead>
            <tr>
              <th>Tipo de Serviço</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $tiposDeServicos->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['tipoDeServico'] ?></td>
                <td><a href="/SMILIPS/view/pages/administrador/manterTiposDeServicos.php?editar=<?php echo $row['tipoDeServicoID'] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><a href="/SMILIPS/controller/DAO/tipoDeServico/tipoDeServicoDAO.php?excluir=<?php echo $row['tipoDeServicoID'] ?>"><i class="fas fa-trash-alt"></i></a></td>
              </tr>
            <?php endwhile; ?>

          </tbody>

        </table>
      </div>
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterTiposDeServicos.js"></script>
</body>

</html>