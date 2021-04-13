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

complemento.addEventListener("focus", () => {
  complemento.classList.add("valid");
});

complemento.addEventListener("blur", () => {
  if (complemento.value == "") {
    complemento.classList.remove("valid");
  }
});

textarea.addEventListener("focus", () => {
  textarea.classList.add("valid");
});

textarea.addEventListener("blur", () => {
  if (textarea.value == "") {
    textarea.classList.remove("valid");
  }
});

const inputs = document.querySelectorAll(".numerico");

inputs.forEach((input) => {
  input.addEventListener("blur", () => {
    input.value = !isNaN(input.value) ? input.value : "";
  });
});
