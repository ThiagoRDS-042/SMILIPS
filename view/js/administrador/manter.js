import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

const motivo = document.querySelector("#motivo");

motivo.addEventListener("focus", () => {
  motivo.classList.add("active");
});

motivo.addEventListener("blur", () => {
  if (motivo.value == "") {
    motivo.classList.remove("active");
  }
});

// capturando a texarea o contador e o maxlength
const counter = document.querySelector(".count");
const maxlength = motivo.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(motivo, counter, maxlength);
