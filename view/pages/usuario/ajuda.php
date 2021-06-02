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
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/usuario/ajuda.css">
  <title>Ajuda</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  ?>

  <main>
    <h1>Perguntas Frequentes</h1>

    <div class="perguntas">
      <div class="pergunta">
        <h3>Como cadastrar meu imóvel?<i class="fas fa-caret-down"></i></h3>
        <p>Ao entrar na sua conta, na página inicial do usuário, você encontrará uma opção
          de cadastro de imóveis, ao clicar nessa opção você será redirecionado a página
          de cadastro, ao finalizar o cadastro, seu imovel entrará na parte de análise
          no sistema, onde o Administrador irá validar suas informações, isso poderá
          demorar um pouco, comprometemo-nos em agilizar o processo em até 48hrs.</p>
      </div>

      <div class="pergunta">
        <h3>Como cadastrar anúncio da minha empresa?<i class="fas fa-caret-down"></i></h3>
        <p>Ao entrar na sua conta, na página inicial do usuário, você encontrará uma opção
          “Seja nosso parceiro”, ao clicar, será redirecionado a página de planos, caso não
          possua um plano ativo, onde você poderá escolher o melhor plano que se adequar
          ao seu negócio. Após sua escolha, será solicitado a efetuação do pagamento e
          o envio do comprovante, onde será feita a análise de seus dados de comprovação
          de pagamento. Após a validação de seus dados pelo Administrador, você usuário
          poderá cadastrar seu anúncio, e ao finalizar o cadastro, seu anúncio entrará
          na parte de análise, onde o administrador irá validar sua propaganda, depois
          disso sua propaganda estará disponível no sistema.</p>
      </div>

      <div class="pergunta">
        <h3>Como desativar a conta?<i class="fas fa-caret-down"></i></h3>
        <p>Na página inicial do usuário, você encontrará nas opções de menu, a parte de configuração,
          onde está a opção de desativar conta, ao clicar será necessário o usuário informar a senha.</p>
      </div>

      <div class="pergunta">
        <h3>Como ativar minha conta?<i class="fas fa-caret-down"></i></h3>
        <p>Para ativar sua conta basta efetuar o login novamente.</p>
      </div>

      <div class="pergunta">
        <h3>Meu serviço não está na lista de serviços do sistema, o que devo fazer?<i class="fas fa-caret-down"></i></h3>
        <p>Os serviços do sistema são pré-cadastro pelo Administrador e só ele pode
          cadastrar um serviço a ser disponibilizado, envia-nos um email para <u>projetopi089@gmail.com</u>,
          com a sua solicitação de serviço, prometemo-nos responder o mais rápido possível.
        </p>
      </div>

      <div class="pergunta">
        <h3>Como recuperar a senha?<i class="fas fa-caret-down"></i></h3>
        <p>No caso de perda de acesso, é recomendado que seja enviado um email para nossa
          equipe (<u>projetopi089@gmail.com</u>), lá será solicitado algumas informações pessoais para validar e disponibilizar
          sua conta.</p>
      </div>

      <div class="relatar_problema">
        <h4>Relatar um problema: <span>projetopi089@gmail.com</span></h4>
      </div>

    </div>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/ajuda.js"></script>
</body>

</html>