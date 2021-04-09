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
    // chamando a funcao passando cada elemento (file) que esta contido em files
    let formatValidet = [];
    let sizeValidet = [];
    for (const element of files) {
      // readAndPreview(element);
      formatValidet.push(/\.(jpe?g|png|gif)$/i.test(element.name));
      sizeValidet.push(element.size <= 1022924);
    }

    if (
      formatValidet.every((elemnt) => elemnt == true) &&
      sizeValidet.every((elemnt) => elemnt == true)
    ) {
      if ((files.length > 2 && files.length < 11) || files.length == 0) {
        for (const element of files) {
          readAndPreview(element);
        }
      } else {
        location =
          "/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imoveis=Número de Imagens Selecionadas Inválido!";
      }
    } else {
      location =
        "/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imoveis=Formato ou Tamanho de Arquivo Inválido!";
    }

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
          (slider.style.left = "0"),
          (cont = 0));
    }, 10);
  }
});

const btnProximo = document.querySelector(".icon-proximo");
const btnVoltar = document.querySelector(".icon-voltar");
const slider = document.querySelector(".list-img-slider");
let cont = 0;

function avancar(deslocamento, arquivos, sliders, qtdCards) {
  let file_size = arquivos.length - qtdCards;
  let stylePixel = Number(sliders.style.left.replace(/px/, ""));
  if (cont < file_size) {
    sliders.style.left = `${stylePixel + deslocamento}px`;
    cont++;
  } else {
    sliders.style.left = "0";
    cont = 0;
  }
}

function retornar(deslocamento, arquivos, sliders, qtdCards) {
  let file_size = arquivos.length - qtdCards;
  let stylePixel = Number(sliders.style.left.replace(/px/, ""));
  if (cont <= file_size && cont > 0) {
    sliders.style.left = `${stylePixel + deslocamento}px`;
    cont--;
  } else {
    sliders.style.left = `-${deslocamento * file_size}px`;
    cont = file_size;
  }
}

btnProximo.addEventListener("click", () => avancar(-260, files, slider, 3));

btnVoltar.addEventListener("click", () => retornar(260, files, slider, 3));
