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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/adm/editarSenha.css">
  <title>Editar Senha</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <form action="/SMILIPS/controller/DAO/administrador/administradorDAO.php" method="post">
      <div class="editar-senha">
        <h1>Editar Senha</h1>
        <div class="content">
          <div class="card">
            <label>Confirme a Senha Atual</label>
            <div class="field-senha">
              <input type="password" name="senhaAtual" id="senhaAtual" class="senhaAtual" required>
              <span data-placerholder="Senha Atual" class="info"></span>
              <span class="msgAtual" id="msgSenhaAtual"></span>
              <i class="fa fa-eye"></i>
            </div>
          </div>
          <div class="card">
            <!-- passando o id do adm para o campo -->
            <input type="hidden" name="id" id="idAdm" value="<?php echo $_SESSION['idAdm'] ?>">
            <label>Digite sua Nova Senha</label>
            <div class="field-senha">
              <input type="password" name="senha1" id="senha1" class="senha" required>
              <span data-placerholder="Nova Senha" class="info"></span>
              <span class="msg" id="msgSenha1"></span>
              <i class="fa fa-eye"></i>
            </div>
          </div>
          <div class="card">
            <label>Repita a Senha</label>
            <div class="field-senha">
              <input type="password" name="senha2" id="senha2" class="senha" required>
              <span data-placerholder="Nova Senha" class="info"></span>
              <span class="msg" id="msgSenha2"></span>
              <i class="fa fa-eye"></i>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name="editarSenha">Salvar</button>
    </form>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/editarSenha.js" type="module"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarSenha.js"></script>
</body>

</html>