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
          console.log(id);
          // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Formato de Arquivo Inválido!&&id=${id}`;
        }
      } else {
        console.log(id);
        // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Formato de Arquivo Inválido!&&id=${id}`;
      }
    } else {
      console.log(id);
      previewImgs[index].src = array[index];
      // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Selecione uma Imagem!&&id=${id}`;
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
