function validarTipoNumerico(inputs) {
  inputs.forEach((input) => {
    input.addEventListener("blur", () => {
      input.value = !isNaN(input.value) ? input.value : "";
    });
  });
}

export { validarTipoNumerico };
