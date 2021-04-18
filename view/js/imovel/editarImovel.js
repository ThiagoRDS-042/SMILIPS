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

import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";

focusValidElement(complemento);
focusValidElement(textarea);

const inputs = document.querySelectorAll(".numerico");

import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";

validarTipoNumerico(inputs);

const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

import { addClass, editSelect } from "/SMILIPS/view/js/modules/select.js";

addClass(select, listsOption);

editSelect(optionsListType, select, listsOption);

// texarea
const input = document.querySelector("#descricao");
const counter = document.querySelector(".counter");
const maxlength = input.attributes.maxlength.value;

//acionando evente ao digitar no input
input.addEventListener("keyup", () => {
  //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
  counter.innerText = String(Number(maxlength) - Number(input.value.length));
});

if (input.value != "") {
  counter.innerText = String(Number(maxlength) - Number(input.value.length));
}
