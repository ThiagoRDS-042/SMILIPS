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

export { avancar, retornar };
