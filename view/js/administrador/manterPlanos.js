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

if (inputDescricao.value != "") {
  counter.innerText = String(
    Number(maxlength) - Number(inputDescricao.value.length)
  );
}

import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";

const inputNumero = document.querySelectorAll(".numerico");

validarTipoNumerico(inputNumero);

import {
  selecionarUm,
  fecharPopupExcruir,
} from "/SMILIPS/view/js/modules/checarCheckbox.js";

const checkboxs = document.querySelectorAll(".acoes input[type=checkbox]");
const incosDelete = document.querySelectorAll(".acoes i.fa-trash-alt");
const btnsNao = document.querySelectorAll(".acoes .excluir .btnNao");

selecionarUm(incosDelete, checkboxs);

fecharPopupExcruir(btnsNao, checkboxs);
