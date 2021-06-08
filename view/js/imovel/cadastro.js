// importando as funcoes
import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";
import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";
import { addClass, editSelect } from "/SMILIPS/view/js/modules/select.js";
import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";

// capturando os selct, a lista de options e todos os options do tipo type
const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

// adicionando/removendo a classe active do select todo vez q ele e clicado
addClass(select, listsOption);

// sobrescrevendo o texto/valor do select pelo text/valor do option clicado, e removendo a classe active da lista de options
editSelect(optionsListType, select, listsOption);

// capturando os campos de descricao(textarea) e complemento
const complemento = document.querySelector("input.complemento");
const textarea = document.querySelector("textarea#descricao");

// chamando a funcao importada passado as variaveis a cima pelo parametro
focusValidElement(complemento);
focusValidElement(textarea);

// capturando os inputs de tipo numericos
const inputs = document.querySelectorAll(".numerico");

// chamando a funcao importada passado os inputs pelo parametro
validarTipoNumerico(inputs);

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".count");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);
