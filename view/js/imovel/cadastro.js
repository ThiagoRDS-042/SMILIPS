const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

select.addEventListener("click", () => {
  listsOption.classList.toggle("active");
});

function editSelect(listOption) {
  listOption.forEach((option) => {
    option.addEventListener("click", () => {
      select.innerHTML = option.querySelector("span").innerHTML;
      listsOption.classList.remove("active");
    });
  });
}

editSelect(optionsListType);

const complemento = document.querySelector("input.complemento");
const textarea = document.querySelector("textarea#descricao");

import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";

focusValidElement(complemento);
focusValidElement(textarea);

const inputs = document.querySelectorAll(".numerico");

import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";

validarTipoNumerico(inputs);
