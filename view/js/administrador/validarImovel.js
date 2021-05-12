// importando as funcoes
import { fecharPopupExcruir } from "/SMILIPS/view/js/modules/checarCheckbox.js";

const checkboxs = document.querySelectorAll("form input[type=checkbox]");
const btnscancelar = document.querySelectorAll(
  "form .msg_imovel .buttons button[name=cancelar]"
);

// chamando as funcoes importadas passando as variveis a cima pelo parametro
fecharPopupExcruir(btnscancelar, checkboxs);
