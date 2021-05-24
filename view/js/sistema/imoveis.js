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

  // so exiba no maximo 5 imgs
  cards.forEach((card, index) => {
    if (index > 4) {
      card.style.display = "none";
    }
  });

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
