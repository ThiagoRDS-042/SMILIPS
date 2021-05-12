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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/validarImovel.css">
  <title>Válidar Imóvel</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImgsImovel
  consultarImgsImovel();
  ?>

  <main>
    <h1>Válidar Imóvel</h1>

    <section class="info-imovel">
      <h1>Imagens do Imóvel</h1>
      <div class="imgs-imovel">
        <!-- enquanto tiver imgsimoveis, exiba um card para cada img -->
        <?php while ($row = $imgImovel->fetch_assoc()) : ?>
          <div class="card" id="<?php echo $row['imgImovelID'] ?>">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']) ?>" alt="Imagem de um Imóvel" class="preview-img">
          </div>
          <!-- finalizando o while -->
        <?php endwhile; ?>
      </div>

      <h1>Detalhes do Imóvel</h1>
      <div class="detalhes-imovel">
        <h1>Endereço</h1>
        <div class="endereco">

          <div class="field-duo">
            <div class="rua">
              <p><?php echo $imovel['rua'] ?></p>
              <span>Rua</span>
            </div>

            <div class="numero">
              <p><?php echo $imovel['numero'] ?></p>
              <span>Número</span>
            </div>

          </div>

          <div class="field-duo">

            <div class="bairro">
              <p><?php echo $imovel['bairro'] ?></p>
              <span>Bairro</span>
            </div>

            <div class="complemento">
              <?php if ($imovel['complemento'] == '') : ?>
                <p>Não Informado!</p>
              <?php else : ?>
                <p><?php echo $imovel['complemento'] ?></p>
              <?php endif; ?>
              <span>Complemento</span>
            </div>
          </div>
        </div>

        <h1>Detalhes</h1>
        <div class="detalhes">
          <div class="field-quadruplo">
            <div class="quarto">
              <p><?php echo $imovel['qtdQuarto'] ?></p>
              <span>Quartos</span>
            </div>
            <div class="banheiro">
              <p><?php echo $imovel['qtdBanheiro'] ?></p>
              <span>Banheiros</span>
            </div>
            <div class="garagem">
              <p><?php echo $imovel['qtdGaragem'] ?></p>
              <span>Garagens</span>
            </div>
            <div class="area">
              <p><?php echo $imovel['area'] ?></p>
              <span>Área</span>
            </div>
          </div>
          <div class="field">
            <div class="descricao">
              <?php if ($imovel['complemento'] == '') : ?>
                <p>Não Informado!</p>
              <?php else : ?>
                <p><?php echo $imovel['descricao'] ?></p>
              <?php endif; ?>
              <span>Descrição</span>
            </div>
          </div>

        </div>

        <h1>Valor</h1>
        <div class="valor">
          <div class="field">
            <div class="valor-imovel">
              <p>R$ <?php echo $imovel['valorAluguel'] ?>,00</p>
              <span>Valor</span>
            </div>
          </div>
        </div>

      </div>

      <h1>Detalhes do Proprietário</h1>
      <div class="detalhes-proprietario">
        <div class="img-perfil">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($usuario['ftPerfil']) ?>" alt="">
        </div>
        <div class="info-user">
          <div class="field-duo">
            <div class="nome">
              <p><?php echo $usuario['nomeUsuario'] ?></p>
              <span>Nome</span>
            </div>
            <div class="telefone">
              <p><?php echo $usuario['telefone'] ?></p>
              <span>Telefone</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="rua">
              <p><?php echo $usuario['rua'] ?></p>
              <span>Rua</span>
            </div>
            <div class="numero">
              <p><?php echo $usuario['numero'] ?></p>
              <span>Número</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="bairro">
              <p><?php echo $usuario['bairro'] ?></p>
              <span>Bairro</span>
            </div>
            <div class="complemento">
              <?php if ($usuario['complemento'] == '') : ?>
                <p>Não Informado!</p>
              <?php else : ?>
                <p><?php echo $usuario['complemento'] ?></p>
              <?php endif; ?>
              <span>Complemento</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="email">
              <p><?php echo $usuario['emailUsuario'] ?></p>
              <span>E-mail</span>
            </div>
          </div>
        </div>
      </div>

      <form action="/SMILIPS/controller/DAO/administrador/administradorDAO.php" method="post">
        <input type="hidden" name="id" value="<?php echo $imovel['imovelID'] ?>" id="id">
        <input type="checkbox" id="imovel_invalido">
        <label for="imovel_invalido">
          <h3 name="analisar" value="excluir">Inválidar</h3>
        </label>
        <!-- <button type="submit" name="analisar" value="excluir">Inválidar</button> -->
        <button type="submit" name="analisar" value="validar">Válidar</button>

        <div class="msg_imovel">
          <div class="title">
            <h1>Inválidar Imóvel?</h1>
          </div>

          <div class="content">
            <textarea name="descricao" id="descricao" cols="30" rows="5" required maxlength="250"></textarea>
            <span data-placeholder='Motivo'></span>
          </div>

          <div class="buttons">
            <button type="button" name="cancelar">Cancelar</button>
            <button type="submit" name="analisar" value="excluir">Confirmar</button>
          </div>
        </div>
      </form>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/validarImovel.js" type="module"></script>
</body>

</html>