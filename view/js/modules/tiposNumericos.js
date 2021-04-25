// funcao para validar se o valor digitado no input e um numero
function validarTipoNumerico(inputs) {
  // percorrendo todos os inputs numericos
  inputs.forEach((input) => {
    // ao sair do campo se o valor digitado n for um numero ou for vazio reset o input
    input.addEventListener("blur", () => {
      input.value = !isNaN(input.value) ? input.value : "";
    });
  });
}

// exportando a funcao
export { validarTipoNumerico };
