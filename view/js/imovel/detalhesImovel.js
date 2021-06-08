// importando modulos
import { avancar, retornar } from "/SMILIPS/view/js/modules/sliderCards.js";
import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

// capturando os elementos da DOM
const btnProximo = document.querySelector(".container_imoveis .icon-proximo");
const btnVoltar = document.querySelector(".container_imoveis .icon-voltar");
const slider = document.querySelector(".cards_imovel");
const cards_imovel = document.querySelectorAll(".cards_imovel .card");

if (btnProximo) {
  // chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
  btnProximo.addEventListener("click", () => {
    window.innerWidth <= 881
      ? avancar(-400, cards_imovel, slider, 1)
      : window.innerWidth <= 1306
      ? avancar(-400, cards_imovel, slider, 2)
      : avancar(-400, cards_imovel, slider, 3);
  });

  // chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
  btnVoltar.addEventListener("click", () => {
    window.innerWidth <= 881
      ? retornar(400, cards_imovel, slider, 1)
      : window.innerWidth <= 1306
      ? retornar(400, cards_imovel, slider, 2)
      : retornar(400, cards_imovel, slider, 3);
  });
}

const info_imovel = document.querySelector(".info_imovel");
const info_proprietario = document.querySelector(".info_proprietario");

info_proprietario.style.height = `${info_imovel.offsetHeight}px`;

// capturando os elementos da DOM
const btnProximoRelacionados = document.querySelector(
  ".relacionados .icon-proximo"
);
const btnVoltarRelacionados = document.querySelector(
  ".relacionados .icon-voltar"
);
const sliderRelacionados = document.querySelector(".list_cards");
const cards_imovelRelacionados = document.querySelectorAll(".list_cards .card");

if (btnProximoRelacionados) {
  // chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
  btnProximoRelacionados.addEventListener("click", () => {
    window.innerWidth <= 1060
      ? avancarRelacionados(
          -440,
          cards_imovelRelacionados,
          sliderRelacionados,
          1
        )
      : avancarRelacionados(
          -440,
          cards_imovelRelacionados,
          sliderRelacionados,
          2
        );
  });

  // chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
  btnVoltarRelacionados.addEventListener("click", () => {
    window.innerWidth <= 1060
      ? retornarRelacionados(
          440,
          cards_imovelRelacionados,
          sliderRelacionados,
          1
        )
      : retornarRelacionados(
          440,
          cards_imovelRelacionados,
          sliderRelacionados,
          2
        );
  });
}

let cont = 0;
// funcao para avancar as imgs
function avancarRelacionados(deslocamento, arquivos, sliders, qtdCards) {
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
function retornarRelacionados(deslocamento, arquivos, sliders, qtdCards) {
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

const textarea = document.querySelector("#motivo");

textarea.addEventListener("focus", () => {
  textarea.classList.add("active");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("active");
  }
});

const btnCancelar = document.querySelector(".buttons button:first-child");
const checkbox = document.querySelector("#denunciar");

btnCancelar.addEventListener("click", () => {
  checkbox.checked = false;
  textarea.value = "";
  textarea.classList.remove("active");
});

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#motivo");
const counter = document.querySelector(".maxlength");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);
