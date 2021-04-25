// pegando o input de type file
const input = document.querySelector("input[type=file]");
let files;

// add um evento ao usuario modificar alguma proriedade do elemento
input.addEventListener("change", function previewFiles() {
  // pegando a div que armazenará as imagens
  const preview = document.querySelector(".preview");
  preview.innerHTML = "";
  // pegando as arquivos passados pelo usuario
  files = document.querySelector("input[type=file]").files;

  function readAndPreview(file) {
    // criando um objeto FileReader
    const reader = new FileReader();

    // add um evento de load ao reader, que será acionado ao carregar o reader
    reader.addEventListener("load", function () {
      // criando um objeto de image
      const image = new Image();
      // adicionando o src da imagem como o resultado da conversao da imagem
      image.src = this.result;
      // criando uma div
      const div = document.createElement("div");
      // add uma classe a div
      div.classList.add("preview-img");
      // alocando a image dentro da div criada
      div.appendChild(image);
      //  alocando a div dentro da div preview
      preview.appendChild(div);
    });

    // acionando o metodo de leitura e conversao do arquivo
    reader.readAsDataURL(file);
  }

  if (files) {
    // criando arrays vazios
    const formatValidet = [];
    const sizeValidet = [];
    for (const element of files) {
      // interando cada posicao do array com as validações de formato e tamanho da img
      formatValidet.push(/\.(jpe?g|png|gif)$/i.test(element.name));
      sizeValidet.push(element.size <= 1022924);
    }

    // se tiver o formato e tamanho valido em todas as imgs
    if (
      formatValidet.every((elemnt) => elemnt == true) &&
      sizeValidet.every((elemnt) => elemnt == true)
    ) {
      // se a qtd de imgs for entre 3 e 10, inclusos
      if ((files.length > 2 && files.length < 11) || files.length == 0) {
        for (const element of files) {
          // chama a funcao de preview para cada elemento (img)
          readAndPreview(element);
        }
      } else {
        // redirecionando e passando variavel get de notificacao de img
        location =
          "/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_cadastro=Número de Imagens Selecionadas Inválido!";
      }
    } else {
      // redirecionando e passando variavel get de notificacao de img
      location =
        "/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_cadastro=Formato ou Tamanho de Arquivo Inválido!";
    }

    // editando a visualizacao da caixa de selecao de img e do btn salvar
    setTimeout(() => {
      const container = document.querySelector(".container-img");
      document.querySelector(".preview-img")
        ? container.classList.add("active")
        : container.classList.remove("active");

      const div = document.querySelector(".select-img");
      const icon = document.querySelector(".far");
      const h1 = document.querySelector(".select-img h1");
      const slider = document.querySelector(".list-img-slider");
      document.querySelector(".preview-img")
        ? (div.classList.add("active"),
          icon.classList.add("active"),
          h1.classList.add("active"),
          (h1.innerText = "Alterar Imagens"))
        : (div.classList.remove("active"),
          icon.classList.remove("active"),
          h1.classList.remove("active"),
          (h1.innerText = "Selecionar Imagens"),
          // aqui reseto o lista de cards com imgs exibidas
          (slider.style.left = "0"),
          (cont = 0));
    }, 10);
  }
});

// capturando os elementos da DOM
const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".list-img-slider");
let cont = 0;

// obs: repeti as funcoes de avancar e retornar aqui, pq eu precisava manipular mlh o cont, e usando a funcao exportado no modulo n dava certo
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

// chamando a funcao de avancar ao clicar no btnproximo de a cordo com o largura da tela
btnProximo.addEventListener("click", () => {
  window.innerWidth <= 765
    ? avancar(-260, files, slider, 1)
    : window.innerWidth <= 1000
    ? avancar(-260, files, slider, 2)
    : avancar(-260, files, slider, 3);
});

// chamando a funcao de voltar ao clicar no btnvoltar de a cordo com o largura da tela
btnVoltar.addEventListener("click", () => {
  window.innerWidth <= 765
    ? retornar(260, files, slider, 1)
    : window.innerWidth <= 1000
    ? retornar(260, files, slider, 2)
    : retornar(260, files, slider, 3);
});
