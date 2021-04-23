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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/manterServicos.css">
  <title>Manter Tipos de Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/servico/consultar.php');
  consultar();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastrar Tipos de Serviços</h1>
    <section class="cad-servicos">
      <form action="/SMILIPS/controller/DAO/servico/servicoDAO.php" method="POST">
        <?php if (isset($_GET['editar'])) : ?>
          <input type="hidden" name="id" value="<?php echo $servico['servicoID'] ?>">
          <input type="text" name="servico" value="<?php echo $servico['servico'] ?>">
          <button type="submit" name="editar">Salvar</button>
        <?php else : ?>
          <input type="text" name="servico">
          <button type="submit" name="salvar">Salvar</button>
        <?php endif; ?>
      </form>
    </section>

    <?php if ($servicos->num_rows > 0) : ?>
      <section class="list-servicos">
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
            <?php while ($row = $servicos->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['servico'] ?></td>
                <td><a href="/SMILIPS/view/pages/administrador/manterServicos.php?editar=<?php echo $row['servicoID'] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td>
                  <!-- <a href="/SMILIPS/controller/DAO/servico/servicoDAO.php?excluir=< echo $row['servicoID'] ?>"><i class="fas fa-trash-alt"></i></a> -->
                  <input type="checkbox" id="<?php echo $row['servicoID'] ?>">
                  <label for="<?php echo $row['servicoID'] ?>">
                    <i class="fas fa-trash-alt"></i>
                  </label>
                  <div class="excluir">
                    <h3>Exlcuir?</h3>
                    <button class="btnSim"><a href="/SMILIPS/controller/DAO/servico/servicoDAO.php?excluir=<?php echo $row['servicoID'] ?>">Sim</a></button>
                    <button class="btnNao">Não</button>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>

          </tbody>

        </table>
      </section>
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterTiposDeServicos.js"></script>
</body>

</html>