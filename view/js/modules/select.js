function addClass(select, listsOption) {
  select.addEventListener("click", () => {
    listsOption.classList.toggle("active");
  });
}

function editSelect(listOption, select, listsOption) {
  listOption.forEach((option) => {
    option.addEventListener("click", () => {
      select.innerHTML = option.querySelector("span").innerHTML;
      listsOption.classList.remove("active");
    });
  });
}

export { addClass, editSelect };
