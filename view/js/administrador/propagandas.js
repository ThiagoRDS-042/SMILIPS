// importando modulos
import { avancar, retornar } from "/SMILIPS/view/js/modules/sliderCards.js";

// capturando os elementos da DOM
const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".slider_propagandas");
const cards_imovel = document.querySelectorAll(".slider_propagandas .card");

console.log(btnProximo, btnVoltar, slider, cards_imovel);

// chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
btnProximo.addEventListener("click", () => {
  window.innerWidth <= 930
    ? avancar(-330, cards_imovel, slider, 1)
    : window.innerWidth <= 1270
    ? avancar(-330, cards_imovel, slider, 2)
    : avancar(-330, cards_imovel, slider, 3);
});

// chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
btnVoltar.addEventListener("click", () => {
  window.innerWidth <= 930
    ? retornar(330, cards_imovel, slider, 1)
    : window.innerWidth <= 1270
    ? retornar(330, cards_imovel, slider, 2)
    : retornar(330, cards_imovel, slider, 3);
});
