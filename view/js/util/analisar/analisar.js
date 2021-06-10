import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";
import { selecionarUm } from "/SMILIPS/view/js/modules/checarCheckbox.js";

const textarea = document.querySelector("#descricao");

textarea.addEventListener("focus", () => {
  textarea.classList.add("valid");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("valid");
  }
});

const btnsCancelar = document.querySelectorAll(
  ".buttons button[name=cancelar]"
);
const checkboxs = document.querySelectorAll("form input[type=checkbox]");
const btnsAnalise = document.querySelectorAll("label h3");

btnsCancelar.forEach((btnCancelar, index) => {
  btnCancelar.addEventListener("click", () => {
    checkboxs[index].checked = false;
    textarea.value = "";
    textarea.classList.remove("valid");
  });
});

selecionarUm(btnsAnalise, checkboxs);

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".count");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);
