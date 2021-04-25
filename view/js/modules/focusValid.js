// funcao para adicionar/remover a classe valid do elemento, ao ganhar e perder foco
function focusValidElement(element) {
  // se o elemento ganhar foco add a classe valid
  element.addEventListener("focus", () => {
    element.classList.add("valid");
  });

  // se o elemento perder foco e n possiur valor remove a classe valid
  element.addEventListener("blur", () => {
    if (element.value == "") {
      element.classList.remove("valid");
    }
  });

  // se o elemento tiver algum valor faça add a classe valid
  if (element.value != "") {
    element.classList.add("valid");
  }
}

// exportando a funcao
export { focusValidElement };
