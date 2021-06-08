import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

const textarea = document.querySelector("#motivo");

textarea.addEventListener("focus", () => {
  textarea.classList.add("active");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("active");
  }
});

const btnCancelar = document.querySelector(".buttons button:first-child");
const checkbox = document.querySelector("#denunciar");

btnCancelar.addEventListener("click", () => {
  checkbox.checked = false;
  textarea.value = "";
  textarea.classList.remove("active");
});

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#motivo");
const counter = document.querySelector(".maxlength");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);
