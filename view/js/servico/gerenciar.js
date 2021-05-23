// importando as funcoes
import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";
import { addClass, editSelect } from "/SMILIPS/view/js/modules/select.js";
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// capturando os selct, a lista de options e todos os options do tipo type
const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

// adicionando/removendo a classe active do select todo vez q ele e clicado
addClass(select, listsOption);

// sobrescrevendo o texto/valor do select pelo text/valor do option clicado, e removendo a classe active da lista de options
editSelect(optionsListType, select, listsOption);

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".contador");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);

const btns = document.querySelectorAll(".desativar i.fa");
const senhas = document.querySelectorAll(".desativar input");
const checkbox = document.querySelector("input#desativar");
const btnCancel = document.querySelector(".desativar button[type=button]");

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);

// se clicar no botao cancelar o checkbox e desmarcado e reseta o input
btnCancel.addEventListener("click", () => {
  checkbox.checked = false;
  senhas.forEach((senha, index) => {
    senha.value = "";
    senha.type = "password";
    btns[index].classList.add("fa-eye");
    btns[index].classList.remove("fa-eye-slash");
  });
});
