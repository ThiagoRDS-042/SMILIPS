const body = document.querySelector("body");
const txtTipoDeServico = document.querySelector("input[name=tipo-de-servico]");

body.addEventListener("load", () => {
  txtTipoDeServico.value = "";
});

import {
  selecionarUm,
  fecharPopupExcruir,
} from "/SMILIPS/view/js/modules/checarCheckbox.js";

const checkboxs = document.querySelectorAll(
  "table tbody tr td input[type=checkbox]"
);
const incosDelete = document.querySelectorAll(
  "table tbody tr td i.fa-trash-alt"
);
const btnsNao = document.querySelectorAll("table tbody tr td .excluir .btnNao");

selecionarUm(incosDelete, checkboxs);

fecharPopupExcruir(btnsNao, checkboxs);
