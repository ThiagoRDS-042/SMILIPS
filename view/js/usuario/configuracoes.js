// add um envento de click para mudar o tipo de input de password para text e o tipo de icone de visualizacao
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

const btnCancel = document.querySelector(".cancel");
const checkbox = document.querySelector("input[type=checkbox]");
// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(".msg-content");
const btns = document.querySelectorAll(".msg-desativar .fa");

// se clicar no botao cancelar o checkbox e desmarcado
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
