<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
  consultarNome();
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
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
      <?php $nome = preg_split('/\s/', $nomeUsuario); ?>
      <h1>Bem Vindo, <?php echo $nome[0]; ?></h1>
    </div>

    <section class="card-container">
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Cadastrar Imóvel</h2>
            <p>Cadastrar Imóvel, Cadastrar Imóvel, Cadastrar Imóvel, Cadastrar Imóvel</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/imovel.jpg" alt="Imagem de Anúncio de um Imóvel">
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
            <p>Seja Nosso Parceiro, Seja Nosso Parceiro,Seja Nosso Parceiro,Seja Nosso</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/parceiros.jpg" alt="Imagem de Parceria">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Seja Nosso Parceiro</a>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="text-content">
            <h2>Torne-se um Prestador de Serviço</h2>
            <p>Torne-se um Prestador de Serviço, Torne-se um Prestador de Serviço</p>
          </div>
          <div class="image">
            <img src="/SMILIPS/view/images/usuario/prestadorServico.jpg" alt="Imagem de Prestação de Serviço">
          </div>
        </div>
        <div class="title">
          <a href="/SMILIPS/view/pages/usuario/imovel/cadastro.php">Torne-se um Prestador de Serviço</a>
        </div>
      </div>
    </section>
    <?php if ($imovel->num_rows > 0) : ?>
      <section class="your-imoveis">
        <h1>Seus Imóveis</h1>
        <div class="container-imovel">
          <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
          <div class="list-imovel">
            <div class="cards-imovel">

              <?php for ($i = 0; $i < count($arrayImgImovel); $i++) : ?>

                <div class="card">
                  <div class="image">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($arrayImgImovel[$i]['imagem']) ?>" alt="Imovél">
                  </div>
                  <div class="detalhes">
                    <h3>R$ <?php echo $arrayImovel[$i]['valorAluguel'] ?><span>/mês</span></h3>
                    <p><?php echo $arrayImovel[$i]['tipo'] ?> com <?php echo $arrayImovel[$i]['qtdQuarto'] ?> Quartos e <?php echo $arrayImovel[$i]['qtdBanheiro'] ?> banheiros para Alugar, <?php echo $arrayImovel[$i]['area'] ?>
                      <?php echo $arrayImovel[$i]['rua'] ?>.</p>
                    <a href="/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=<?php echo $arrayImovel[$i]['imovelID'] ?>">Editar <i class="fas fa-pencil-alt"></i></a>
                  </div>
                </div>
              <?php endfor; ?>

            </div>
          </div>
          <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
        </div>
      </section>
    <?php else : ?>
    <?php endif; ?>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/home.js" type="module"></script>
</body>

</html>