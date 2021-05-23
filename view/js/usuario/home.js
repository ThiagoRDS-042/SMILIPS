// importando modulos
import { avancar, retornar } from "/SMILIPS/view/js/modules/sliderCards.js";

// capturando todos os cards
const cards = document.querySelectorAll("main .card-container .card");

// redirecionando ao clicar em cada card
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/imovel/cadastro.php")
      : card === cards[1]
      ? (location = "/SMILIPS/view/pages/propaganda/cadastro.php")
      : (location = "/SMILIPS/view/pages/servico/cadastro.php");
  });
});

// capturando os elementos da DOM
const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".cards-imovel");
const cards_imovel = document.querySelectorAll(".list-imovel .card");

if (btnProximo) {
  // chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
  btnProximo.addEventListener("click", () => {
    window.innerWidth <= 881
      ? avancar(-290, cards_imovel, slider, 1)
      : window.innerWidth <= 1306
      ? avancar(-290, cards_imovel, slider, 2)
      : avancar(-290, cards_imovel, slider, 3);
  });

  // chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
  btnVoltar.addEventListener("click", () => {
    window.innerWidth <= 881
      ? retornar(290, cards_imovel, slider, 1)
      : window.innerWidth <= 1306
      ? retornar(290, cards_imovel, slider, 2)
      : retornar(290, cards_imovel, slider, 3);
  });
}

// capturando os elementos da DOM
const btnProximoPropaganda = document.querySelector(
  ".your-adverts .icon-proximo"
);
const btnVoltarPropaganda = document.querySelector(
  ".your-adverts .icon-voltar"
);
const sliderPropaganda = document.querySelector(
  ".your-adverts .cards-propaganda"
);
const cards_propaganda = document.querySelectorAll(".your-adverts .card");

if (btnProximoPropaganda) {
  // chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
  btnProximoPropaganda.addEventListener("click", () => {
    window.innerWidth <= 881
      ? avancarPropaganda(-290, cards_propaganda, sliderPropaganda, 1)
      : window.innerWidth <= 1306
      ? avancarPropaganda(-290, cards_propaganda, sliderPropaganda, 2)
      : avancarPropaganda(-290, cards_propaganda, sliderPropaganda, 3);
  });

  // chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
  btnVoltarPropaganda.addEventListener("click", () => {
    window.innerWidth <= 881
      ? retornarPropaganda(290, cards_propaganda, sliderPropaganda, 1)
      : window.innerWidth <= 1306
      ? retornarPropaganda(290, cards_propaganda, sliderPropaganda, 2)
      : retornarPropaganda(290, cards_propaganda, sliderPropaganda, 3);
  });
}

let cont = 0;
// funcao para avancar as imgs
function avancarPropaganda(deslocamento, arquivos, sliders, qtdCards) {
  // pego a qdt de cards a serem avancados
  const file_size = arquivos.length - qtdCards;
  // pegando o posicionamento esquerdo do elemento
  const stylePixel = Number(sliders.style.left.replace(/px/, ""));
  // se o contador for menor que a qdt de cards a serem avancados, avance e incremente 1 ao contador, se n reset tudo
  if (cont < file_size) {
    sliders.style.left = `${stylePixel + deslocamento}px`;
    cont++;
  } else {
    sliders.style.left = "0";
    cont = 0;
  }
}

// funcao para retorna as imgs, mesma coisa da funcao a cima porem agora voltando
function retornarPropaganda(deslocamento, arquivos, sliders, qtdCards) {
  // pego a qdt de cards a serem retornados
  const file_size = arquivos.length - qtdCards;
  // pegando o posicionamento esquerdo do elemento
  const stylePixel = Number(sliders.style.left.replace(/px/, ""));
  // se o contador for menor que a qdt de cards a serem retornados e for maior q zero, retorne e decrecremente 1 ao contador, retorna pra utima posicao e sobrescreve o valo do contador para a utima posicao
  if (cont <= file_size && cont > 0) {
    sliders.style.left = `${stylePixel + deslocamento}px`;
    cont--;
  } else {
    sliders.style.left = `-${deslocamento * file_size}px`;
    cont = file_size;
  }
}
