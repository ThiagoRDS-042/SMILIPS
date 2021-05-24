// importando as funcoes
import { fecharPopupExcluir } from "/SMILIPS/view/js/modules/checarCheckbox.js";

// capturando os checkboxes e os botoes de cancelar
const checkboxs = document.querySelectorAll("form input[type=checkbox]");
const btnscancelar = document.querySelectorAll(
  "form .msg_propaganda .buttons button[name=cancelar]"
);

// chamando as funcoes importadas passando as variveis a cima pelo parametro
fecharPopupExcluir(btnscancelar, checkboxs);

// capturando a textarea
const textarea = document.querySelector("#descricao");

// adicionando ou removendo a classe valid da textarea ao perder o foco
textarea.addEventListener("blur", () => {
  if (textarea.value != "") {
    textarea.classList.add("valid");
  } else {
    textarea.classList.remove("valid");
  }
});
