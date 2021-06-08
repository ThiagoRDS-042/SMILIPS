const textarea = document.querySelector("#descricao");

textarea.addEventListener("focus", () => {
  textarea.classList.add("valid");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("valid");
  }
});

const btnCancelar = document.querySelector(".buttons button[name=cancelar]");
const checkbox = document.querySelector("#avaliacao");

btnCancelar.addEventListener("click", () => {
  checkbox.checked = false;
  textarea.value = "";
  textarea.classList.remove("valid");
});
