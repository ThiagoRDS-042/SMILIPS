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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/imoveis.css">
  <title>Gerenciar Imóveis</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImovelUser
  consultarImovelUser();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Gerenciar Imóveis</h1>

    <!-- se o usuario tiver algum imovel cadastrado, mostra os imoveis e seus detalhes  -->
    <?php if ($imovel->num_rows > 0) : ?>
      <section class="your-imoveis">
        <h1>Imóveis Em Processo de Ánalise</h1>
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
                    <a href="/SMILIPS/view/pages/administrador/validarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>">Detalhes</a>
                  </div>
                </div>
              <?php endfor; ?>

            </div>
          </div>
          <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
        </div>
      </section>
    <?php else : ?>
      <h1>Nenhum Imóvel Disponivel :(</h1>
    <?php endif; ?>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/imoveis.js" type="module"></script>
</body>

</html>