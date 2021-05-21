import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// buttons excluir imovel
const btnCancel = document.querySelector(".enviar button[type=button]");
const checkbox = document.querySelector("#btnEnviar");

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(".enviar input[name=senha]");
const btns = document.querySelectorAll(".enviar .icon i");

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

senhas.forEach((senha) => {
  senha.addEventListener("focus", () => {
    senha.classList.add("active");
  });

  senha.addEventListener("blur", () => {
    if (senha.value == "") {
      senha.classList.remove("active");
    }
  });
});
