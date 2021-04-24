// importando modulos
import { avancar, retornar } from "/SMILIPS/view/js/modules/sliderCards.js";

const cards = document.querySelectorAll("main .card-container .card");

cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/imovel/cadastro.php")
      : card === cards[1]
      ? (location = "#")
      : (location = "#");
  });
});

const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".cards-imovel");
const cards_imovel = document.querySelectorAll(".list-imovel .card");

btnProximo.addEventListener("click", () => {
  window.innerWidth <= 881
    ? avancar(-290, cards_imovel, slider, 1)
    : window.innerWidth <= 1306
    ? avancar(-290, cards_imovel, slider, 2)
    : avancar(-290, cards_imovel, slider, 3);
});

btnVoltar.addEventListener("click", () => {
  window.innerWidth <= 881
    ? retornar(290, cards_imovel, slider, 1)
    : window.innerWidth <= 1306
    ? retornar(290, cards_imovel, slider, 2)
    : retornar(290, cards_imovel, slider, 3);
});
