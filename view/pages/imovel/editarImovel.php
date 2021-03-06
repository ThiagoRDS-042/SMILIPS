<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de usuarioLogadoEntra(), pra n exibir essa tela caso o usuario n esteja logado
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/imovel/editarImovel.css">
  <title>Editar Imóvel</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao   consultarImgsImovel() para retornar todas as imgs do imovel em questao
  consultarImgsImovel();
  ?>

  <main>

    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <!-- se o imovel existir exiba isso, se n, n exibe a msn citada la em baixo -->
    <?php if ($imovel) : ?>
      <?php if ($imovel['situacao'] == 'Ativado') : ?>
        <h1>Editar Imóvel</h1>
      <?php elseif ($imovel['situacao'] == 'Desativado') : ?>
        <h1>Imovel Desativado</h1>
      <?php else : ?>
        <h1>Imóvel em Ánalise</h1>
      <?php endif; ?>
      <input type="checkbox" id="btn_excluir">
      <label for="btn_excluir" class="btn">
        <?php if ($imovel['situacao'] == 'Desativado') : ?>
          <span class="icon-habilitar"><i class="fas fa-check-double"></i></span>
        <?php else : ?>
          <span class="icon-delete"><i class="fas fa-trash-alt"></i></span>
        <?php endif; ?>
      </label>
      <div class="btn_excluir">
        <div class="title">
          <?php if ($imovel['situacao'] == 'Ativado') : ?>
            <h1>Desativar Imóvel?</h1>
          <?php elseif ($imovel['situacao'] == 'Desativado') : ?>
            <h1>Ativar Imóvel?</h1>
          <?php else : ?>
            <h1>Excluir Imóvel?</h1>
          <?php endif; ?>
        </div>
        <form action="/SMILIPS/controller/DAO/imovel/imovelDAO.php" method="POST" class="excluir">
          <div class="senha">
            <?php if ($imovel['situacao'] == 'Ativado') : ?>
              <input type="hidden" value="Desativado" name="situacao">
            <?php elseif ($imovel['situacao'] == 'Desativado') : ?>
              <input type="hidden" value="Ativado" name="situacao">
            <?php else : ?>
              <input type="hidden" value="Em Progresso" name="situacao">
            <?php endif; ?>
            <!-- passando o id do imovel e do usuario para os inputs -->
            <input type="hidden" value="<?php echo $imovel['imovelID'] ?>" name="imovelID">
            <input type="hidden" value="<?php echo $_SESSION['usuarioID'] ?>" name="usuarioID">
            <input type="password" name="senha">
            <i class="fa fa-eye"></i>
            <span data-placeholder="Senha"></span>
            <span class="icon_senha"><i class="fas fa-unlock-alt"></i></span>
          </div>
          <div class="buttons">
            <button type="button">Cancelar</button>
            <Button type="submit" name="situacao-imovel">Confirmar</Button>
          </div>
        </form>
      </div>

      <form action="/SMILIPS/controller/DAO/imovel/imovelDAO.php" method="post" class="info-imovel" enctype="multipart/form-data">
        <h1>Imagens do Imóvel</h1>
        <div class="imgs-imovel">
          <input type="hidden" name="id" value="<?php echo $imovel['imovelID'] ?>" id="id">
          <!-- enquanto tiver imgsimoveis, exiba um card para cada img -->
          <?php while ($row = $imgImovel->fetch_assoc()) : ?>
            <label for="<?php echo $row['imgImovelID'] ?>">
              <input type="file" name="imagem<?php echo $row['imgImovelID'] ?>" id="<?php echo $row['imgImovelID'] ?>">
              <div class="card" id="<?php echo $row['imgImovelID'] ?>">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']) ?>" alt="Imagem de um Imóvel" class="preview-img">
                <span class="icon"><i class="fas fa-camera"></i></span>
              </div>
            </label>
            <!-- finalizando o while -->
          <?php endwhile; ?>
          <span class="obs">Formatos Suportados: PNG, JPG e JPEG, Tamanho Suportado: até 1000 KB.</span>
        </div>

        <!-- apartir daqui vai estar atribuindo os valores tetornados do DB para os respectivos inputs -->
        <div class="type-imv">
          <h1>Detalhes do Imóvel</h1>
          <div class="detalhes">
            <div class="endereco-imovel">

              <div class="field-duo">

                <div class="field-input end">
                  <input type="text" name="rua" required class="obrigatorio" value="<?php echo $imovel['rua'] ?>">
                  <span class="info-field" data-placeholder="Rua"></span>
                </div>

                <div class="field-input num">
                  <input type="text" name="numero" required class="obrigatorio numerico" value="<?php echo $imovel['numero'] ?>">
                  <span class="info-field" data-placeholder="Número"></span>
                </div>

              </div>

              <div class="field-duo">

                <div class="field-input">
                  <input type="text" name="bairro" required class="obrigatorio" value="<?php echo $imovel['bairro'] ?>">
                  <span class="info-field" data-placeholder="Bairro"></span>
                </div>

                <div class="field-input">
                  <input type="text" name="complemento" class="complemento" value="<?php echo $imovel['complemento'] ?>">
                  <span class="info-field" data-placeholder="Complemento"></span>
                </div>

              </div>

            </div>

            <div class="comodos">
              <div class="field-for">

                <div class="field-input">
                  <input type="text" name="qtdQuarto" required class="obrigatorio numerico" value="<?php echo $imovel['qtdQuarto'] ?>">
                  <span class="info-field" data-placeholder="Quarto"></span>
                </div>

                <div class="field-input">
                  <input type="text" name="qtdBanheiro" required class="obrigatorio numerico" value="<?php echo $imovel['qtdBanheiro'] ?>">
                  <span class="info-field" data-placeholder="Banheiro"></span>
                </div>

                <div class="field-input">
                  <input type="text" name="qtdGaragem" required class="obrigatorio numerico" value="<?php echo $imovel['qtdGaragem'] ?>">
                  <span class="info-field" data-placeholder="Garagem"></span>
                </div>

                <div class="field-input">
                  <input type="text" name="area" required class="obrigatorio" value="<?php echo $imovel['area'] ?>">
                  <span class="info-field" data-placeholder="Área"></span>
                </div>

              </div>

              <div class="field-input desc">
                <textarea name="descricao" id="descricao" cols="30" rows="4" maxlength="200"><?php echo $imovel['descricao'] ?></textarea>
                <span class="info-field" data-placeholder="Descrição"></span>
                <span class="counter">200</span>
              </div>

            </div>

            <div class="type-value">
              <div class="select-box">
                <!-- aqui verifica-se qual o tipo de imovel cadastrado no DB para tornalo checked -->
                <div class="list-options">

                  <label for="apartamento">
                    <div class="option type">
                      <?php if ($imovel['tipo'] == 'Apartamento') : ?>
                        <input type="radio" class="radio" id="apartamento" name="type" value="Apartamento" checked />
                      <?php else : ?>
                        <input type="radio" class="radio" id="apartamento" name="type" value="Apartamento" />
                      <?php endif ?>
                      <span>Apartamento</span>
                    </div>
                  </label>

                  <label for="residencial">
                    <div class="option type">
                      <?php if ($imovel['tipo'] == 'Residencial') : ?>
                        <input type="radio" class="radio" id="residencial" name="type" value="Residencial" checked />
                      <?php else : ?>
                        <input type="radio" class="radio" id="residencial" name="type" value="Residencial" />
                      <?php endif ?>
                      <span>Residencial</span>
                    </div>
                  </label>

                  <label for="comercial">
                    <div class="option type">
                      <?php if ($imovel['tipo'] == 'Comercial') : ?>
                        <input type="radio" class="radio" id="comercial" name="type" value="Comercial" checked />
                      <?php else : ?>
                        <input type="radio" class="radio" id="comercial" name="type" value="Comercial" />
                      <?php endif ?>
                      <span>Comercial</span>
                    </div>
                  </label>

                  <label for="kitnet">
                    <div class="option type">
                      <?php if ($imovel['tipo'] == 'Kitnet') : ?>
                        <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" checked />
                      <?php else : ?>
                        <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" />
                      <?php endif ?>
                      <span>Kitnet</span>
                    </div>
                  </label>

                </div>

                <div class="select" data-placeholder="Tipo de Imóvel"><?php echo $imovel['tipo'] ?></div>

              </div>

              <div class="field-input">
                <input type="text" name="valor" required class="obrigatorio numerico" value="<?php echo $imovel['valorAluguel'] ?>">
                <span class="info-field" data-placeholder="Valor"></span>
              </div>

            </div>

          </div>
        </div>

        <div class="btn-enviar">
          <button type="submit" name="editar-imovel">Salvar</button>
        </div>
      </form>
    <?php else : ?>
      <h1>Você não Possui Imóveis Cadastrados! :(</h1>
    <?php endif; ?>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/editarImovel.js" type="module"></script>
</body>

</html>