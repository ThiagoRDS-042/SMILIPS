<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/plano/consultar.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/plano/efetivarPlano.css">
  <title>Efetivar Plano</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Efetivar Plano</h1>

    <section class="efetivar_plano">
      <div class="field_duo">

        <div class="field_input_view">
          <div class="input">
            <p><?php echo $plano['nome'] ?></p>
          </div>
          <span>Nome</span>
        </div>

        <div class="field_input_view">
          <div class="input">
            <p><?php echo $plano['valor'] ?></p>
          </div>
          <span>Valor</span>
        </div>

      </div>

      <div class="field_duo">

        <div class="field_input_view">
          <div class="input">
            <p><?php echo $plano['duracao'] ?></p>
          </div>
          <span>Duração em Dias</span>
        </div>

        <div class="field_input_view">
          <div class="input">
            <p><?php echo $plano['qtdAnuncio'] ?></p>
          </div>
          <span>Quantidade de Anúncios</span>
        </div>

      </div>

      <div class="field_input_view">
        <div class="input">
          <p><?php echo $plano['descricao'] ?></p>
        </div>
        <span>Descrição</span>
      </div>

    </section>

    <h1 class="inst">Instruções</h1>
    <div class="instrucoes">
      <div class="lista">
        <ul>
          <li>Efetive seu plano atravez de um deposito, na conta: 1960.013.000245-9;</li>
          <li>Ou efetive seu plano atravez de um pix, para smilips@gmail.com;</li>
          <li>Tire uma foto do comprovante de deposito ou do pix e anexe abaixo.</li>
        </ul>
      </div>
      <div class="field_input">
        <form action="/SMILIPS/controller/DAO/planoUsuario/planoUsuarioDAO.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="planoID" value="<?php echo $_GET['efetivar'] ?>">
          <input type="file" name="comprovante">

          <button type="submit" name="salvar">Enviar</button>
        </form>
      </div>
    </div>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>
</body>

</html>