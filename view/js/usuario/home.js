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
      ? (location = "#")
      : (location = "#");
  });
});

// capturando os elementos da DOM
const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".cards-imovel");
const cards_imovel = document.querySelectorAll(".list-imovel .card");

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
