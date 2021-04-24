// importando a funcao
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll("input[type=password]");
const btns = document.querySelectorAll(".field-senha i");

// percorendo a variavel btn
btns.forEach((btn, index) =>
  // add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);
