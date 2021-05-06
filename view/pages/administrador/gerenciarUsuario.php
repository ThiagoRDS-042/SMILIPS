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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/gerenciarUsuario.css">
  <title>Gerenciar Usuário</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImovelUser
  consultarImovelUser();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Gerenciar Usuário</h1>

    <div class="perfil">
      <form action="/SMILIPS/controller/DAO/usuario/usuarioDAO.php" method="post" class="form-img" enctype="multipart/form-data">
        <label for="btn">
          <div class="img-user">

            <img src="data:image/jpeg;base64,<?php echo base64_encode($ftPerfil) ?>" alt="Imagem do Usuário" class="preview-img">

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
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
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

    <?php if ($imovel->num_rows > 0) : ?>
      <h1>Imóveis do Usuário</h1>
      <!-- se o usuario tiver algum imovel cadastrado, mostra os imoveis e seus detalhes  -->
      <section class="your-imoveis">
        <div class="container-imovel">
          <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
          <div class="list-imovel">
            <div class="cards-imovel">

              <!-- criando um card para cada imovel cadastrado com todas as info do imovel -->
              <?php for ($i = 0; $i < count($arrayImgImovel); $i++) : ?>

                <div class="card <?php if ($arrayImovel[$i]['situacao'] != 'Ativado') : ?> nAtivado <?php endif; ?>">
                  <div class="image">
                    <!-- exibindo a img -->
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($arrayImgImovel[$i]['imagem']) ?>" alt="Imovél">
                  </div>
                  <div class="detalhes">
                    <?php
                    // estruturando os detalhes do imovel em uma so variavel
                    $detalhes = $arrayImovel[$i]['tipo'];
                    $qtdQuarto = $arrayImovel[$i]['qtdQuarto'];
                    $qtdBanheiro = $arrayImovel[$i]['qtdBanheiro'];
                    $qtdGaregem = $arrayImovel[$i]['qtdGaragem'];
                    $area = $arrayImovel[$i]['area'];
                    $bairro = $arrayImovel[$i]['bairro'];
                    $rua = $arrayImovel[$i]['rua'];
                    $numero = $arrayImovel[$i]['numero'];

                    if ($qtdQuarto == 1) {
                      $detalhes .= " com $qtdQuarto quarto, ";
                    } else if ($qtdQuarto > 0) {
                      $detalhes .= " com $qtdQuarto quartos, ";
                    }

                    if ($qtdBanheiro == 1) {
                      $detalhes .= "$qtdBanheiro banheiro, ";
                    } else if ($qtdBanheiro > 0) {
                      $detalhes .= "$qtdBanheiro banheiros, ";
                    }

                    if ($qtdGaregem == 1) {
                      $detalhes .= "$qtdGaregem garagem, ";
                    } else if ($qtdGaregem > 0) {
                      $detalhes .= "$qtdGaregem garagens, ";
                    }

                    $detalhes .= "com $area para alugar em $bairro, rua $rua, número $numero.";
                    ?>

                    <!-- exibindo o valor do alugel do imovel -->
                    <h3>R$ <?php echo $arrayImovel[$i]['valorAluguel'] ?><span>/mês</span></h3>

                    <!-- exibindo os detalhes criado a cima -->
                    <p><?php echo $detalhes ?></p>
                    <?php if ($arrayImovel[$i]['situacao'] == 'Ativado') : ?>
                      <a href="/SMILIPS/view/pages/administrador/gerenciarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>&&usuarioID=<?php echo $_GET['consultar'] ?>">Detalhes <i class="fas fa-pencil-alt"></i></a>
                    <?php elseif ($arrayImovel[$i]['situacao'] == 'Desativado') : ?>
                      <a href="/SMILIPS/view/pages/administrador/gerenciarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>&&usuarioID=<?php echo $_GET['consultar'] ?>">Ativar</a>
                    <?php else : ?>
                      <a href="/SMILIPS/view/pages/administrador/gerenciarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>&&usuarioID=<?php echo $_GET['consultar'] ?>">Em Progresso</a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endfor; ?>

            </div>
          </div>
          <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
        </div>
      </section>
    <?php endif; ?>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/gerenciarUsuario.js" type="module"></script>
  <script src="/SMILIPS/view/js/usuario/perfil.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarEmail.js"></script>
  <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarTelefone.js"></script>
</body>

</html>