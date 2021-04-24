// importando a funcao
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(
  ".middle .field-input input[type=password]"
);
const btns = document.querySelectorAll(".middle .field-input i");

// percorrendo todos os btns
btns.forEach((btn, index) =>
  // chamando a funcao ao clicar no btn
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);
