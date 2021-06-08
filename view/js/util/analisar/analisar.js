import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

const textarea = document.querySelector("#descricao");

textarea.addEventListener("focus", () => {
  textarea.classList.add("valid");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("valid");
  }
});

const btnCancelar = document.querySelector(".buttons button[name=cancelar]");
const checkbox = document.querySelector("#avaliacao");

btnCancelar.addEventListener("click", () => {
  checkbox.checked = false;
  textarea.value = "";
  textarea.classList.remove("valid");
});

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".count");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);
