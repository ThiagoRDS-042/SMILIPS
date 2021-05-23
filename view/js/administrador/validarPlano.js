// importando as funcoes
import { fecharPopupExcruir } from "/SMILIPS/view/js/modules/checarCheckbox.js";

const checkboxs = document.querySelectorAll("form input[type=checkbox]");
const btnscancelar = document.querySelectorAll(
  "form .msg_plano .buttons button[name=cancelar]"
);

// chamando as funcoes importadas passando as variveis a cima pelo parametro
fecharPopupExcruir(btnscancelar, checkboxs);

const textarea = document.querySelector("#descricao");

textarea.addEventListener("blur", () => {
  if (textarea.value != "") {
    textarea.classList.add("valid");
  } else {
    textarea.classList.remove("valid");
  }
});
