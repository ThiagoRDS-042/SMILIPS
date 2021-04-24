import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";
import { addClass, editSelect } from "/SMILIPS/view/js/modules/select.js";
import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

const previewImgs = document.querySelectorAll(".preview-img");
const files = document.querySelectorAll("input[type=file]");
const array = [];
let id = document.querySelector("#id");
id = id.value;

previewImgs.forEach((arr) => {
  array.push(arr.attributes.src.value);
});

files.forEach((file, index) => {
  file.addEventListener("change", (e) => {
    const fileToUpload = e.target.files.item(0);
    if (fileToUpload) {
      if (/\.(jpe?g|png|gif)$/i.test(fileToUpload.name)) {
        if (fileToUpload.size <= 1022924) {
          const reader = new FileReader();
          reader.readAsDataURL(fileToUpload);

          reader.addEventListener("load", (e) => {
            previewImgs[index].src = e.target.result;
          });
        } else {
          location = `/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_edicao=Tamanho de Arquivo Inválido!&&id=${id}`;
        }
      } else {
        location = `/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_edicao=Formato de Arquivo Inválido!&&id=${id}`;
      }
    } else {
      previewImgs[index].src = array[index];
    }
  });
});

const complemento = document.querySelector("input.complemento");
const textarea = document.querySelector("textarea#descricao");

focusValidElement(complemento);
focusValidElement(textarea);

const inputsNumericos = document.querySelectorAll(".numerico");

validarTipoNumerico(inputsNumericos);

const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

addClass(select, listsOption);

editSelect(optionsListType, select, listsOption);

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

// buttons excluir imovel
const btnCancel = document.querySelector("button[type=button]");
const checkbox = document.querySelector("#btn_excluir");

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(".senha input[name=senha]");
const btns = document.querySelectorAll(".senha .fa");

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
