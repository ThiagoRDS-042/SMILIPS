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
