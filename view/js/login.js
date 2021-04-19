// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(
  ".middle .field-input input[type=password]"
);
const btns = document.querySelectorAll(".middle .field-input i");

// importando modulo
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);
