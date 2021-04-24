// importando as funcoes
import {
  selecionarUm,
  fecharPopupExcruir,
} from "/SMILIPS/view/js/modules/checarCheckbox.js";

// capturando todos os checkbox, icones de delecao e os botoes de nao
const checkboxs = document.querySelectorAll(
  "table tbody tr td input[type=checkbox]"
);
const incosDelete = document.querySelectorAll(
  "table tbody tr td i.fa-trash-alt"
);
const btnsNao = document.querySelectorAll("table tbody tr td .excluir .btnNao");

// chamando as funcoes importadas passando as variveis a cima pelo parametro
selecionarUm(incosDelete, checkboxs);
fecharPopupExcruir(btnsNao, checkboxs);
