// importando as funcoes
import {
  fecharPopupExcruir,
  selecionarUm,
} from "/SMILIPS/view/js/modules/checarCheckbox.js";
import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";
import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".counter");
const maxlength = inputDescricao.attributes.maxlength.value;

definirMaxLength(inputDescricao, counter, maxlength);

// capturando todos os inputs numericos
const inputNumero = document.querySelectorAll(".numerico");

// chamando a funcao importada passando os inputs numericos
validarTipoNumerico(inputNumero);

// capturando todos os cehckbox, icones de delecao e os botoes de nao
const checkboxs = document.querySelectorAll(".acoes input[type=checkbox]");
const incosDelete = document.querySelectorAll(".acoes i.fa-trash-alt");
const btnsNao = document.querySelectorAll(".acoes .excluir .btnNao");

// chamando as funcoes importadas e passando as variaveis atribuidas a cima pelo parametro
selecionarUm(incosDelete, checkboxs);
fecharPopupExcruir(btnsNao, checkboxs);
