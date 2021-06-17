<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de usuarioLogadoEntra(), pra n exibir essa tela caso o usuario n esteja logado
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/usuario/perfil.css">
  <title>Perfil</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  ?>

  <section>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
    ?>
  </section>

  <main>

    <div class="title-perfil">
      <h1>Informações Pessoais</h1>
    </div>

    <div class="perfil">
      <?php
      require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
      ?>
      <form action="/SMILIPS/controller/DAO/usuario/usuarioDAO.php" method="post" class="form-img" enctype="multipart/form-data">
        <label for="btn">
          <div class="img-user">

            <!-- passando o caminho da pagina que exibe o img de perfil do usuario -->
            <img src="/SMILIPS/controller/DAO/usuario/imgPerfil.php" alt="Imagem do Usuário" class="preview-img">

            <!-- passando o id do usuario ao input -->
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            <span class="selecionar"><input type="file" name="ft-perfil" id="btn" class="file-chooser"></span>
            <span><i class="fas fa-camera"></i></span>
          </div>
        </label>
        <button type="submit" name="editarImg">Salvar Foto</button>
      </form>
      <div class="content">
        <form action="/SMILIPS/controller/DAO/usuario/usuarioDAO.php" method="post">
          <div class="info-user">

            <!-- passando todos os dados do usuario para os campos -->
            <input type="hidden" name="id" id="idUser" value="<?php echo $id ?>">
            <div class="field-edit">
              <input type="text" class="focus" name="nome" value="<?php echo $nomeUsuario ?>">
              <span class="info" data-placeholder="Nome*"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="email" id="email" value="<?php echo $emailUsuario ?>">
              <span class="info" data-placeholder="Email*"></span>
              <span id="msgEmail" class="msg"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="telefone" id="telefone" value="<?php echo $telefone ?>">
              <span class="info" data-placeholder="Telefone*"></span>
              <span id="msgTelefone" class="msg"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="rua" value="<?php echo $rua ?>">
              <span class="info" data-placeholder="Rua*"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="bairro" value="<?php echo $bairro ?>">
              <span class="info" data-placeholder="Bairro*"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="numero" value="<?php echo $numero ?>">
              <span class="info" data-placeholder="Número*"></span>
            </div>
            <div class="field-edit">
              <input type="text" class="focus" name="complemento" value="<?php echo $complemento ?>">
              <span class="info" data-placeholder="Complemento"></span>
            </div>

          </div>
          <div class="editar">
            <button type="submit" name="editarInfo">Salvar</button>
          </div>
        </form>
      </div>
    </div>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/perfil.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarEmail.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarTelefone.js"></script>
</body>

</html>