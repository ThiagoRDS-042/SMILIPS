import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";
import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";

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

focusValidElement(complemento);
focusValidElement(textarea);

const inputs = document.querySelectorAll(".numerico");

validarTipoNumerico(inputs);
