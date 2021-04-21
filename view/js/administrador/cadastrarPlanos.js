// texarea
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".counter");
const maxlength = inputDescricao.attributes.maxlength.value;

//acionando evente ao digitar no input
inputDescricao.addEventListener("keyup", () => {
  //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
  counter.innerText = String(
    Number(maxlength) - Number(inputDescricao.value.length)
  );
});

import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";

const inputNumero = document.querySelectorAll(".numerico");

validarTipoNumerico(inputNumero);
