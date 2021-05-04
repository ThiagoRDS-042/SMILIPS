<!DOCTYPE html>
<html lang="pt-BR">

<head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <?php
     require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
     ?>
     <link rel="stylesheet" href="/SMILIPS/view/css/sistema/home.css">
     <title>Home</title>
</head>

<body>
     <header>
          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
          ?>
     </header>

     <main>
          <form action="#" method="post">
               <div id="filter">
                    <div class="search">
                         <input type="text" placeholder="Buscar por Endereço">
                         <button>Buscar</button>
                    </div>
                    <div class="field-input">

                         <div class="select-box">

                              <div class="list-options">

                                   <label for="apartamento">
                                        <div class="option type">
                                             <input type="radio" class="radio" id="apartamento" name="type" value="apartamento" />
                                             <span>Apartamento</span>
                                        </div>
                                   </label>

                                   <label for="casa">
                                        <div class="option type">
                                             <input type="radio" class="radio" id="casa" name="type" value="casa" />
                                             <span>Casa</span>
                                        </div>
                                   </label>

                                   <label for="comercial">
                                        <div class="option type">
                                             <input type="radio" class="radio" id="comercial" name="type" value="comercial" />
                                             <span>Comercial</span>
                                        </div>
                                   </label>

                                   <label for="kitnet">
                                        <div class="option type">
                                             <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" />
                                             <span>Kitnet</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Tipos de imóveis</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options">

                                   <label for="ico">
                                        <div class="option cidade">
                                             <input type="radio" class="radio" id="ico" name="cidade" value="ico" />
                                             <span>Icó</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Cidade</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options">

                                   <label for="bairro1">
                                        <div class="option bairro">
                                             <input type="radio" class="radio" id="bairro1" name="bairro" value="bairro1" />
                                             <span>Bairro1</span>
                                        </div>
                                   </label>

                                   <label for="bairro2">
                                        <div class="option bairro">
                                             <input type="radio" class="radio" id="bairro2" name="bairro" value="bairro2" />
                                             <span>Bairro2</span>
                                        </div>
                                   </label>

                                   <label for="bairro3">
                                        <div class="option bairro">
                                             <input type="radio" class="radio" id="bairro3" name="bairro" value="bairro3" />
                                             <span>Bairro3</span>
                                        </div>
                                   </label>

                                   <label for="bairro4">
                                        <div class="option bairro">
                                             <input type="radio" class="radio" id="bairro4" name="bairro" value="bairro4" />
                                             <span>Bairro4</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Bairro</div>

                         </div>

                    </div>

                    <div class="field-input">

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="d1">
                                        <div class="option dormitorio">
                                             <input type="radio" class="radio" id="d1" name="dormitorio" value="1" />
                                             <span>1</span>
                                        </div>
                                   </label>

                                   <label for="d2">
                                        <div class="option dormitorio">
                                             <input type="radio" class="radio" id="d2" name="dormitorio" value="2" />
                                             <span>2</span>
                                        </div>
                                   </label>

                                   <label for="d3">
                                        <div class="option dormitorio">
                                             <input type="radio" class="radio" id="d3" name="dormitorio" value="3" />
                                             <span>3</span>
                                        </div>
                                   </label>

                                   <label for="d4">
                                        <div class="option dormitorio">
                                             <input type="radio" class="radio" id="d4" name="dormitorio" value="4" />
                                             <span>4</span>
                                        </div>
                                   </label>

                                   <label for="d5">
                                        <div class="option dormitorio">
                                             <input type="radio" class="radio" id="d5" name="dormitorio" value="5" />
                                             <span>5</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Quarto</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="s1">
                                        <div class="option suite">
                                             <input type="radio" class="radio" id="s1" name="suite" value="1" />
                                             <span>1</span>
                                        </div>
                                   </label>

                                   <label for="s2">
                                        <div class="option suite">
                                             <input type="radio" class="radio" id="s2" name="suite" value="2" />
                                             <span>2</span>
                                        </div>
                                   </label>

                                   <label for="s3">
                                        <div class="option suite">
                                             <input type="radio" class="radio" id="s3" name="suite" value="3" />
                                             <span>3</span>
                                        </div>
                                   </label>

                                   <label for="s4">
                                        <div class="option suite">
                                             <input type="radio" class="radio" id="s4" name="suite" value="4" />
                                             <span>4</span>
                                        </div>
                                   </label>

                                   <label for="s5">
                                        <div class="option suite">
                                             <input type="radio" class="radio" id="s5" name="suite" value="5" />
                                             <span>5</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Banheiro</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="g1">
                                        <div class="option garagem">
                                             <input type="radio" class="radio" id="g1" name="garagem" value="1" />
                                             <span>1</span>
                                        </div>
                                   </label>

                                   <label for="g2">
                                        <div class="option garagem">
                                             <input type="radio" class="radio" id="g2" name="garagem" value="2" />
                                             <span>2</span>
                                        </div>
                                   </label>

                                   <label for="g3">
                                        <div class="option garagem">
                                             <input type="radio" class="radio" id="g3" name="garagem" value="3" />
                                             <span>3</span>
                                        </div>
                                   </label>

                                   <label for="g4">
                                        <div class="option garagem">
                                             <input type="radio" class="radio" id="g4" name="garagem" value="4" />
                                             <span>4</span>
                                        </div>
                                   </label>

                                   <label for="g5">
                                        <div class="option garagem">
                                             <input type="radio" class="radio" id="g5" name="garagem" value="5" />
                                             <span>5</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Garagem</div>

                         </div>

                    </div>

                    <div class="field-input">

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="400i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="400i" name="valorI" value="400i" />
                                             <span>Até R$ 400,00</span>
                                        </div>
                                   </label>

                                   <label for="600i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="600i" name="valorI" value="600i" />
                                             <span>R$ 600,00</span>
                                        </div>
                                   </label>

                                   <label for="800i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="800i" name="valorI" value="800i" />
                                             <span>R$ 800,00</span>
                                        </div>
                                   </label>

                                   <label for="1000i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="1000i" name="valorI" value="1000i" />
                                             <span>R$ 1000,00</span>
                                        </div>
                                   </label>

                                   <label for="1500i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="1500i" name="valorI" value="1500i" />
                                             <span>R$ 1500,00</span>
                                        </div>
                                   </label>

                                   <label for="2000i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="2000i" name="valorI" value="2000i" />
                                             <span>R$ 2000,00</span>
                                        </div>
                                   </label>

                                   <label for="2500i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="2500i" name="valorI" value="2500i" />
                                             <span>R$ 2500,00</span>
                                        </div>
                                   </label>

                                   <label for="3000i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="3000i" name="valorI" value="3000i" />
                                             <span>R$ 3000,00</span>
                                        </div>
                                   </label>

                                   <label for="3500i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="3500" name="valorI" value="3500i" />
                                             <span>R$ 3500,00</span>
                                        </div>
                                   </label>

                                   <label for="4000i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="4000i" name="valorI" value="4000i" />
                                             <span>R$ 4000,00</span>
                                        </div>
                                   </label>

                                   <label for="4500i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="4500" name="valorI" value="4500i" />
                                             <span>R$ 4500,00</span>
                                        </div>
                                   </label>

                                   <label for="5000i">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="5000i" name="valorI" value="5000i" />
                                             <span>R$ 5000,00</span>
                                        </div>
                                   </label>

                                   <label for="5000i+">
                                        <div class="option valorI">
                                             <input type="radio" class="radio" id="5000i+" name="valorI" value="5000i+" />
                                             <span>+ de R$ 5000,00</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Valor Inicial</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="400f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="400f" name="valorF" value="400f" />
                                             <span>Até R$ 400,00</span>
                                        </div>
                                   </label>

                                   <label for="600f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="600f" name="valorF" value="600f" />
                                             <span>R$ 600,00</span>
                                        </div>
                                   </label>

                                   <label for="800f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="800f" name="valorF" value="800f" />
                                             <span>R$ 800,00</span>
                                        </div>
                                   </label>

                                   <label for="1000f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="1000f" name="valorF" value="1000f" />
                                             <span>R$ 1000,00</span>
                                        </div>
                                   </label>

                                   <label for="1500f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="1500f" name="valorF" value="1500f" />
                                             <span>R$ 1500,00</span>
                                        </div>
                                   </label>

                                   <label for="2000f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="2000f" name="valorF" value="2000f" />
                                             <span>R$ 2000,00</span>
                                        </div>
                                   </label>

                                   <label for="2500f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="2500f" name="valorF" value="2500f" />
                                             <span>R$ 2500,00</span>
                                        </div>
                                   </label>

                                   <label for="3000f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="3000f" name="valorF" value="3000f" />
                                             <span>R$ 3000,00</span>
                                        </div>
                                   </label>

                                   <label for="3500f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="3500f" name="valorF" value="3500f" />
                                             <span>R$ 3500,00</span>
                                        </div>
                                   </label>

                                   <label for="4000f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="4000f" name="valorF" value="4000f" />
                                             <span>R$ 4000,00</span>
                                        </div>
                                   </label>

                                   <label for="4500f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="4500f" name="valorF" value="4500f" />
                                             <span>R$ 4500,00</span>
                                        </div>
                                   </label>

                                   <label for="5000f">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="5000f" name="valorF" value="5000f" />
                                             <span>R$ 5000,00</span>
                                        </div>
                                   </label>

                                   <label for="5000f+">
                                        <div class="option valorF">
                                             <input type="radio" class="radio" id="5000f+" name="valorF" value="5000f+" />
                                             <span>+ de R$ 5000,00</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Valor Final</div>

                         </div>

                         <div class="select-box">

                              <div class="list-options scrol">

                                   <label for="50">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="50" name="area" value="50" />
                                             <span>até 50m</span>
                                        </div>
                                   </label>

                                   <label for="50a70">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="50a70" name="area" value="50a70" />
                                             <span>50 a 70m²</span>
                                        </div>
                                   </label>

                                   <label for="70a100">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="70a100" name="area" value="70a100" />
                                             <span>70 a 100m²</span>
                                        </div>
                                   </label>

                                   <label for="100a120">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="100a120" name="area" value="100a120" />
                                             <span>100 a 120m²</span>
                                        </div>
                                   </label>

                                   <label for="120a150">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="120a150" name="area" value="120a150" />
                                             <span>120 a 150m²</span>
                                        </div>
                                   </label>

                                   <label for="150a200">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="150a200" name="area" value="150a200" />
                                             <span>150 a 200m²</span>
                                        </div>
                                   </label>

                                   <label for="200+">
                                        <div class="option area">
                                             <input type="radio" class="radio" id="200+" name="area" value="200+" />
                                             <span>+ de 200m²</span>
                                        </div>
                                   </label>

                              </div>

                              <div class="select">Área (M²)</div>

                         </div>

                    </div>
                    <div class="more">
                         <input type="checkbox" id="check">
                         <label for="check"><span><i class="fas fa-search-plus"></i>Mais Opções</span></label>
                    </div>

               </div>
          </form>
     </main>

     <section class="banner">
          <figure>
               <a href="#">
                    <img src="/SMILIPS/view/images/propagandas/propaganda1.jpg" alt="">
               </a>
               <a href="#">
                    <img src="/SMILIPS/view/images/propagandas/propaganda2.jpeg" alt="">
               </a>
               <a href="#">
                    <img src="/SMILIPS/view/images/propagandas/propaganda3.jpeg" alt="">
               </a>
               <a href="#">
                    <img src="/SMILIPS/view/images/propagandas/propaganda4.jpeg" alt="">
               </a>
               <a href="#">
                    <img src="/SMILIPS/view/images/propagandas/propaganda1.jpg" alt="">
               </a>
          </figure>
     </section>

     <section class="recomendacoes">
          <h1>Recomendados para Você</h1>
          <div class="container-card">
               <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
               <div class="list-card">
                    <div class="list-card-slider">
                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/1.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 2.600<span>/mês</span></h3>
                                   <p>Casa com 3 Quartos e 2 banheiros para Alugar, 230 m²
                                        Rua Doutor Mário Pinto, 125</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/2.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 1.500<span>/mês</span></h3>
                                   <p>Casa com 3 Quartos e 2 banheiros , 125 m²
                                        Rua Santo Antônio da Vargem Alegre , 150</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/3.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 2.800<span>/mês</span></h3>
                                   <p>Casa térrea no condominio alphaville em ribeiro, 150 m²
                                        com 3 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/5.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 750<span>/mês</span></h3>
                                   <p>Casa na Cidade Nova, 50 m²
                                        com 2 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/4.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 1.000<span>/mês</span></h3>
                                   <p>Casa no condomínio Senhor do Bomfim, 150 m²
                                        com 4 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/6.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 250<span>/mês</span></h3>
                                   <p>Casa na Vila Três Bodegas, 25 m²
                                        com 2 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/7.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 350<span>/mês</span></h3>
                                   <p>Casa na Vila Três Bodegas, 30 m²
                                        com 3 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/8.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 500<span>/mês</span></h3>
                                   <p>Casa na Rua São Geraldo, n 2
                                        30 m² com 2 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>

                         <div class="card">
                              <div class="image">
                                   <img src="/SMILIPS/view/images/recomendacoes/9.jpg" alt="Imovél">
                              </div>
                              <div class="detalhes">
                                   <h3>R$ 800<span>/mês</span></h3>
                                   <p>Casa na rua Senhor do Bomfim, n 25
                                        35 m² com 2 Quartos e 2 banheiros</p>
                                   <a href="#">Ver Detalhes</a>
                              </div>
                         </div>
                    </div>
               </div>
               <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
          </div>
     </section>

     <section class="oqProcura">
          <h2>O que você procura?</h2>
          <div class="selecao">
               <div class="card-selecao">
                    <p>Anuncie seu Imóvel</p>
                    <div class="circle">
                         <!-- se o usuario estiver logado rederecione ele para a pagina de anunciar imoves, se n, redirecione para a pagina de login -->
                         <?php if (isset($_SESSION['usuarioID'])) : ?>
                              <a href="/SMILIPS/view/pages/usuario/home.php"><img src="/SMILIPS/view/images/oqProcura/imovel.jpg" alt="Imóvel"></a>
                         <?php else : ?>
                              <a href="/SMILIPS/view/pages/login.php"><img src="/SMILIPS/view/images/oqProcura/imovel.jpg" alt="Imóvel"></a>
                         <?php endif; ?>
                    </div>
               </div>
               <div class="card-selecao">
                    <p>Poste suas Propagandas</p>
                    <div class="circle">
                         <!-- se o usuario estiver logado rederecione ele para a pagina de anunciar propagandas, se n, redirecione para a pagina de login -->
                         <?php if (isset($_SESSION['usuarioID'])) : ?>
                              <a href="/SMILIPS/view/pages/usuario/home.php"><img src="/SMILIPS/view/images/oqProcura/anunciante.jpg" alt="Anunciante"></a>
                         <?php else : ?>
                              <a href="/SMILIPS/view/pages/login.php"><img src="/SMILIPS/view/images/oqProcura/anunciante.jpg" alt="Anunciante"></a>
                         <?php endif; ?>
                    </div>
               </div>
               <div class="card-selecao">
                    <p>Divulge seus Serviços</p>
                    <div class="circle">
                         <!-- se o usuario estiver logado rederecione ele para a pagina de anunciar servicos, se n, redirecione para a pagina de login -->
                         <?php if (isset($_SESSION['usuarioID'])) : ?>
                              <a href="/SMILIPS/view/pages/usuario/home.php"><img src="/SMILIPS/view/images/oqProcura/prestacaoServico.jpg" alt="Prestação de Serviço"></a>
                         <?php else : ?>
                              <a href="/SMILIPS/view/pages/login.php"><img src="/SMILIPS/view/images/oqProcura/prestacaoServico.jpg" alt="Prestação de Serviço"></a>
                         <?php endif; ?>
                    </div>
               </div>
          </div>
     </section>
     <?php
     require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
     ?>
     <script src="/SMILIPS/view/js/home.js" type="module"></script>
</body>

</html>