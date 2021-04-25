function definirMaxLength(inputDescricao, counter, maxlength) {
  //acionando evente ao digitar no input
  inputDescricao.addEventListener("keyup", () => {
    //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
    counter.innerText = String(
      Number(maxlength) - Number(inputDescricao.value.length)
    );
  });

  // se o input tiver algum valor faça o mesmo q a cima
  if (inputDescricao.value != "") {
    counter.innerText = String(
      Number(maxlength) - Number(inputDescricao.value.length)
    );
  }
}

// exportando a funcao
export default definirMaxLength;
