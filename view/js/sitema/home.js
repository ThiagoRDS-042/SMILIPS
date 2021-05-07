// importando modulos
import { avancar, retornar } from "/SMILIPS/view/js/modules/sliderCards.js";

// pesquisando/pegando o span mais opçoes, o filtro todo e os filtros escondidos
const btnMore = document.querySelector("#filter .more span");
const filter = document.querySelector("#filter");
const inputs = document.querySelectorAll(".field-input");

// inicializando um contador
let count = 0;

// add um envento de click ao span mais opções
btnMore.addEventListener("click", () => {
  // se o contador for par aumente o tamanho do filtro
  if (count % 2 === 0) {
    inputs[1].classList.toggle("hidden");
    inputs[2].classList.toggle("hidden");
    filter.style.height = "330px";
    btnMore.innerHTML = '<i class="fas fa-search-minus"></i>Menos Opções';
    // se nao volte ao valor inicial, mesma coisa com o texto
  } else {
    inputs[1].classList.toggle("hidden");
    inputs[2].classList.toggle("hidden");
    filter.style.height = "200px";
    btnMore.innerHTML = '<i class="fas fa-search-plus"></i>Mais Opções';
  }
  // incrementando o contador
  count++;
});

//filtro
// pegando os 'selects' e as listas de 'options'
const selects = document.querySelectorAll(".select");
const listsOptions = document.querySelectorAll(".list-options");

// pegando cada lista de option de cada select no caso tem 9 selects
const optionsListType = document.querySelectorAll(".option.type");
const optionsListCidade = document.querySelectorAll(".option.cidade");
const optionsListBairro = document.querySelectorAll(".option.bairro");
const optionsListDormitorio = document.querySelectorAll(".option.dormitorio");
const optionsListSuite = document.querySelectorAll(".option.suite");
const optionsListGaragem = document.querySelectorAll(".option.garagem");
const optionsListValorI = document.querySelectorAll(".option.valorI");
const optionsListValorF = document.querySelectorAll(".option.valorF");
const optionsListArea = document.querySelectorAll(".option.area");

// add e removendo  a classe active cada vez q clicar no select
selects.forEach((select, index) => {
  select.addEventListener("click", () => {
    listsOptions[index].classList.toggle("active");
  });
});

// abrindo cada lista de options de acordo com cada select e alterando o valor do select de acordo com o option clicado
function editSelect(listOptions, index) {
  listOptions.forEach((option) => {
    option.addEventListener("click", () => {
      selects[index].innerHTML = option.querySelector("span").innerHTML;
      listsOptions[index].classList.remove("active");
    });
  });
}

// cahamando a funcao para cada select
editSelect(optionsListType, 0);

editSelect(optionsListCidade, 1);

editSelect(optionsListBairro, 2);

editSelect(optionsListDormitorio, 3);

editSelect(optionsListSuite, 4);

editSelect(optionsListGaragem, 5);

editSelect(optionsListValorI, 6);

editSelect(optionsListValorF, 7);

editSelect(optionsListArea, 8);

//add evento de scroll ao objeto window, e add a classe sticky a section se o scroly da pagina for maior q 580
window.addEventListener("scroll", () => {
  const section = document.querySelector("section.oqProcura");
  section.classList.toggle("sticky", window.scrollY > 1180);
});

// capturando os elementos da DOM
const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".list-card-slider");
const cards = document.querySelectorAll(".list-card-slider .card");

// chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
btnProximo.addEventListener("click", () => {
  window.innerWidth <= 765
    ? avancar(-290, cards, slider, 1)
    : window.innerWidth <= 1000
    ? avancar(-290, cards, slider, 2)
    : avancar(-290, cards, slider, 3);
});

// chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
btnVoltar.addEventListener("click", () => {
  window.innerWidth <= 765
    ? retornar(290, cards, slider, 1)
    : window.innerWidth <= 1000
    ? retornar(290, cards, slider, 2)
    : retornar(290, cards, slider, 3);
});
