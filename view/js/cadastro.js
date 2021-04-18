// capturando todos os inputs os contadores o campo de senha e o icone de visualizacao
const inputs = document.querySelectorAll(
  ".form-cad .input-container .input-field input"
);
const counters = document.querySelectorAll(
  ".form-cad .input-container .input-field .counter"
);
const passords = document.querySelectorAll(
  ".form-cad .input-container .input-field input[type=password]"
);
const btns = document.querySelectorAll(
  ".form-cad .input-container .input-field i"
);
const maxLengths = [];

// atribuindo valores ao array maxlengths de acordo com o atributo maxkength dos inputs
inputs.forEach((input) => {
  maxLengths.push(input.attributes.maxlength.value);
});

//atribuindo os valores dos contadores nos inputs
inputs.forEach((input, index) => {
  //acionando evente ao digitar no input
  input.addEventListener("keyup", () => {
    //se o index for maior q 3
    if (index < 7) {
      //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
      counters[index].innerText = String(
        Number(maxLengths[index]) - Number(input.value.length)
      );
    }
  });
});

// importando modulo
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(passwords, index, btn))
);

inputs.forEach((input) => {
  // se o input tiver focu e estiver vazio add a classe active
  //obs: o togle add se ja n tiver uma classe e excluir se ja existir
  input.addEventListener("focus", () => {
    if (input.value == "") {
      input.classList.toggle("active");
    }
  });
  // inverso da de cima ou seja quando o campo perde o focu
  input.addEventListener("blur", () => {
    if (input.value == "") {
      input.classList.toggle("active");
    }
  });
});
