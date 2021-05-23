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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/tipoServico/manterServicos.css">
  <title>Manter Tipos de Serviços</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/tipoServico/consultar.php');
  // chamando a funcao consultar
  consultar();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Cadastrar Tipos de Serviços</h1>
    <section class="cad-servicos">
      <form action="/SMILIPS/controller/DAO/tipoServico/tipoServicoDAO.php" method="POST">
        <!-- mesma coisa da pagina de manterPlanos, se a variavel get editar existir, atribuia valores aos campos e mude o nome do botao de salvar para editar -->
        <?php if (isset($_GET['editar'])) : ?>
          <input type="hidden" name="id" value="<?php echo $_GET['editar'] ?>">
          <input type="text" name="servico" value="<?php echo $tipoServico['tipoServico'] ?>">
          <button type="submit" name="editar">Salvar</button>
        <?php else : ?>
          <input type="text" name="servico">
          <button type="submit" name="salvar">Salvar</button>
        <?php endif; ?>
      </form>
    </section>

    <!-- se tiver servicos cadastrados exiba eles -->
    <?php if ($tipoServicos->num_rows > 0) : ?>
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

            <!-- cria uma linha na tabela para cada servico -->
            <?php while ($row = $tipoServicos->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['tipoServico'] ?></td>
                <td><a href="/SMILIPS/view/pages/administrador/tipoServico/manterServicos.php?editar=<?php echo $row['tipoServicoID'] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td>
                  <!-- mesma coisa da pagina manterPlanos, tendo um label e checkbox para cada icone de exclusao q quando clicado abre o popup de exclusao -->
                  <input type="checkbox" id="<?php echo $row['tipoServicoID'] ?>">
                  <label for="<?php echo $row['tipoServicoID'] ?>">
                    <i class="fas fa-trash-alt"></i>
                  </label>
                  <div class="excluir">
                    <h3>Exlcuir?</h3>
                    <button class="btnSim"><a href="/SMILIPS/controller/DAO/tipoServico/tipoServicoDAO.php?excluir=<?php echo $row['tipoServicoID'] ?>">Sim</a></button>
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
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/manterTiposDeServicos.js" type="module"></script>
</body>

</html>