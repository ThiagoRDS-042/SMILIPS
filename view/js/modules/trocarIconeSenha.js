// funcao para trocar o incone de visializacao de senha
function trocarIconeSenha(senhas, index, btn) {
  // se o input for do tipo password, tranforma ele em text, remove a classe fa-eye e add a classe fa-eye-slash, se n, transforma ele em password, remove a classe fa-eye-slash e add a classe fa-eye
  if (senhas[index].type == "password") {
    senhas[index].type = "text";
    btn.classList.remove("fa-eye");
    btn.classList.add("fa-eye-slash");
  } else {
    senhas[index].type = "password";
    btn.classList.add("fa-eye");
    btn.classList.remove("fa-eye-slash");
  }
  // ao fim add foco ao campo de senha
  senhas[index].focus();
}

// exportando a funcao
export default trocarIconeSenha;
