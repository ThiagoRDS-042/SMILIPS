function focusValidElement(element) {
  element.addEventListener("focus", () => {
    element.classList.add("valid");
  });

  element.addEventListener("blur", () => {
    if (element.value == "") {
      element.classList.remove("valid");
    }
  });

  if (element.value != "") {
    element.classList.add("valid");
  }
}

export { focusValidElement };
