<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/filtros/filtrarImoveis.php');
  if (!isset($_GET['filtro'])) {
    consultarImoveis();
  } else {
    filtrarImoveis();
  }
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  consultarBairros();
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/sistema/imoveis.css">
  <title>Imóveis</title>
</head>

<body>
  <header>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/nav.php');
    ?>
  </header>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <input type="checkbox" id="btnFiltro">
    <label for="btnFiltro">
      <h3><i class="fas fa-angle-left"></i> filtro</h3>
    </label>

    <div class="teste1"></div>
    <div class="teste2"></div>
    <div class="teste3"></div>

    <form action="/SMILIPS/controller/filtros/filtrarImoveis.php" method="post">
      <div id="filter">

        <h3>Filtro de Busca</h3>

        <div class="search">
          <?php if (isset($_SESSION['rua'])) : ?>
            <input type="text" name="rua" placeholder="Pesquise por Rua" value="<?php echo $_SESSION['rua']; ?>">
          <?php else : ?>
            <input type="text" name="rua" placeholder="Pesquise por Rua">
          <?php endif; ?>
        </div>

        <div class="field_options">
          <div class="select-box">

            <div class="list-options">

              <label for="apartamento">
                <div class="option type">
                  <?php if (isset($_SESSION['tipo']) and $_SESSION['tipo'] == "Apartamento") : ?>
                    <input type="radio" class="radio" id="apartamento" name="type" value="Apartamento" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="apartamento" name="type" value="Apartamento" />
                  <?php endif; ?>
                  <span>Apartamento</span>
                </div>
              </label>

              <label for="casa">
                <div class="option type">
                  <?php if (isset($_SESSION['tipo']) and $_SESSION['tipo'] == "Residensial") : ?>
                    <input type="radio" class="radio" id="casa" name="type" value="Residensial" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="casa" name="type" value="Residensial" />
                  <?php endif; ?>
                  <span>Residensial</span>
                </div>
              </label>

              <label for="comercial">
                <div class="option type">
                  <?php if (isset($_SESSION['tipo']) and $_SESSION['tipo'] == "Comercial") : ?>
                    <input type="radio" class="radio" id="comercial" name="type" value="Comercial" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="comercial" name="type" value="Comercial" />
                  <?php endif; ?>
                  <span>Comercial</span>
                </div>
              </label>

              <label for="kitnet">
                <div class="option type">
                  <?php if (isset($_SESSION['tipo']) and $_SESSION['tipo'] == "kitnet") : ?>
                    <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" />
                  <?php endif; ?>
                  <span>Kitnet</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['tipo'])) : ?>
              <div class="select"><?php echo $_SESSION['tipo']; ?></div>
            <?php else : ?>
              <div class="select">Tipos de imóveis</div>
            <?php endif; ?>
          </div>

          <div class="select-box">

            <div class="list-options">

              <label for="ico">
                <div class="option cidade">
                  <?php if (isset($_SESSION['cidade']) and $_SESSION['cidade'] == 'Icó') : ?>
                    <input type="radio" class="radio" id="ico" name="cidade" value="Icó" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="ico" name="cidade" value="Icó" />
                  <?php endif; ?>
                  <span>Icó</span>
                </div>
              </label>

            </div>
            <?php if (isset($_SESSION['cidade'])) : ?>
              <div class="select"><?php echo $_SESSION['cidade']; ?></div>
            <?php else : ?>
              <div class="select">Cidade</div>
            <?php endif; ?>

          </div>

        </div>

        <div class="field_options">
          <div class="select-box">

            <div class="list-options">
              <?php if ($bairros->num_rows > 0) : ?>
                <?php $cont = 0; ?>
                <?php while ($row = $bairros->fetch_assoc()) : ?>
                  <?php $cont++; ?>
                  <label for="bairro<?php echo $cont; ?>">
                    <div class="option bairro">
                      <?php if (isset($_SESSION['bairro']) and $_SESSION['bairro'] == $row['bairro']) : ?>
                        <input type="radio" class="radio" id="bairro<?php echo $cont; ?>" name="bairro" value="<?php echo $row['bairro']; ?>" checked />
                      <?php else : ?>
                        <input type="radio" class="radio" id="bairro<?php echo $cont; ?>" name="bairro" value="<?php echo $row['bairro']; ?>" />
                      <?php endif; ?>
                      <span><?php echo $row['bairro']; ?></span>
                    </div>
                  </label>
                <?php endwhile; ?>
              <?php else : ?>
                <label for="indisponivel">
                  <div class="option bairro">
                    <input type="radio" class="radio" id="indisponivel" name="bairro" value="Indisponível" />
                    <span>Indisponível</span>
                  </div>
                </label>
              <?php endif; ?>
            </div>
            <?php if (isset($_SESSION['bairro'])) : ?>
              <div class="select"><?php echo $_SESSION['bairro']; ?></div>
            <?php else : ?>
              <div class="select">Bairro</div>
            <?php endif; ?>
          </div>

        </div>

        <div class="field_options">

          <div class="select-box">

            <div class="list-options scrol">

              <label for="d1">
                <div class="option dormitorio">
                  <?php if (isset($_SESSION['quarto']) and $_SESSION['quarto'] == 1) : ?>
                    <input type="radio" class="radio" id="d1" name="dormitorio" value="1" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="d1" name="dormitorio" value="1" />
                  <?php endif; ?>
                  <span>1</span>
                </div>
              </label>

              <label for="d2">
                <div class="option dormitorio">
                  <?php if (isset($_SESSION['quarto']) and $_SESSION['quarto'] == 2) : ?>
                    <input type="radio" class="radio" id="d2" name="dormitorio" value="2" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="d2" name="dormitorio" value="2" />
                  <?php endif; ?>
                  <span>2</span>
                </div>
              </label>

              <label for="d3">
                <div class="option dormitorio">
                  <?php if (isset($_SESSION['quarto']) and $_SESSION['quarto'] == 3) : ?>
                    <input type="radio" class="radio" id="d3" name="dormitorio" value="3" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="d3" name="dormitorio" value="3" />
                  <?php endif; ?>
                  <span>3</span>
                </div>
              </label>

              <label for="d4">
                <div class="option dormitorio">
                  <?php if (isset($_SESSION['quarto']) and $_SESSION['quarto'] == 4) : ?>
                    <input type="radio" class="radio" id="d4" name="dormitorio" value="4" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="d4" name="dormitorio" value="4" />
                  <?php endif; ?>
                  <span>4</span>
                </div>
              </label>

              <label for="d5">
                <div class="option dormitorio">
                  <?php if (isset($_SESSION['quarto']) and $_SESSION['quarto'] == 5) : ?>
                    <input type="radio" class="radio" id="d5" name="dormitorio" value="5" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="d5" name="dormitorio" value="5" />
                  <?php endif; ?>
                  <span>5</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['quarto'])) : ?>
              <div class="select"><?php echo $_SESSION['quarto']; ?></div>
            <?php else : ?>
              <div class="select">Quarto</div>
            <?php endif; ?>

          </div>

          <div class="select-box">

            <div class="list-options scrol">

              <label for="s1">
                <div class="option suite">
                  <?php if (isset($_SESSION['banheiro']) and $_SESSION['banheiro'] == 1) : ?>
                    <input type="radio" class="radio" id="s1" name="suite" value="1" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="s1" name="suite" value="1" />
                  <?php endif; ?>
                  <span>1</span>
                </div>
              </label>

              <label for="s2">
                <div class="option suite">
                  <?php if (isset($_SESSION['banheiro']) and $_SESSION['banheiro'] == 2) : ?>
                    <input type="radio" class="radio" id="s2" name="suite" value="2" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="s2" name="suite" value="2" />
                  <?php endif; ?>
                  <span>2</span>
                </div>
              </label>

              <label for="s3">
                <div class="option suite">
                  <?php if (isset($_SESSION['banheiro']) and $_SESSION['banheiro'] == 3) : ?>
                    <input type="radio" class="radio" id="s3" name="suite" value="3" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="s3" name="suite" value="3" />
                  <?php endif; ?>
                  <span>3</span>
                </div>
              </label>

              <label for="s4">
                <div class="option suite">
                  <?php if (isset($_SESSION['banheiro']) and $_SESSION['banheiro'] == 4) : ?>
                    <input type="radio" class="radio" id="s4" name="suite" value="4" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="s4" name="suite" value="4" />
                  <?php endif; ?>
                  <span>4</span>
                </div>
              </label>

              <label for="s5">
                <div class="option suite">
                  <?php if (isset($_SESSION['banheiro']) and $_SESSION['banheiro'] == 5) : ?>
                    <input type="radio" class="radio" id="s5" name="suite" value="5" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="s5" name="suite" value="5" />
                  <?php endif; ?>
                  <span>5</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['banheiro'])) : ?>
              <div class="select"><?php echo $_SESSION['banheiro']; ?></div>
            <?php else : ?>
              <div class="select">Banheiro</div>
            <?php endif; ?>

          </div>

        </div>

        <div class="field_options">

          <div class="select-box">

            <div class="list-options scrol">

              <label for="g1">
                <div class="option garagem">
                  <?php if (isset($_SESSION['garagem']) and $_SESSION['garagem'] == 1) : ?>
                    <input type="radio" class="radio" id="g1" name="garagem" value="1" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="g1" name="garagem" value="1" />
                  <?php endif; ?>
                  <span>1</span>
                </div>
              </label>

              <label for="g2">
                <div class="option garagem">
                  <?php if (isset($_SESSION['garagem']) and $_SESSION['garagem'] == 2) : ?>
                    <input type="radio" class="radio" id="g2" name="garagem" value="2" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="g2" name="garagem" value="2" />
                  <?php endif; ?>
                  <span>2</span>
                </div>
              </label>

              <label for="g3">
                <div class="option garagem">
                  <?php if (isset($_SESSION['garagem']) and $_SESSION['garagem'] == 3) : ?>
                    <input type="radio" class="radio" id="g3" name="garagem" value="3" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="g3" name="garagem" value="3" />
                  <?php endif; ?>
                  <span>3</span>
                </div>
              </label>

              <label for="g4">
                <div class="option garagem">
                  <?php if (isset($_SESSION['garagem']) and $_SESSION['garagem'] == 4) : ?>
                    <input type="radio" class="radio" id="g4" name="garagem" value="4" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="g4" name="garagem" value="4" />
                  <?php endif; ?>
                  <span>4</span>
                </div>
              </label>

              <label for="g5">
                <div class="option garagem">
                  <?php if (isset($_SESSION['garagem']) and $_SESSION['garagem'] == 5) : ?>
                    <input type="radio" class="radio" id="g5" name="garagem" value="5" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="g5" name="garagem" value="5" />
                  <?php endif; ?>
                  <span>5</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['garagem'])) : ?>
              <div class="select"><?php echo $_SESSION['garagem']; ?></div>
            <?php else : ?>
              <div class="select">Garagem</div>
            <?php endif; ?>

          </div>

          <div class="select-box">

            <div class="list-options scrol">

              <label for="400i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 400) : ?>
                    <input type="radio" class="radio" id="400i" name="valorI" value="400" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="400i" name="valorI" value="400" />
                  <?php endif; ?>
                  <span>R$ 400,00</span>
                </div>
              </label>

              <label for="600i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 600) : ?>
                    <input type="radio" class="radio" id="600i" name="valorI" value="600" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="600i" name="valorI" value="600" />
                  <?php endif; ?>
                  <span>R$ 600,00</span>
                </div>
              </label>

              <label for="800i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 800) : ?>
                    <input type="radio" class="radio" id="800i" name="valorI" value="800" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="800i" name="valorI" value="800" />
                  <?php endif; ?>
                  <span>R$ 800,00</span>
                </div>
              </label>

              <label for="1000i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 1000) : ?>
                    <input type="radio" class="radio" id="1000i" name="valorI" value="1000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="1000i" name="valorI" value="1000" />
                  <?php endif; ?>
                  <span>R$ 1000,00</span>
                </div>
              </label>

              <label for="1500i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 1500) : ?>
                    <input type="radio" class="radio" id="1500i" name="valorI" value="1500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="1500i" name="valorI" value="1500" />
                  <?php endif; ?>
                  <span>R$ 1500,00</span>
                </div>
              </label>

              <label for="2000i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 2000) : ?>
                    <input type="radio" class="radio" id="2000i" name="valorI" value="2000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="2000i" name="valorI" value="2000" />
                  <?php endif; ?>
                  <span>R$ 2000,00</span>
                </div>
              </label>

              <label for="2500i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 2500) : ?>
                    <input type="radio" class="radio" id="2500i" name="valorI" value="2500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="2500i" name="valorI" value="2500" />
                  <?php endif; ?>
                  <span>R$ 2500,00</span>
                </div>
              </label>

              <label for="3000i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 3000) : ?>
                    <input type="radio" class="radio" id="3000i" name="valorI" value="3000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="3000i" name="valorI" value="3000" />
                  <?php endif; ?>
                  <span>R$ 3000,00</span>
                </div>
              </label>

              <label for="3500i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 3500) : ?>
                    <input type="radio" class="radio" id="3500" name="valorI" value="3500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="3500" name="valorI" value="3500" />
                  <?php endif; ?>
                  <span>R$ 3500,00</span>
                </div>
              </label>

              <label for="4000i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 4000) : ?>
                    <input type="radio" class="radio" id="4000i" name="valorI" value="4000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="4000i" name="valorI" value="4000" />
                  <?php endif; ?>
                  <span>R$ 4000,00</span>
                </div>
              </label>

              <label for="4500i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 4500) : ?>
                    <input type="radio" class="radio" id="4500" name="valorI" value="4500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="4500" name="valorI" value="4500" />
                  <?php endif; ?>
                  <span>R$ 4500,00</span>
                </div>
              </label>

              <label for="5000i">
                <div class="option valorI">
                  <?php if (isset($_SESSION['valorMinimo']) and $_SESSION['valorMinimo'] == 5000) : ?>
                    <input type="radio" class="radio" id="5000i" name="valorI" value="5000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="5000i" name="valorI" value="5000" />
                  <?php endif; ?>
                  <span>R$ 5000,00</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['valorMinimo'])) : ?>
              <div class="select">R$ <?php echo $_SESSION['valorMinimo'] ?>,00</div>
            <?php else : ?>
              <div class="select">Valor Inicial</div>
            <?php endif; ?>

          </div>

        </div>

        <div class="field_options">

          <div class="select-box">

            <div class="list-options scrol">

              <label for="400f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 400) : ?>
                    <input type="radio" class="radio" id="400f" name="valorF" value="400" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="400f" name="valorF" value="400" />
                  <?php endif; ?>
                  <span>R$ 400,00</span>
                </div>
              </label>

              <label for="600f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 600) : ?>
                    <input type="radio" class="radio" id="600f" name="valorF" value="600" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="600f" name="valorF" value="600" />
                  <?php endif; ?>
                  <span>R$ 600,00</span>
                </div>
              </label>

              <label for="800f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 800) : ?>
                    <input type="radio" class="radio" id="800f" name="valorF" value="800" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="800f" name="valorF" value="800" />
                  <?php endif; ?>
                  <span>R$ 800,00</span>
                </div>
              </label>

              <label for="1000f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 1000) : ?>
                    <input type="radio" class="radio" id="1000f" name="valorF" value="1000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="1000f" name="valorF" value="1000" />
                  <?php endif; ?>
                  <span>R$ 1000,00</span>
                </div>
              </label>

              <label for="1500f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 1500) : ?>
                    <input type="radio" class="radio" id="1500f" name="valorF" value="1500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="1500f" name="valorF" value="1500" />
                  <?php endif; ?>
                  <span>R$ 1500,00</span>
                </div>
              </label>

              <label for="2000f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 2000) : ?>
                    <input type="radio" class="radio" id="2000f" name="valorF" value="2000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="2000f" name="valorF" value="2000" />
                  <?php endif; ?>
                  <span>R$ 2000,00</span>
                </div>
              </label>

              <label for="2500f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 2500) : ?>
                    <input type="radio" class="radio" id="2500f" name="valorF" value="2500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="2500f" name="valorF" value="2500" />
                  <?php endif; ?>
                  <span>R$ 2500,00</span>
                </div>
              </label>

              <label for="3000f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 3000) : ?>
                    <input type="radio" class="radio" id="3000f" name="valorF" value="3000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="3000f" name="valorF" value="3000" />
                  <?php endif; ?>
                  <span>R$ 3000,00</span>
                </div>
              </label>

              <label for="3500f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 3500) : ?>
                    <input type="radio" class="radio" id="3500f" name="valorF" value="3500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="3500f" name="valorF" value="3500" />
                  <?php endif; ?>
                  <span>R$ 3500,00</span>
                </div>
              </label>

              <label for="4000f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 4000) : ?>
                    <input type="radio" class="radio" id="4000f" name="valorF" value="4000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="4000f" name="valorF" value="4000" />
                  <?php endif; ?>
                  <span>R$ 4000,00</span>
                </div>
              </label>

              <label for="4500f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 4500) : ?>
                    <input type="radio" class="radio" id="4500f" name="valorF" value="4500" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="4500f" name="valorF" value="4500" />
                  <?php endif; ?>
                  <span>R$ 4500,00</span>
                </div>
              </label>

              <label for="5000f">
                <div class="option valorF">
                  <?php if (isset($_SESSION['valorMaximo']) and $_SESSION['valorMaximo'] == 5000) : ?>
                    <input type="radio" class="radio" id="5000f" name="valorF" value="5000" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="5000f" name="valorF" value="5000" />
                  <?php endif; ?>
                  <span>R$ 5000,00</span>
                </div>
              </label>

            </div>

            <?php if (isset($_SESSION['valorMaximo'])) : ?>
              <div class="select">R$ <?php echo $_SESSION['valorMaximo']; ?>,00</div>
            <?php else : ?>
              <div class="select">Valor Final</div>
            <?php endif; ?>

          </div>

          <div class="select-box">

            <div class="list-options scrol">

              <label for="50">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == 50) : ?>
                    <input type="radio" class="radio" id="50" name="area" value="50" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="50" name="area" value="50" />
                  <?php endif; ?>
                  <span>até 50m²</span>
                </div>
              </label>

              <label for="50a70">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "50a70") : ?>
                    <input type="radio" class="radio" id="50a70" name="area" value="50a70" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="50a70" name="area" value="50a70" />
                  <?php endif; ?>
                  <span>50 a 70m²</span>
                </div>
              </label>

              <label for="70a100">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "70a100") : ?>
                    <input type="radio" class="radio" id="70a100" name="area" value="70a100" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="70a100" name="area" value="70a100" />
                  <?php endif; ?>
                  <span>70 a 100m²</span>
                </div>
              </label>

              <label for="100a120">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "100a120") : ?>
                    <input type="radio" class="radio" id="100a120" name="area" value="100a120" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="100a120" name="area" value="100a120" />
                  <?php endif; ?>
                  <span>100 a 120m²</span>
                </div>
              </label>

              <label for="120a150">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "120a150") : ?>
                    <input type="radio" class="radio" id="120a150" name="area" value="120a150" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="120a150" name="area" value="120a150" />
                  <?php endif; ?>
                  <span>120 a 150m²</span>
                </div>
              </label>

              <label for="150a200">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "150a200") : ?>
                    <input type="radio" class="radio" id="150a200" name="area" value="150a200" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="150a200" name="area" value="150a200" />
                  <?php endif; ?>
                  <span>150 a 200m²</span>
                </div>
              </label>

              <label for="200+">
                <div class="option area">
                  <?php if (isset($_SESSION['area']) and $_SESSION['area'] == "200") : ?>
                    <input type="radio" class="radio" id="200+" name="area" value="200" checked />
                  <?php else : ?>
                    <input type="radio" class="radio" id="200+" name="area" value="200" />
                  <?php endif; ?>
                  <span>+ de 200m²</span>
                </div>
              </label>

            </div>

            <?php
            if (isset($_SESSION['area'])) {
              $area =  $area = explode("a", $_SESSION['area']);
            }
            ?>

            <?php if (isset($_SESSION['area']) and count($area) == 2) : ?>
              <div class="select"><?php echo $area[0]; ?> a <?php echo $area[1]; ?>m²</div>
            <?php elseif (isset($_SESSION['area']) and $area[0] == 50) : ?>
              <div class="select">até <?php echo $area[0]; ?>m²</div>
            <?php elseif (isset($_SESSION['area'])) : ?>
              <div class="select">+ de <?php echo $area[0]; ?>m²</div>
            <?php else : ?>
              <div class="select">Área (M²)</div>
            <?php endif; ?>

          </div>
        </div>

        <div class="button">
          <button type="submit" name="filtrar_imoveis">Aplicar Filtro</button>
        </div>

      </div>

      </div>
    </form>

    <?php if (isset($_GET['filtro'])) : ?>
      <?php if ($imoveis != null and $filtro != null) : ?>
        <h1>Imóveis</h1>
        <section class="imoveis_disponiveis">
          <?php for ($i = 0; $i < count($matrizImoveis); $i++) : ?>
            <div class="card_imovel">
              <div class="image">
                <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
                <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
                <div class="imgs">
                  <?php for ($j = 0; $j < count($matrizImgsImovel); $j++) : ?>
                    <?php if ($matrizImgsImovel[$j]['imovelID'] == $matrizImoveis[$i]['imovelID']) : ?>
                      <img src="data:image/jpeg;base64,<?php echo base64_encode($matrizImgsImovel[$j]['imagem']) ?>" alt="">
                    <?php endif; ?>
                  <?php endfor; ?>
                </div>
              </div>
              <div class="descricao">
                <div class="value">
                  <p>R$ <?php echo number_format($matrizImoveis[$i]['valorAluguel'], 0, ',', '.'); ?> <span>/Mês</span></p>
                </div>

                <?php
                if ($matrizImoveis[$i]['qtdQuarto'] > 1) {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quartos';
                } else {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quarto';
                }
                if ($matrizImoveis[$i]['qtdBanheiro'] > 1) {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiros';
                } else {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiro';
                }
                if ($matrizImoveis[$i]['qtdGaragem'] > 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagens';
                } else if ($matrizImoveis[$i]['qtdGaragem'] == 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagen';
                } else {
                  $matrizImoveis[$i]['qtdGaragem'] = '';
                }

                if ($matrizImoveis[$i]['tipo'] == 'Residencial') {
                  $matrizImoveis[$i]['tipo'] = 'Residencia';
                } else if ($matrizImoveis[$i]['tipo'] == 'Comercial') {
                  $matrizImoveis[$i]['tipo'] = 'Ponto Comercial';
                }
                ?>

                <div class="desc">
                  <p><?php echo $matrizImoveis[$i]['tipo']; ?> com <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> para Aluguel, <?php echo $matrizImoveis[$i]['area']; ?></p>
                </div>

                <div class="end">
                  <p><?php echo $matrizImoveis[$i]['rua']; ?> - <?php echo $matrizImoveis[$i]['numero']; ?>, <?php echo $matrizImoveis[$i]['cidade']; ?></p>
                </div>
                <div class="info">
                  <p><?php echo $matrizImoveis[$i]['area']; ?> <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> <?php echo $matrizImoveis[$i]['qtdBanheiro']; ?> <?php echo $matrizImoveis[$i]['qtdGaragem']; ?></p>
                </div>
                <div class="detalhes">
                  <a href="/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=<?php echo $matrizImoveis[$i]['imovelID']; ?>">Detalhes</a>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </section>
      <?php else : ?>
        <h1>Nenhum Resultado Encontrado :(</h1>
      <?php endif; ?>
    <?php else : ?>
      <?php if ($imoveis != null) : ?>
        <h1>Imóveis</h1>
        <section class="imoveis_disponiveis">
          <?php for ($i = 0; $i < count($matrizImoveis); $i++) : ?>
            <div class="card_imovel">
              <div class="image">
                <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
                <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
                <div class="imgs">
                  <?php for ($j = 0; $j < count($matrizImgsImovel); $j++) : ?>
                    <?php if ($matrizImgsImovel[$j]['imovelID'] == $matrizImoveis[$i]['imovelID']) : ?>
                      <img src="data:image/jpeg;base64,<?php echo base64_encode($matrizImgsImovel[$j]['imagem']) ?>" alt="">
                    <?php endif; ?>
                  <?php endfor; ?>
                </div>
              </div>
              <div class="descricao">
                <div class="value">
                  <p>R$ <?php echo number_format($matrizImoveis[$i]['valorAluguel'], 0, ',', '.'); ?> <span>/Mês</span></p>
                </div>

                <?php
                if ($matrizImoveis[$i]['qtdQuarto'] > 1) {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quartos';
                } else {
                  $matrizImoveis[$i]['qtdQuarto'] .= ' Quarto';
                }
                if ($matrizImoveis[$i]['qtdBanheiro'] > 1) {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiros';
                } else {
                  $matrizImoveis[$i]['qtdBanheiro'] .= ' Banheiro';
                }
                if ($matrizImoveis[$i]['qtdGaragem'] > 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagens';
                } else if ($matrizImoveis[$i]['qtdGaragem'] == 1) {
                  $matrizImoveis[$i]['qtdGaragem'] .= ' Garagen';
                } else {
                  $matrizImoveis[$i]['qtdGaragem'] = '';
                }

                if ($matrizImoveis[$i]['tipo'] == 'Residencial') {
                  $matrizImoveis[$i]['tipo'] = 'Residencia';
                } else if ($matrizImoveis[$i]['tipo'] == 'Comercial') {
                  $matrizImoveis[$i]['tipo'] = 'Ponto Comercial';
                }
                ?>

                <div class="desc">
                  <p><?php echo $matrizImoveis[$i]['tipo']; ?> com <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> para Aluguel, <?php echo $matrizImoveis[$i]['area']; ?></p>
                </div>

                <div class="end">
                  <p><?php echo $matrizImoveis[$i]['rua']; ?> - <?php echo $matrizImoveis[$i]['numero']; ?>, <?php echo $matrizImoveis[$i]['cidade']; ?></p>
                </div>
                <div class="info">
                  <p><?php echo $matrizImoveis[$i]['area']; ?> <?php echo $matrizImoveis[$i]['qtdQuarto']; ?> <?php echo $matrizImoveis[$i]['qtdBanheiro']; ?> <?php echo $matrizImoveis[$i]['qtdGaragem']; ?></p>
                </div>
                <div class="detalhes">
                  <a href="/SMILIPS/view/pages/imovel/detalhesImovel.php?imovelID=<?php echo $matrizImoveis[$i]['imovelID']; ?>">Detalhes</a>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </section>
      <?php else : ?>
        <h1>Nenhum Resultado Encontrado :(</h1>
      <?php endif; ?>
    <?php endif; ?>


  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/footer.php');
  ?>

  <script src="/SMILIPS/view/js/sistema/imoveis.js" type="module"></script>
</body>

</html>