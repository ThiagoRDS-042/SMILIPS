// capturando o campo de senha e o icone de visualizar
let senhas = document.querySelectorAll("input[type=password]");
let btns = document.querySelectorAll(".field-senha i");

// add um envento de click para mudar o tipo de input de password para text e o tipo de icone de visualizacao
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);
