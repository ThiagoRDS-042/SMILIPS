// capturando os elementos da DOM
const imoveis = document.querySelectorAll(".card_imovel");

imoveis.forEach((imovel) => {
  let cont = 0;
  // funcao para avancar as imgs
  function avancar(deslocamento, arquivos, sliders, qtdCards) {
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
  function retornar(deslocamento, arquivos, sliders, qtdCards) {
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

  // capturando os elementos da DOM
  const btnsProximo = imovel.querySelectorAll(".icon-proximo");
  const btnsVoltar = imovel.querySelectorAll(".icon-voltar");
  const slider = imovel.querySelector(".imgs");
  const cards = imovel.querySelectorAll(".imgs img");

  // adicionando o evento de click a cada botao proximo
  btnsProximo.forEach((btnProximo) => {
    btnProximo.addEventListener("click", () => {
      if (cards.length > 5) {
        window.innerWidth <= 565
          ? avancar(-400, cards, slider, cards.length - 4)
          : avancar(-400, cards, slider, cards.length - 4);
      } else {
        window.innerWidth <= 565
          ? avancar(-400, cards, slider, 1)
          : avancar(-400, cards, slider, 1);
      }
    });
  });

  // adicionando o evento de click a cada botao voltar
  btnsVoltar.forEach((btnVoltar) => {
    btnVoltar.addEventListener("click", () => {
      if (cards.length > 5) {
        window.innerWidth <= 565
          ? avancar(400, cards, slider, cards.length - 4)
          : avancar(400, cards, slider, cards.length - 4);
      } else {
        window.innerWidth <= 565
          ? avancar(400, cards, slider, 1)
          : avancar(400, cards, slider, 1);
      }
    });
  });
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

const qtdCards = document.querySelectorAll(".card_imovel");
const imoveis_disponiveis = document.querySelector(".imoveis_disponiveis");
const h1 = document.querySelector("main h1");

const p1 = document.querySelector(".propaganda.p1");
const p2 = document.querySelector(".propaganda.p2");
const p3 = document.querySelector(".propaganda.p3");

if (p1) {
  h1.classList.add("top");

  if (p2) {
    let indece;

    if (qtdCards.length % 2 === 0) {
      indece = qtdCards.length / 2 - 1;
    } else {
      indece = Math.round(qtdCards.length / 2) - 1;
    }

    qtdCards[indece].classList.add("middle");

    if (p3) {
      imoveis_disponiveis.classList.add("bottom");
    } else {
      p2.classList.add("exist");
    }
  }
}
