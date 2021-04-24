// importando a funcao
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// capturando o campo de senha, icone de visualizar, o botao de cancel e o checkbox
const btnCancel = document.querySelector(".cancel");
const checkbox = document.querySelector("input[type=checkbox]");
const senhas = document.querySelectorAll(".msg-content");
const btns = document.querySelectorAll(".msg-desativar .fa");

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

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);
