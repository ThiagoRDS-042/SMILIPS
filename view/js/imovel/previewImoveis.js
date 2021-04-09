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
    if (files.length > 2 && files.length < 11) {
      if (
        formatValidet.every((elemnt) => elemnt == true) &&
        sizeValidet.every((elemnt) => elemnt == true)
      ) {
        for (const element of files) {
          readAndPreview(element);
        }
      } else {
        alert(
          "Formato ou Tamanho de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG. Tamanhos Suportados = até 1000KB)"
        );
      }
    } else {
      alert("Número de Imagens Selecionadas Inválido! (Suporte = 3 à 10))");
    }

    setTimeout(() => {
      const container = document.querySelector(".container-img");
      document.querySelector(".preview-img")
        ? container.classList.add("active")
        : container.classList.remove("active");

      const form = document.querySelector("form");
      document.querySelector(".preview-img")
        ? form.classList.add("active")
        : form.classList.remove("active");
    }, 10);
  }
});

let btnProximo = document.querySelector(".icon-proximo");
let btnVoltar = document.querySelector(".icon-voltar");
let slider = document.querySelector(".list-img-slider");
let cont = 0;

btnProximo.addEventListener("click", () => {
  if (files.length < 4 || files.length > 10) {
  } else if (files.length == 4) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else if (files.length == 5) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else if (files.length == 6) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else if (cont == 2) {
      slider.style.left = "-780px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else if (files.length == 7) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else if (cont == 2) {
      slider.style.left = "-780px";
      cont++;
    } else if (cont == 3) {
      slider.style.left = "-1040px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else if (files.length == 8) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else if (cont == 2) {
      slider.style.left = "-780px";
      cont++;
    } else if (cont == 3) {
      slider.style.left = "-1040px";
      cont++;
    } else if (cont == 4) {
      slider.style.left = "-1300px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else if (files.length == 9) {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else if (cont == 2) {
      slider.style.left = "-780px";
      cont++;
    } else if (cont == 3) {
      slider.style.left = "-1040px";
      cont++;
    } else if (cont == 4) {
      slider.style.left = "-1300px";
      cont++;
    } else if (cont == 5) {
      slider.style.left = "-1560px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  } else {
    if (cont == 0) {
      slider.style.left = "-260px";
      cont++;
    } else if (cont == 1) {
      slider.style.left = "-520px";
      cont++;
    } else if (cont == 2) {
      slider.style.left = "-780px";
      cont++;
    } else if (cont == 3) {
      slider.style.left = "-1040px";
      cont++;
    } else if (cont == 4) {
      slider.style.left = "-1300px";
      cont++;
    } else if (cont == 5) {
      slider.style.left = "-1560px";
      cont++;
    } else if (cont == 6) {
      slider.style.left = "-1820px";
      cont++;
    } else {
      slider.style.left = "0";
      cont = 0;
    }
  }
});

btnVoltar.addEventListener("click", () => {
  if (files.length < 4 || files.length > 10) {
  } else if (files.length == 4) {
    if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-260px";
      cont = 1;
    }
  } else if (files.length == 5) {
    if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-520px";
      cont = 2;
    }
  } else if (files.length == 6) {
    if (cont == 3) {
      slider.style.left = "-520px";
      cont = 2;
    } else if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-780px";
      cont = 3;
    }
  } else if (files.length == 7) {
    if (cont == 4) {
      slider.style.left = "-780px";
      cont = 3;
    } else if (cont == 3) {
      slider.style.left = "-520px";
      cont = 2;
    } else if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-1040px";
      cont = 4;
    }
  } else if (files.length == 8) {
    if (cont == 5) {
      slider.style.left = "-1040px";
      cont = 4;
    } else if (cont == 4) {
      slider.style.left = "-780px";
      cont = 3;
    } else if (cont == 3) {
      slider.style.left = "-520px";
      cont = 2;
    } else if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-1300px";
      cont = 5;
    }
  } else if (files.length == 9) {
    if (cont == 6) {
      slider.style.left = "-1300px";
      cont = 5;
    } else if (cont == 5) {
      slider.style.left = "-1040px";
      cont = 4;
    } else if (cont == 4) {
      slider.style.left = "-780px";
      cont = 3;
    } else if (cont == 3) {
      slider.style.left = "-520px";
      cont = 2;
    } else if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-1560px";
      cont = 6;
    }
  } else {
    if (cont == 7) {
      slider.style.left = "-1560px";
      cont = 6;
    } else if (cont == 6) {
      slider.style.left = "-1300px";
      cont = 5;
    } else if (cont == 5) {
      slider.style.left = "-1040px";
      cont = 4;
    } else if (cont == 4) {
      slider.style.left = "-780px";
      cont = 3;
    } else if (cont == 3) {
      slider.style.left = "-520px";
      cont = 2;
    } else if (cont == 2) {
      slider.style.left = "-260px";
      cont = 1;
    } else if (cont == 1) {
      slider.style.left = "0";
      cont = 0;
    } else {
      slider.style.left = "-1820px";
      cont = 7;
    }
  }
});
