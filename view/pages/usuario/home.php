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
  // chamando a funcao consultar nome
  consultarNome();
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImovelUser
  consultarImovelUser();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/usuario/home.css">
  <title>Home</title>
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
    <div class="nome">
      <!-- exibindo o nome do usaurio -->
      <?php $nome = preg_split('/\s/', $nomeUsuario); ?>
      <h1>Bem Vindo, <?php echo $nome[0]; ?></h1>
    </div>

    <section class="card-container">
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Anuncie seu Imóvel</h2>
            <p>Anuncie seu Imovel de forma prática, confiável e digital e totalmente livre de burocracia. Seu anúncio fica ainda mais atrativo.</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/imovel.jpg" alt="Icone de Anúncio de um Imóvel">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/imovel/cadastro.php">Cadastrar Imóvel</a>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Seja Nosso Parceiro</h2>
            <p>Anuncie sua empresa e aumente a visibilidade de seus negócios e esteja onde o público está. As suas oportunidades começam aqui!</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/parceiros.jpg" alt="Icone de Parceria">
          </div>
        </div>
        <div class="title">
          <a href="#">Cadastrar Anúncio</a>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Torne-se um Prestador de Serviço</h2>
            <p>Anuncie seus serviços e seja autônomo, encontre pessoas interessadas no que você faz e ganhe dinheiro e visibilidade.</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/prestadorServico.jpg" alt="Icone de Prestação de Serviço">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/servicos/cadastro.php">Cadastrar Serviço</a>
        </div>
      </div>
    </section>

    <!-- se o usuario tiver algum imovel cadastrado, mostra os imoveis e seus detalhes  -->
    <?php if ($imovel->num_rows > 0) : ?>
      <section class="your-imoveis">
        <h1>Seus Imóveis</h1>
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
                      <a href="/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>">Detalhes <i class="fas fa-pencil-alt"></i></a>
                    <?php elseif ($arrayImovel[$i]['situacao'] == 'Desativado') : ?>
                      <a href="/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>">Ativar</a>
                    <?php else : ?>
                      <a href="/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>">Em Ánalise</a>
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
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/home.js" type="module"></script>
</body>

</html>