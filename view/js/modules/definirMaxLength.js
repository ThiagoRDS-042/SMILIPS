function definirMaxLength(inputDescricao, counter, maxlength) {
  //acionando evente ao digitar no input
  inputDescricao.addEventListener("keyup", () => {
    //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
    counter.innerText = String(
      Number(maxlength) - Number(inputDescricao.value.length)
    );
  });

  if (inputDescricao.value != "") {
    counter.innerText = String(
      Number(maxlength) - Number(inputDescricao.value.length)
    );
  }
}

export default definirMaxLength;
